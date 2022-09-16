<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use EvaluationService;
use App\Models\Evaluators;
use App\Models\Skills;
use App\Models\Functions;
use App\Models\FeedBack;
use App\Models\FeedBackControl;
use App\Models\Evaluations;
use Debugbar;
use Config;
use Session;
use Validator;
use Illuminate\Support\Collection;
use App\Http\Requests\StoreSkillsEvaluation;
use App\Http\Requests\StoreFunctionsEvaluation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['closeFeedBack','disableFeedBack','closeFeedBackControl','showReports','viewReport']);
        $this->middleware('prevent.back');        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if($user->role_id == 1 || $user->role_id == 3)
            return redirect()->route('voyager.dashboard');

        $selectedEvaluation = $request->query('evaluation');
        $currentEvaluation = ($request->has('evaluation') && $selectedEvaluation != 0) ? Evaluations::find($selectedEvaluation): null;        
        $evaluationsData = Evaluations::orderBy('id', 'desc')->get();

        $document = $evaluations = $countSkillsEvaluation = $countFunctionEvaluation = $countSkillsEvaluationDone = $countFunctionEvaluationDone = $reportData = $evaluatorsRoles = $evaluatorsRolesColors = $functionsEvaluatorsRoles = $feedback = $feedbackcontrol = $evaluationId = null;
        
        if($currentEvaluation != null){            
            $evaluationId = $currentEvaluation->id;
            $document = $user->document;
            $evaluations = EvaluationService::getUserEvaluations($document, $currentEvaluation->id);                    

            $countSkillsEvaluation = $evaluations->sum('evaluate_skills');
            $countFunctionEvaluation = $evaluations->sum('evaluate_functions');
            $countSkillsEvaluationDone = $evaluations->sum('skills_done');
            $countFunctionEvaluationDone = $evaluations->sum('functions_done');

            
            $reportData = EvaluationService::getEvaluationReport($document, $currentEvaluation->id);
            $evaluatorsRoles = Config::get('constants.evaluators_roles');
            $evaluatorsRolesColors = Config::get('constants.evaluators_colors');
            $functionsEvaluatorsRoles = Config::get('constants.evaluators_roles_functions');
            $feedback = FeedBack::where("user_document_evaluated",$document)
                                    ->where("evaluation_id",$currentEvaluation->id)
                                    ->first();
            $feedbackcontrol = FeedBackControl::where("user_document_evaluated",$document)
                                    ->where("evaluation_id",$currentEvaluation->id)
                                    ->first();
            Debugbar::info($evaluations, $countSkillsEvaluation, $countFunctionEvaluation,$countSkillsEvaluationDone,$countFunctionEvaluationDone, $reportData,  $reportData['skillsEvaluation'], $reportData['functionsEvaluation'], $feedback, $feedbackcontrol, $selectedEvaluation); 
        }
               
        return view('evaluation.home', compact('user','evaluations','countSkillsEvaluation','countFunctionEvaluation','countSkillsEvaluationDone','countFunctionEvaluationDone', 'reportData','evaluatorsRoles','evaluatorsRolesColors','feedback','functionsEvaluatorsRoles','document','feedbackcontrol','selectedEvaluation','evaluationsData','evaluationId'));
    }

    public function skills($document,$evaluation){
        //dd($document);
        $currentEvaluation = Evaluations::find($evaluation);

        $user = Auth::user();
        $userToEvaluate = Evaluators::where('user_id',$document)->where('evaluator_id',$user->document)->where('evaluation_id', $currentEvaluation->id)->first();
        $skills = Skills::where('evaluation_id', $currentEvaluation->id)->orderBy('type', 'asc')->orderBy('order', 'asc')->get();        
        Debugbar::info($skills, $userToEvaluate);
        return view('evaluation.skills', compact('user','userToEvaluate','skills','evaluation'));
    }

    public function functions($document,$evaluation){
        //dd($document);
        $currentEvaluation = Evaluations::find($evaluation);

        $user = Auth::user();
        $userToEvaluate = Evaluators::where('user_id',$document)->where('evaluator_id',$user->document)->where('evaluation_id', $currentEvaluation->id)->first();
        $functions = Functions::where('job_title',$userToEvaluate->user_job_title)->where('evaluation_id', $currentEvaluation->id)->orderBy('order', 'asc')->get();        
        $functionsScale = Config::get('constants.functions_scale');
        $functionsComment = Functions::where('job_title',"all")->first(); 
        $functionsIds =  $functions->keyBy('id')->keys();
        Debugbar::info($functions, $userToEvaluate,$functionsComment,$functionsIds);
        return view('evaluation.functions', compact('user','userToEvaluate','functions','functionsScale','functionsComment','functionsIds','evaluation'));
    }

    public function saveSkills(StoreSkillsEvaluation $request, $userToEvaluateDocument, $evaluation){        
        $currentEvaluation = Evaluations::find($evaluation);

        Debugbar::info($request, $userToEvaluateDocument);
        //dd($request, $userToEvaluateDocument, Auth::user()->document);
        EvaluationService::saveEvaluation($request->all(), $userToEvaluateDocument, Auth::user(), Config::get('constants.evaluation.skills'), $currentEvaluation->id);
        Session::flash('message', 'Se almacenó correctamente la evaluación de competencias');
        
        $urlToShow = ($userToEvaluateDocument == Auth::user()->document)? 'home' : 'home.team';
        return redirect()->route($urlToShow,['evaluation' => $evaluation]);
    }

    public function saveFunctions(StoreFunctionsEvaluation $request, $userToEvaluateDocument, $evaluation){        
        $currentEvaluation = Evaluations::find($evaluation);
        $functionsIds = $request->get("functionsIds");        

        Debugbar::info($request, $userToEvaluateDocument);
        //dd($request, $userToEvaluateDocument, $functionsIds);
        EvaluationService::saveEvaluation($request->all(), $userToEvaluateDocument, Auth::user(), Config::get('constants.evaluation.functions'), $currentEvaluation->id);
        Session::flash('message', 'Se almacenó correctamente la evaluación de funciones');
        $urlToShow = ($userToEvaluateDocument == Auth::user()->document)? 'home' : 'home.team';
        return redirect()->route($urlToShow,['evaluation' => $evaluation]);
    }

    public function showReports(Request $request){
        $user = Auth::user();
        $selectedEvaluation = $request->query('evaluation');
        $evaluationsData = Evaluations::orderBy('id', 'desc')->get();

        $currentEvaluation = ($request->has('evaluation') && $selectedEvaluation != 0) ? Evaluations::find($selectedEvaluation): null;
        $evaluationStatus =  ($request->has('evaluation') && $selectedEvaluation != 0)? EvaluationService::getEvaluationStatusWithAvg($currentEvaluation->id) : [];
        
        Debugbar::info($evaluationStatus,  $request->query('evaluation'), $request->has('evaluation'));
        return view('admin.reports.reports', compact('user','evaluationStatus', 'evaluationsData','selectedEvaluation'));
    }

    public function viewReport($document, $evaluation){        
        $currentEvaluation = Evaluations::find($evaluation);
        $reportData = EvaluationService::getEvaluationReport($document, $currentEvaluation->id);
        $evaluatorsRoles = Config::get('constants.evaluators_roles');
        $evaluatorsRolesColors = Config::get('constants.evaluators_colors');
        $functionsEvaluatorsRoles = Config::get('constants.evaluators_roles_functions');
        $feedback = FeedBack::where("user_document_evaluated",$document)
                                ->where("evaluation_id",$currentEvaluation->id)
                                ->first();
        $feedbackcontrol = FeedBackControl::where("user_document_evaluated",$document)
                                ->where("evaluation_id",$currentEvaluation->id)
                                ->first();                                
        Debugbar::info($document,$reportData,  $reportData['skillsEvaluation'], $reportData['functionsEvaluation'], $feedback, $feedbackcontrol);
        return view('admin.reports.report-detail', compact('reportData','evaluatorsRoles','evaluatorsRolesColors','feedback','functionsEvaluatorsRoles','document','feedbackcontrol','evaluation'));
    }

    public function createFeedback(Request $request, $document, $evaluation){        
        //dd(Auth::user(), $request->all());
        $currentEvaluation = Evaluations::find($evaluation);
        Session::flash('message', 'Se almacenó correctamente la retroalimentación ingresada');
        EvaluationService::enableFeedBack($document, $currentEvaluation->id, $request->all());
        
        if($document == Auth::user()->document){
            return redirect()->route('home.feedback',['evaluation' => $evaluation]);
        } else{
            return redirect()->route('report.detail',['document' => $document, 'evaluation' => $evaluation]);    
        }        
    }
    public function disableFeedBack($document, $evaluation){        
        $currentEvaluation = Evaluations::find($evaluation);
        EvaluationService::disableFeedBack($document, $currentEvaluation->id);
        return redirect()->route('report.detail',['document' => $document, 'evaluation' => $evaluation]);
    }

    public function closeFeedBack($document, $evaluation){
        $currentEvaluation = Evaluations::find($evaluation);
        EvaluationService::closeFeedBackEvaluation($document, $currentEvaluation->id);
        return redirect()->route('report.detail',['document' => $document, 'evaluation' => $evaluation]);
    }


    public function createFeedbackControl(Request $request, $document,$evaluation){        
        $currentEvaluation = Evaluations::find($evaluation);
        Session::flash('message', 'Se almacenó correctamente el seguimiento a la retroalimentación ingresada');
        //dd($document, $request->all(), $currentEvaluation);
        EvaluationService::enableFeedBackControl($document, $currentEvaluation->id, $request->all());
        
        //dd($document == Auth::user()->document, $request->all());
        if($document == Auth::user()->document){
            return redirect()->route('home.feedback', ['evaluation' => $evaluation]);
        } else{
            return redirect()->route('report.detail',['document' => $document, 'evaluation' => $evaluation]);    
        }
    }
    public function disableFeedBackControl($document){
        /*$currentEvaluation = Evaluations::find(1);
        EvaluationService::disableFeedBack($document, $currentEvaluation->id);
        return redirect()->route('report.detail',['document' => $document]);*/
    }

    public function closeFeedBackControl($document,$evaluation){
        $currentEvaluation = Evaluations::find($evaluation);
        EvaluationService::closeFeedBackControlEvaluation($document, $currentEvaluation->id);
        return redirect()->route('report.detail',['document' => $document, 'evaluation' => $evaluation]);
    }
}
