@extends('voyager::master')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-certificate"></i> <strong class="text-primary">{{ $reportData['user']->user_name }}</strong> ({{ $reportData['user']->user_job_title }}) @if( isset($feedback) && $feedback['is_closed']) <span class="label label-success">Evaluación Finalizada</span> @endif            
        </h1><a href="{{ route('reports',['evaluation' => $evaluation]) }}" class="btn btn-primary btn-simple">Volver</a>
    </div>
@stop

@section('content')
	<div class="page-content browse container-fluid">        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="card" style="padding-bottom: 10px;">                
                            <div class="content">                    
                                    <div class="col-sm-4 text-center">
                                        <img src="{{ $reportData['user']->user_photo_link }}" alt="Raised Image" class="img-rounded img-responsive img-raised center-block" style="max-height: 180px">
                                    </div>
                                    <div class="col-sm-8">                                        
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
                                                            <span class="label label-success">Funciones</span>
                                                        @else
                                                            <span class="label label-danger">Funciones</span>
                                                        @endif
                                                    @endif
                                                </p>
                                            @endforeach
                                        </div>

                                        
                                        @if( !isset($feedback))
                                            <div class="col-md-12">
                                                {!! Form::open(['route' => ['feedback.save', $reportData['user']->user_id, $evaluation], 'role'=>'form']) !!}                                    
                                                    <input type="hidden" name="skills-avg-value" class="skills-avg-value">
                                                    <input type="hidden" name="functions-avg-value" class="functions-avg-value">     
                                                    {!! Form::submit("Activar Retroalimentación", ["class"=>"btn btn-primary btn-xs" , "id" => "btnEnableFeedback", "data-toggle"=>"tooltip", "title"=>"Activar Retroalimentación"]) !!}                                    
                                                {!! Form::close() !!}
                                            </div>
                                        @else 
                                            @if(!$feedback['is_closed'])
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => ['feedback.disable', $reportData['user']->user_id, $evaluation], 'role'=>'form', "style"=>"display:  inline-block;"]) !!}                                    
                                                        {!! Form::submit("Inactivar Retroalimentación", ["class"=>"btn btn-primary btn-xs" , "id" => "btnEnableFeedback", "data-toggle"=>"tooltip", "title"=>"Inactivar Retroalimentación"]) !!}                                    
                                                    {!! Form::close() !!}
                                                
                                                    {!! Form::open(['route' => ['feedback.close', $reportData['user']->user_id, $evaluation], 'role'=>'form', "style"=>"display:  inline-block;"]) !!}                                    
                                                        {!! Form::submit("Finalizar Retroalimentación", ["class"=>"btn btn-warning btn-xs" , "id" => "btnEnableFeedback", "data-toggle"=>"tooltip", "title"=>"Finalizar Retroalimentación"]) !!}                                    
                                                    {!! Form::close() !!}
                                                </div>
                                            @elseif(isset($feedbackcontrol) && !$feedbackcontrol['is_closed'])
                                                <div class="col-md-12">
                                                    {!! Form::open(['route' => ['feedbackcontrol.close', $reportData['user']->user_id, $evaluation], 'role'=>'form']) !!}                                    
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
                                @include('evaluation.feedback', ['reportData'=>$reportData, 'evaluatorsRoles'=>$evaluatorsRoles, 'evaluatorsRolesColors'=>$evaluatorsRolesColors, 'feedback'=>$feedback, 'functionsEvaluatorsRoles'=>$functionsEvaluatorsRoles, 'document'=>$document, 'feedbackcontrol'=>$feedbackcontrol, 'evaluation' => $evaluation])                     
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="{{ asset('css/circle.css') }}" rel="stylesheet" />
@stop

@section('javascript')    
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material-kit.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    
    
    @stack('scripts')    
@stop

