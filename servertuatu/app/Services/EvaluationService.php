<?php

namespace App\Services;

use App\Models\AccountsAllowed;
use App\Models\User;
use App\Models\Evaluators;
use App\Models\Evaluations;
use App\Models\EvaluationSkills;
use App\Models\EvaluationFunctions;
use App\Models\SkillsLevels;
use App\Models\Functions;
use App\Models\FeedBack;
use App\Models\FeedBackControl;
use App\Models\EvaluationUser;
use Config;
use Illuminate\Support\Facades\DB;


/**
 * Class to provide services operations related to evaluation functionality
 */

class EvaluationService
{
	public function validateGoogleUser($userData){
		
		$userAccount = AccountsAllowed::where('email',$userData->email)->first();				
		if(empty($userAccount))
			return $userAccount;
		
		$userPicture = DB::table('evaluators')
								->select('user_id', 'user_photo_link')
								->where('user_id', $userAccount->id)
								->distinct()
								->first();
		//dd($userPicture->user_photo_link, $userData->avatar_original);
		$user_photo_link = !isset($userPicture->user_photo_link) ? 'https://happyplanetgluky.co/sites/all/themes/gluky/marvel/images/default-picture.jpg' : $userPicture->user_photo_link;
		$user = User::updateOrCreate(
		    ['document' => $userAccount->id, 'email' => $userAccount->email],
		    ['name' => $userAccount->names , 'photo' => $user_photo_link, 'job_title' => $userAccount->job_title]
		);		
		return $user;		 
	}

	public function getUserEvaluations($userDocument, $evaluationId){		
		return Evaluators::where('evaluator_id',$userDocument)->where('evaluation_id', $evaluationId)->get();
	}

