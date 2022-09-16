@extends('layouts.home')

@section('content')
	<div class="profile-content">
        <div class="container">            
            <div class="title">
                <h3><strong>Estado actual de evaluaciones</strong></h3>
            </div>         
            <div class="card">                
                <div class="content">
                    
                        <div class="col-sm-4 text-center">
                            <img src="{{ $reportData['user']->user_photo_link }}" alt="Raised Image" class="img-rounded img-responsive img-raised center-block" style="max-height: 180px">
                        </div>
                        <div class="col-sm-8"> 
                            <div class="col-sm-12" >
                                <h4><strong class="text-primary">{{ $reportData['user']->user_name }}</strong> ({{ $reportData['user']->user_job_title }}) @if( isset($feedback) && $feedback['is_closed']) <span class="label label-success">Evaluación Finalizada</span> @endif</h4>
                            </div>                   
                            <div class="col-md-12" >
                                <h5 class="text-primary">Evaluadores</h5>
                            </div>
                            <div class="col-md-12"> 
                                @foreach($reportData['evaluators'] as $evaluator)
                                    <p>
                                        {{ $evaluator->evaluator_name }} - <strong>{{ $evaluator->evaluation_type}}</strong>
                                        @if( $evaluator->evaluate_skills == 1)
                                            @if( $evaluator->evaluate_skills == $evaluator->skills_done)
                                                <span class="label label-success">Competencias</span>
                                            @else
                                                <span class="label label-danger">Competencias</span>
                                            @endif
                                        @endif
                                        @if( $evaluator->evaluate_functions == 1) 
                                            @if( $evaluator->evaluate_functions == $evaluator->functions_done)
                                                <span class="label label-success">Retos</span>
                                            @else
                                                <span class="label label-danger">Retos</span>
                                            @endif
                                        @endif
                                    </p>
                                @endforeach
                            </div>

                            
                            @if( !isset($feedback))
                                <div class="col-md-12">
                                    {!! Form::open(['route' => ['feedback.save',  $reportData['user']->user_id], 'role'=>'form']) !!}                                        
                                        {!! Form::submit("Activar Retroalimentación", ["class"=>"btn btn-primary btn-xs" , "id" => "btnEnableFeedback", "data-toggle"=>"tooltip", "title"=>"Activar Retroalimentación"]) !!}                                    
                                    {!! Form::close() !!}
                                </div>
                            @else
                                @if(!$feedback['is_closed'])
                                    <div class="col-md-4">
                                        {!! Form::open(['route' => ['feedback.disable',  $reportData['user']->user_id], 'role'=>'form']) !!}                                    
                                            {!! Form::submit("Inactivar Retroalimentación", ["class"=>"btn btn-primary btn-xs" , "id" => "btnEnableFeedback", "data-toggle"=>"tooltip", "title"=>"Inactivar Retroalimentación"]) !!}                                    
                                        {!! Form::close() !!}
                                    </div>                                
                                    <div class="col-md-4">
                                        {!! Form::open(['route' => ['feedback.close',  $reportData['user']->user_id], 'role'=>'form']) !!}                                    
                                            {!! Form::submit("Finalizar Retroalimentación", ["class"=>"btn btn-warning btn-xs" , "id" => "btnEnableFeedback", "data-toggle"=>"tooltip", "title"=>"Finalizar Retroalimentación"]) !!}                                    
                                        {!! Form::close() !!}
                                    </div>
                                @elseif(isset($feedbackcontrol) && !$feedbackcontrol['is_closed'])                                    
                                    <div class="col-md-12">
                                        {!! Form::open(['route' => ['feedbackcontrol.close',  $reportData['user']->user_id], 'role'=>'form']) !!}                                    
                                            {!! Form::submit("Finalizar Seguimiento", ["class"=>"btn btn-warning btn-xs" , "id" => "btnEnableFeedback", "data-toggle"=>"tooltip", "title"=>"Finalizar Seguimiento"]) !!}                                    
                                        {!! Form::close() !!}
                                    </div>
                                @endif
                            @endif
                            
                        </div>

                </div>
            </div>
            
            <!--  partial view (feedback) -->
            <div class="row">
                <div class="col-sm-12">
                    @include('evaluation.feedback', ['reportData'=>$reportData, 'evaluatorsRoles'=>$evaluatorsRoles, 'evaluatorsRolesColors'=>$evaluatorsRolesColors, 'feedback'=>$feedback, 'functionsEvaluatorsRoles'=>$functionsEvaluatorsRoles, 'document'=>$document, 'feedbackcontrol'=>$feedbackcontrol])                     
                </div>
            </div>
                       
            <div class="text-center">
                <a href="{{ route('reports') }}" class="btn btn-primary btn-simple">Volver</a>                                            
            </div>		
            <div class="row">&nbsp;</div>
        </div>
    </div>
@endsection
