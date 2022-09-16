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
                        Autoevaluación de competencias
                    @else 
                         Evaluación de competencias de {{ $userToEvaluate->user_name }}
                    @endif
                </h3>
                <h5>
                <p>                    
                    @if( $userToEvaluate->user_id ==  $userToEvaluate->evaluator_id) 
                        Aquí encontrarás las competencias Glüky que fueron asignadas para este TÚ A TÚ. Responde pensando en tu día a día, en datos y hechos. Se lo más objetivo posible, reconociendo las fortalezas y oportunidades de mejora. Lee atentamente cada enunciado de la competencia y ubica tu puntuación en el enunciado que consideres cumples en la mayor parte de tu tiempo, es decir, un comportamiento constante en tu vida
                    @else 
                        Aquí encontrarás las competencias Glüky que fueron asignadas para este TÚ A TÚ. Responde pensando en su día a día, en datos y hechos. Sé lo más objetivo posible, reconociendo las fortalezas y oportunidades de mejora del Glüker. Lee atentamente cada enunciado de la competencia y ubica tu puntuación en el enunciado que consideres cumple en la mayor parte de su tiempo, es decir, un comportamiento constante en su vida.
                    @endif 

                    
                </p>
                </h5>
            </div>			
            <div class="col-sm-10 col-sm-offset-1">
                @if( $userToEvaluate->skills_done ) 
                    <div class="alert alert-success">
                        <div class="container-fluid">
                          <div class="alert-icon">
                            <i class="material-icons">check</i>
                          </div>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                          </button>
                          <b>Listo:</b> Ya calificaste las competencias de {{ $userToEvaluate->user_name }}
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
                    {!! Form::open(['route' => ['skills.save', $userToEvaluate->user_id, $evaluation], 'id' => 'skillsForm', 'role'=>'form']) !!}
                        <div class="table-responsive">
                            <table class="table" id="table-skills" style="display: none;">
                                <thead>
                                    <tr>                                    
                                        <th>Competencia</th>
                                        <th>Descripción</th>
                                        <th></th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($skills as $skill)                                        
                                        <tr class="{{ $skill->type }}">                                    
                                            <td class="skillrow">{{ $skill->skill }}</td>
                                            <td>{{ $skill->description }}</td>                                    
                                            <td class="text-right">
                                                <label style="min-width: 30px; width: 100%;">
                                                    {!! Form::radio($skill->type, $skill->order, false,['required', 'data-msg'=>'']) !!} {{$skill->order}}
                                                </label>
                                            </td>                                    
                                        </tr>
                                    @endforeach
                                 </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="skills-all" id="skills-all" value="{{ $skills }}">                        
                        <div class="row">
                            <div class="col">
                                {!! Form::textarea('observaciones', null, ['placeholder' => 'Comentarios para construir', 'rows' => '5', 'class'=>'form-control', 'maxlength'=>'4000']) !!}                                
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
            $("#skillsForm").validate({
                submitHandler: function(form) {
                    $("#btnSendData").addClass("disabled")
                    form.submit();
                }
            });
            var skillsData = JSON.parse($("#skills-all").val());
            var skillsToGroup = {};
            $.each(skillsData, function(index,value ) {              
              if(skillsToGroup[value.type] == null){
                skillsToGroup[value.type] = {};
                skillsToGroup[value.type]["name"] = value.skill;
                skillsToGroup[value.type]["count"] = 1;
              }else{
                skillsToGroup[value.type]["name"] = value.skill;
                skillsToGroup[value.type]["count"] += 1;
              }                            
            });
            $.each(skillsToGroup, function(index,value ) {
                //console.log(index,value);
                $("."+index+">.skillrow:first").addClass("firstSkillRow");
                $("."+index+">.skillrow:first").attr("rowspan", value.count);
                $("."+index+">.skillrow:first").removeClass("skillrow");
                $("."+index+">.skillrow").remove();
            });
            $("#table-skills").show()

        });

    </script>    
    
@endpush