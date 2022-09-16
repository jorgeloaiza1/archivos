<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluators;

class CanEvaluate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $evaluatorDocument = Auth::user()->document;
        $userToEvaluateDocument = $request->document;
        $is_evaluator = Evaluators::where('user_id',$userToEvaluateDocument)->where('evaluator_id',$evaluatorDocument)->first();
        //dd($evaluator_document, $user_to_evaluate_document, $is_evaluator, empty($is_evaluator));
        if(empty($is_evaluator))
            return redirect('/home');
        return $next($request);
    }
}