	public function saveEvaluation($dataToSave, $userToEvaluateDocument, $evaluator_user, $evaluationType, $evaluationId){		
		//dd($dataToSave, $userToEvaluateDocument, $evaluator_user, $evaluationType, $evaluationId);
		switch ($evaluationType) {
			case Config::get('constants.evaluation.skills'):				
				if(isset( $dataToSave['comunicacion'])){
					EvaluationSkills::updateOrCreate(
						['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'skill' => 'comunicacion', 'evaluation_id' => $evaluationId],
						['description' => '' , 'value' => $dataToSave['comunicacion'] ]				    
					);
				}
				if(isset($dataToSave['conocimiento'])){
					EvaluationSkills::updateOrCreate(
						['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'skill' => 'conocimiento', 'evaluation_id' => $evaluationId],
						['description' => '' , 'value' => $dataToSave['conocimiento'] ]				    
					);
				}
				if(isset($dataToSave['liderazgo'])){
					EvaluationSkills::updateOrCreate(
						['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'skill' => 'liderazgo', 'evaluation_id' => $evaluationId],
						['description' => '' , 'value' => $dataToSave['liderazgo'] ]				    
					);
				}
				if(isset($dataToSave['relaciones'])){
					EvaluationSkills::updateOrCreate(
						['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'skill' => 'relaciones', 'evaluation_id' => $evaluationId],
						['description' => '' , 'value' => $dataToSave['relaciones'] ]				    
					);
				}
				if(isset($dataToSave['resultados'])){
					EvaluationSkills::updateOrCreate(
						['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'skill' => 'resultados', 'evaluation_id' => $evaluationId],
						['description' => '' , 'value' => $dataToSave['resultados'] ]				    
					);
				}
				if(isset($dataToSave['actitud'])){
					EvaluationSkills::updateOrCreate(
						['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'skill' => 'actitud', 'evaluation_id' => $evaluationId],
						['description' => '' , 'value' => $dataToSave['actitud'] ]				    
					);
				}
				if(isset($dataToSave['velocidad'])){
					EvaluationSkills::updateOrCreate(
						['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'skill' => 'velocidad', 'evaluation_id' => $evaluationId],
						['description' => '' , 'value' => $dataToSave['velocidad'] ]				    
					);
				}
				if(isset($dataToSave['transformacion'])){
					EvaluationSkills::updateOrCreate(
						['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'skill' => 'transformacion', 'evaluation_id' => $evaluationId],
						['description' => '' , 'value' => $dataToSave['transformacion'] ]				    
					);
				}
				EvaluationSkills::updateOrCreate(
				    ['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'skill' => 'observaciones', 'evaluation_id' => $evaluationId],
				    ['description' => $dataToSave['observaciones'] , 'value' => 0 ]				    
				);

				$evaluatorData = Evaluators::where('user_id',$userToEvaluateDocument)->where('evaluator_id',$evaluator_user->document)->where('evaluation_id', $evaluationId)->first();
				$evaluatorData->skills_done = true;
				$evaluatorData->save();
				break;
			case Config::get('constants.evaluation.functions'):
				# code...				
				foreach ($dataToSave['functions'] as $key => $value) {
					EvaluationFunctions::updateOrCreate(
					    ['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'function_id' => $key, 'evaluation_id' => $evaluationId],
					    ['description' => '' , 'value' => $value ]				    
					);
				}
				EvaluationFunctions::updateOrCreate(
				    ['user_id' => $evaluator_user->id, 'user_document_evaluated' => $userToEvaluateDocument, 'function_id' => 1, 'evaluation_id' => $evaluationId],
				    ['description' => $dataToSave[1] , 'value' => 0 ]				    
				);
				$evaluatorData = Evaluators::where('user_id',$userToEvaluateDocument)->where('evaluator_id',$evaluator_user->document)->where('evaluation_id', $evaluationId)->first();
				$evaluatorData->functions_done = true;
				$evaluatorData->save();				
				break;
			default:
				# code...
				return false;
		}		
		return true;
	}

	public function getEvaluationStatus($evaluationId){				

		$evaluationStatus = DB::table('evaluators')
								->select('user_id', 'user_name','user_job_title', DB::raw('SUM(evaluate_functions) as total_functions'), DB::raw('SUM(evaluate_skills) as total_skills'), DB::raw('SUM(functions_done) as current_functions'), DB::raw('SUM(skills_done) as current_skills'))
								->where('evaluation_id', $evaluationId)
								->groupBy('user_id','user_name','user_job_title')
								->orderBy('user_name')								
								->get();

		return $evaluationStatus;
	}

	public function getEvaluationStatusWithAvg($evaluationId){				

		$evaluationStatus = DB::table('evaluators as EV')
								->leftJoin('evaluation_user as EU', function($join){
								    $join->on('EV.user_id', '=', 'EU.user_document_evaluated')
								         ->on('EV.evaluation_id', '=', 'EU.evaluation_id');
								})
								->select('EV.user_id', 'EV.user_name','EV.user_job_title', DB::raw('SUM(EV.evaluate_functions) as total_functions'), DB::raw('SUM(EV.evaluate_skills) as total_skills'), DB::raw('SUM(EV.functions_done) as current_functions'), DB::raw('SUM(EV.skills_done) as current_skills'),'EU.avg_skills', 'EU.avg_functions')
								->where('EV.evaluation_id', $evaluationId)
								->groupBy('EV.user_id','EV.user_name','EV.user_job_title','EU.avg_skills', 'EU.avg_functions')
								->orderBy('EV.user_name')								
								->get();

		return $evaluationStatus;
	}

	public function getEvaluationReport($document, $evaluationId){				

		$reportData = [];		
		$userToEvaluate = DB::table('evaluators')
								->select('user_id', 'user_name','user_job_title','user_job_title_link', 'user_photo_link', 'user_job_title_type')
								->where('user_id', $document)
								->where('evaluation_id', $evaluationId)
								->distinct()
								->first();
		$reportData['evaluators'] = Evaluators::where('user_id',$document)->where('evaluation_id', $evaluationId)->get();
		$reportData['user'] = $userToEvaluate;		
		$current_user_job_title = $userToEvaluate ? $reportData['user']->user_job_title : 'CEO';
		$current_user_job_type = $userToEvaluate ? $reportData['user']->user_job_title_type : 'estrategicos';
		//dd($current_user_job_type);
		//skills data									
		$desiredSkillsLevels = SkillsLevels::where('job_title_type',$current_user_job_type)->where('evaluation_id', $evaluationId)->orderBy('type')->get();	
		$reportData['desiredSkillsLevels'] = $desiredSkillsLevels->mapWithKeys(function ($item) {
															    	return [$item['type'] => $item['goal']];
																});
		$reportData['skillsTitles'] = $desiredSkillsLevels->pluck('description');
		$skillsEvaluationData = DB::table('evaluation_skills')
											->join('users', function ($join1) {
									            	$join1->on('evaluation_skills.user_id', '=', 'users.id');
									        	})
											->join('evaluators', function ($join2) {
										        	$join2->on('users.document', '=', 'evaluators.evaluator_id')
										            	 ->on('evaluation_skills.user_document_evaluated', '=', 'evaluators.user_id')
										            	 ->on('evaluation_skills.evaluation_id', '=', 'evaluators.evaluation_id');;
										        })
											->select('evaluators.evaluator_id','evaluators.evaluator_name','evaluators.evaluation_type','evaluators.weight','evaluation_skills.skill', 'evaluation_skills.value','evaluation_skills.description')
											->where('evaluation_skills.user_document_evaluated', $document)
											->where('evaluation_skills.evaluation_id', $evaluationId)
											->orderBy('evaluator_id')
											->orderBy('skill')
											->get();
											
		$reportData['skillsNotes'] = $skillsEvaluationData->where('skill','observaciones');		
		foreach (Config::get('constants.evaluators_roles') as $role) {
			$reportData['skillsEvaluation'][$role] = $skillsEvaluationData
														->where('skill','<>','observaciones')
														->where('evaluation_type',$role)
														->values();
		}
		
		//functions data		
		$reportData['functions'] = Functions::where('job_title',$current_user_job_title)->where('evaluation_id', $evaluationId)->orderBy('order', 'asc')->get();
		
		$functionsEvaluationData = DB::table('evaluation_functions')
											->join('users', function ($join1) {
									            	$join1->on('evaluation_functions.user_id', '=', 'users.id');
									        	})
											->join('evaluators', function ($join2) {
										        	$join2->on('users.document', '=', 'evaluators.evaluator_id')
										            	 ->on('evaluation_functions.user_document_evaluated', '=', 'evaluators.user_id')
										            	 ->on('evaluation_functions.evaluation_id', '=', 'evaluators.evaluation_id');
										        })
											->select('evaluators.evaluator_id','evaluators.evaluator_name','evaluators.evaluation_type','evaluators.weight','evaluation_functions.function_id', 'evaluation_functions.value','evaluation_functions.description')
											->where('evaluation_functions.user_document_evaluated', $document)
											->where('evaluators.evaluate_functions', 1)
											->where('evaluation_functions.evaluation_id', $evaluationId)
											->orderBy('evaluator_id')
											->orderBy('function_id')
											->get();
		$reportData['functionsNotes'] = $functionsEvaluationData->where('function_id',1);
		foreach (Config::get('constants.evaluators_roles_functions') as $role => $weight) {
			$reportData['functionsEvaluation'][$role] = $functionsEvaluationData
														->where('function_id','<>',1)
														->where('evaluation_type',$role)
														->keyBy('function_id');
		}
		//dd($reportData['skillsEvaluation'], $reportData['functionsEvaluation']);
		//$reportData['skillsAvg']

		return $reportData;
	}

	public function enableFeedBack($userToEvaluateDocument, $evaluationId, $data){
		//dd($userToEvaluateDocument, $evaluationId, $data);
		$expectativas = isset($data['expectativas'])? $data['expectativas']: '';
		$compromisos = isset($data['compromisos'])? $data['compromisos']: '';
		$formacion = isset($data['formacion'])? $data['formacion']: '';		
		$skillsAvg = isset($data['skills-avg-value'])? $data['skills-avg-value']: 0;
		$functionsAvg = isset($data['functions-avg-value'])? $data['functions-avg-value']: 0;
	
		$userToEvaluate = User::where('document',$userToEvaluateDocument)->first();
		
		EvaluationUser::updateOrCreate(
		    ['user_document_evaluated' => $userToEvaluateDocument, 'evaluation_id' => $evaluationId],
		    ['user_id' => $userToEvaluate->id, 'avg_skills' => $skillsAvg, 'avg_functions' => $functionsAvg]		    
		);
		
		FeedBack::updateOrCreate(
		    ['user_document_evaluated' => $userToEvaluateDocument, 'evaluation_id' => $evaluationId],
		    ['notes1' => $expectativas , 'notes2' => $compromisos, 'notes3' => $formacion]
		);
	}
	public function disableFeedBack($userToEvaluateDocument, $evaluationId){		
		$currentFeedBack = FeedBack::where('user_document_evaluated',$userToEvaluateDocument)
				->where('evaluation_id', $evaluationId)
				->first();		
		$currentFeedBack->delete();

		$currentEvaluationUser = EvaluationUser::where('user_document_evaluated',$userToEvaluateDocument)
				->where('evaluation_id', $evaluationId)
				->first();
		$currentEvaluationUser->delete();				
	}

	public function closeFeedBackEvaluation($userToEvaluateDocument, $evaluationId){		
		FeedBack::updateOrCreate(
		    ['user_document_evaluated' => $userToEvaluateDocument, 'evaluation_id' => $evaluationId],
		    ['is_closed' => 1]
		);
	}	

	public function enableFeedBackControl($userToEvaluateDocument, $evaluationId, $data){
		//dd($userToEvaluateDocument, $evaluationId, $data);
		$date = isset($data['date'])? $data['date']: '';
		$notes = isset($data['notes'])? $data['notes']: '';
		$status = isset($data['status'])? $data['status']: '';
		$skillsAvg = isset($data['skills-avg-value'])? $data['skills-avg-value']: 0;
		$functionsAvg = isset($data['functions-avg-value'])? $data['functions-avg-value']: 0;
	
		$userToEvaluate = User::where('document',$userToEvaluateDocument)->first();
		//dd($userToEvaluate->id, $userToEvaluateDocument, $skillsAvg, $functionsAvg);
		
		EvaluationUser::updateOrCreate(
		    ['user_document_evaluated' => $userToEvaluateDocument, 'evaluation_id' => $evaluationId],
		    ['user_id' => $userToEvaluate->id, 'avg_skills' => $skillsAvg, 'avg_functions' => $functionsAvg]		    
		);

		FeedBackControl::updateOrCreate(
		    ['user_document_evaluated' => $userToEvaluateDocument, 'evaluation_id' => $evaluationId],
		    ['date' => $date, 'notes' => $notes, 'status' => $status]
		);

	}

	public function disableFeedBackControl($userToEvaluateDocument, $evaluationId){		
		$currentFeedBack = FeedBackControl::where('user_document_evaluated',$userToEvaluateDocument)
				->where('evaluation_id', $evaluationId)
				->first();		
		$currentFeedBack->delete();
	}

	public function closeFeedBackControlEvaluation($userToEvaluateDocument, $evaluationId){		
		FeedBackControl::updateOrCreate(
		    ['user_document_evaluated' => $userToEvaluateDocument, 'evaluation_id' => $evaluationId],
		    ['is_closed' => 1]
		);
	}
}