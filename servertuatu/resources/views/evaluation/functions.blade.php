@extends('layouts.home')

@section('content')
	<div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                       @if( $userToEvaluate->user_id ==  $userToEvaluate->evaluator_id) 
                            <img src="https://ui-avatars.com/api/?name={{ $user->name }}&size=300" alt="{{ $user->name }}" class="img-circle img-responsive img-raised">
                        @else 
                            <img src="https://ui-avatars.com/api/?name={{ $userToEvaluate->name }}&size=300" alt="{{ $userToEvaluate->user_name  }}" class="img-circle img-responsive img-raised">
                        @endif                       
                    </div>
                    <div class="name">
                        @if( $userToEvaluate->user_id ==  $userToEvaluate->evaluator_id) 
                            <h3 class="title">{{ $user->name }}</h3>
                            <h6 class="text-primary">{{ $user->job_title }}</h6>
                        @else 
                            <h3 class="title">{{ $userToEvaluate->user_name }}</h3>
                            <h6 class="text-primary">{{ $userToEvaluate->user_job_title }}</h6>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-sm-offset-1 text-justify">
            	<h3>
                    @if( $userToEvaluate->user_id ==  $userToEvaluate->evaluator_id) 
                        Autoevaluación de retos
                    @else 
                         Evaluación de retos de {{ $userToEvaluate->user_name }}
                    @endif
                    
                </h3>
                <h5>
                <p>                    
                    @if( $userToEvaluate->user_id ==  $userToEvaluate->evaluator_id) 
                        Aquí encontrarás los retos que asignó tu líder para realizar este TÚ A TÚ. Responde pensando en tu día a día, en datos y hechos. Se lo más objetivo posible, reconociendo las fortalezas y oportunidades de mejora. Lee atentamente cada reto y ubica tu puntuación en el valor que consideres corresponde a tu desempeño.
                    @else 
                        Aquí encontrarás los retos que evaluarás en este TÚ A TÚ. Responde pensando en su día a día, en datos y hechos. Sé lo más objetivo posible, reconociendo las fortalezas y oportunidades de mejora del Glüker. Lee atentamente cada reto y ubica tu puntuación en el valor que consideres corresponde a su desempeño.
                    @endif                                        
                </p>
                    </h5>
                                
            </div>                        

            <div class="col-sm-10 col-sm-offset-1 text-justify">
                @if( $userToEvaluate->functions_done ) 
                    <div class="alert alert-success">
                        <div class="container-fluid">
                          <div class="alert-icon">
                            <i class="material-icons">check</i>
                          </div>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                          </button>
                          <b>Listo:</b> Ya calificaste los retos de {{ $userToEvaluate->user_name }}
                        </div>
                    </div>
                    <div class="text-center"><a href="{{ route('home') }}" class="btn btn-primary btn-simple">Volver</a></div>
                @else
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <div class="container-fluid">
                              <div class="alert-icon">
                                <i class="material-icons">error_outline</i>
                              </div>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                              </button>
                              <b>Error:</b>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>  
                            </div>
                        </div>                       
                    @endif
                    {!! Form::open(['route' => ['functions.save', $userToEvaluate->user_id, $evaluation], 'id' => 'functionsForm', 'role'=>'form']) !!}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>                                    
                                        <th>Reto</th>                                        
                                        <th></th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($functions as $function) 
                                        <tr >                                    
                                            <td>{{ $function->description }}</td>                                            
                                            <td class="text-right">
                                                @foreach($functionsScale as $scale) 
                                                    
                                                        <label style="min-width: 30px; width: 100%;">
                                                            {!! Form::radio('functions['.$function->id.']'  , $scale, false,['required', 'data-msg'=>'']) !!} {{$scale}}                                                            
                                                        </label>
                                                    
                                               @endforeach
                                            </td>                                    
                                        </tr>
                                    @endforeach
                                 </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col">
                                {!! Form::textarea($functionsComment->id, null, ['placeholder' => 'Comentarios para construir', 'rows' => '5', 'class'=>'form-control', 'maxlength'=>'4000']) !!}
                                {!! Form::hidden('functionsIds', $functionsIds) !!}  
                            </div>
                        </div>
                        <div class="text-center">
                            @if( $userToEvaluate->user_id ==  $userToEvaluate->evaluator_id) 
                                <a href="{{ route('home',['evaluation' => $evaluation]) }}" class="btn btn-primary btn-simple">Cancelar</a>
                            @else 
                                <a href="{{ route('home.team',['evaluation' => $evaluation]) }}" class="btn btn-primary btn-simple">Cancelar</a>
                            @endif                            
                            {!! Form::submit('Guardar', ["class"=>"btn btn-primary" , 'id' => 'btnSendData']) !!}

                        </div>
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
@endsection
@push('scripts')

     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>    
    <script type="text/javascript">
        $(document).ready(function() {            
            $("#functionsForm").validate({
                submitHandler: function(form) {
                    $("#btnSendData").addClass("disabled")
                    form.submit();
                }
            });
        });

    </script>  
@endpush