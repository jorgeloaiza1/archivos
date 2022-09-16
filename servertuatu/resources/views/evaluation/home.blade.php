@extends('layouts.home')

@section('content')
	<div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
    	           <div class="profile">
                       <div class="avatar">
                           <img src="https://ui-avatars.com/api/?name={{ $user->name }}&size=300" alt="{{ $user->name }}" class="img-circle img-responsive img-raised">
                       </div>
                       <div class="name">
                           <h3 class="title"><span class="text-primary">Bienvenid@ </span>{{ $user->name }}</h3>
   						<h6 class="text-primary">{{ $user->job_title }}</h6>
                       </div>
                   </div>
	            </div>                
            </div>           
            <div class="row">
				<div class="col-sm-10 col-sm-offset-1 text-justify">
	                <h5>
	                	En la Evaluación “Tú a Tú” conversaremos sobre las competencias y retos esperados en tu rol actual, <strong>alinearemos expectativas, entenderemos la importancia de contribuir a un ambiente laboral armónico y tendremos en cuenta nuestro aporte individual y conocimiento puntual para el logro de los objetivos grupales.</strong><br>
	                	Este TÚ a TÚ tendrá varios momentos:<br>
	                	Autoevaluación: Se generará un concepto personal sobre nuestro desempeño y actitud Glüker.<br>
	                	Evaluación de líderes y pares: Será un espacio para evaluar y recibir evaluaciones sustentadas en datos y hechos. <br>
	                	Conversación “TÚ a TÚ”: Se creará un espacio para recibir y entregar retroalimentación, reconocimiento y construir planes de mejora. <br>
	                	Seguimiento a planes de acción: Se fijará una fecha para verificar el cumplimiento de los compromisos asignados.
					</h5>
					
				</div>
			</div>
			@if(Session::has('message'))
				<div class="alert alert-success">
				    <div class="container-fluid">
					  <div class="alert-icon">
						<i class="material-icons">check</i>
					  </div>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true"><i class="material-icons">clear</i></span>
					  </button>
				      {{ Session::get('message') }}
				    </div>
				</div>
				
			@endif
			
			<form method="get" class="form-search">
			    <div class="row">                          
			      <div class="col-md-offset-2 col-md-8 col-lg-6 col-lg-offset-3">
			        <div class="input-group">
			            <select id="evaluation" name="evaluation" class="form-control">
			                <option value="0" >Seleccionar evaluación</option>
			                @foreach($evaluationsData as $evaluation)
			                        <option value="{{ $evaluation->id }}" @if($evaluation->id == $selectedEvaluation){{ 'selected' }}@endif>{{ $evaluation->name }}</option>
			                @endforeach                                        
			            </select>                                
			            <span class="input-group-btn">
			                <button class="btn btn-primary" type="submit" style="margin:  0px;">Cargar Datos</button>
			            </span>
			        </div><!-- /input-group -->
			      </div><!-- /.col-lg-6 -->
			    </div>                      
			</form> 

			@if ($selectedEvaluation && $selectedEvaluation != 0)	
				@if ($evaluations->isNotEmpty())
					<h4 class="text-center"><strong>Progreso</strong></h4>
					<div class="row padding">
						<div class="col-md-8 col-md-offset-2 text-center">
							Evaluación de competencias ({{$countSkillsEvaluationDone}}/{{$countSkillsEvaluation}})
							<div class="progress">
								<div class="progress-bar progress-line-primary"" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $countSkillsEvaluationDone / $countSkillsEvaluation * 100}}%;">
								<span class="sr-only">{{ $countSkillsEvaluationDone / $countSkillsEvaluation * 100}}% Completado</span>
								</div>
							</div>
						</div>
						<div class="col-md-8 col-md-offset-2 text-center">
							Evaluación de retos ({{$countFunctionEvaluationDone}}/{{$countFunctionEvaluation}}) 
							<div class="progress">
								<div class="progress-bar progress-line-primary"" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $countFunctionEvaluationDone / (($countFunctionEvaluation == 0)? 1 :$countFunctionEvaluation) * 100 }}%;">
								<span class="sr-only">{{ $countFunctionEvaluationDone / (($countFunctionEvaluation == 0)? 1 : $countFunctionEvaluation) * 100 }}% Completado</span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="profile-tabs">
			                    <div class="nav-align-center">
									<ul class="nav nav-pills" role="tablist" id="evaluationTabs">
										<li class="active">
											<a href="#assessment" role="tab" data-toggle="tab">
												<i class="material-icons">assessment</i>
												Autoevaluación
											</a>
										</li>
										<li>
				                            <a href="#group" role="tab" data-toggle="tab">
												<i class="material-icons">group</i>
												Equipo
				                            </a>
				                        </li>
				                        @if( ($countSkillsEvaluationDone == $countSkillsEvaluation) && ( $countFunctionEvaluationDone == $countFunctionEvaluation) )
					                        <li>
					                            <a href="#feedbackTab" role="tab" data-toggle="tab">
													<i class="material-icons">assessment</i>
													Resultados
					                            </a>
					                        </li>	
					                    @endif
				                    </ul>

				                    <div class="tab-content gallery">
										<div class="tab-pane active" id="assessment">
				                        	@foreach($evaluations as $evaluation)   
						                        @if($evaluation->evaluation_type == 'Autoevaluación')
						                            <div class="row vcenter">
														<div class="col-sm-6 text-right text-capitalize" style="padding-top: 10px">
															
															@if( ($evaluation->evaluate_functions == $evaluation->functions_done) && ($evaluation->evaluate_skills == $evaluation->skills_done))
																<span class="label label-success">Finalizada</span>
															@else
																<span class="label label-danger">Pendiente</span>
															@endif	
															{{ $evaluation->user_name }}
														</div>
														<div class="col-sm-6 text-left">
															
															@if( $evaluation->skills_done && $evaluation->functions_done)
																<span class="btn btn-success btn-xs btn-just-icon btn-simple" data-toggle="tooltip" data-placement="top" title="Lista la evaluación de {{ $evaluation->user_name }}" target="_blank" style="padding: 0px;">
																	<i class="material-icons">assignment_turned_in</i>
																</span>
															@else
																<span class="btn btn-warning btn-xs btn-just-icon btn-simple" data-toggle="tooltip" data-placement="top" title="No has terminado la evaluación de {{ $evaluation->user_name }}" target="_blank" style="padding: 0px;">
																	<i class="material-icons">assignment_late</i>
																</span>
															@endif

															@if( $evaluation->evaluate_skills )	
																@if( $evaluation->skills_done )
																	<span class="label label-success" data-toggle="tooltip" data-placement="bottom" title="Listo!!!">Competencias</span>
																@else
																	<a href="{{ route('skills',['document' => $evaluation->user_id,'evaluation' => $evaluationId]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="bottom" title="Evaluar competencias">Competencias</a>
																@endif
															@endif
															@if( $evaluation->evaluate_functions )
																@if( $evaluation->functions_done )
																	<span class="label label-success" data-toggle="tooltip" data-placement="bottom" title="Listo!!!">Retos</span>
																@else
																	<a href="{{ route('functions',['document' => $evaluation->user_id, 'evaluation' => $evaluationId]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="bottom" title="Evaluar retos">Retos</a>
																@endif
															@endif
															
															
														</div>																								
						                            </div>
						                        @endif
				                            @endforeach
				                        </div>
				                        <div class="tab-pane text-center" id="group">
											<div class="row">
												<div class="col-md-12">
													<div class="table-responsive">
													  <table class="table table-condensed table-hover">											    
													    <tbody>
													    	@foreach($evaluations as $evaluation)   
						                        				@if($evaluation->evaluation_type != 'Autoevaluación') 
															    	<tr>											    		
															    		<td>
								    			                            <div class="vcenter">
								    											<div class="col-sm-6 text-right text-capitalize" style="padding-top: 10px">
								    												@if( ($evaluation->evaluate_functions == $evaluation->functions_done) && ($evaluation->evaluate_skills == $evaluation->skills_done))
								    													<span class="label label-success">Finalizada</span>
								    												@else
								    													<span class="label label-danger">Pendiente</span>
								    												@endif	
								    												{{ $evaluation->user_name }}				
								    											</div>
								    											<div class="col-sm-6 text-left">
								    												@if( $evaluation->skills_done && ($evaluation->functions_done == $evaluation->evaluate_functions))
								    													<span class="btn btn-success btn-xs btn-just-icon btn-simple" style="padding: 0px;" data-toggle="tooltip" data-placement="right" title="Lista la evaluación de {{ $evaluation->user_name }}" target="_blank">
								    														<i class="material-icons">assignment_turned_in</i>
								    													</span>
								    												@else
								    													<span class="btn btn-warning btn-xs btn-just-icon btn-simple" style="padding: 0px;" data-toggle="tooltip" data-placement="right" title="No has terminado la evaluación de {{ $evaluation->user_name }}" target="_blank">
								    														<i class="material-icons">assignment_late</i>
								    													</span>
								    												@endif

								    												@if( $evaluation->evaluate_skills )	
								    													@if( $evaluation->skills_done )
								    														<span class="label label-success" data-toggle="tooltip" data-placement="bottom" title="Listo!!!">Competencias</span>
								    													@else
								    														<a href="{{ route('skills',['document' => $evaluation->user_id, 'evaluation' => $evaluationId]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="bottom" title="Evaluar competencias">Competencias</a>
								    													@endif
								    												@endif
								    												@if( $evaluation->evaluate_functions )
								    													@if( $evaluation->functions_done )
								    														<span class="label label-success" data-toggle="tooltip" data-placement="bottom" title="Listo!!!">Retos</span>
								    													@else
								    														<a href="{{ route('functions',['document' => $evaluation->user_id,'evaluation' => $evaluationId]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="bottom" title="Evaluar retos">Retos</a>
								    													@endif
								    												@endif
								    											</div>																								
								    			                            </div>
															    		</td> 											    		
															    	</tr> 
																@endif
								                            @endforeach
													    </tbody>
													  </table>
													</div>
												</div>										
											</div>
				                        </div>								
				                        <div class="tab-pane text-center" id="feedbackTab">
											@if( !isset($feedback) )
												<div class="row">
													<div class="col-md-12 text-justify">
														Has finalizado con éxito los módulos de valoración. Ahora tendremos el insumo para generar conversaciones con los equipos, alinear expectativas y plantearnos planes de mejora a nivel personal y profesional. <br>
														Espera tu cita con Talento Humano para conocer los resultados. Ellos junto a tu líder, acompañarán tu proceso.
													</div>
												</div>
											@else
												<div class="row">
												    <div class="col-sm-12">
												        @include('evaluation.feedback', ['reportData'=>$reportData, 'evaluatorsRoles'=>$evaluatorsRoles, 'evaluatorsRolesColors'=>$evaluatorsRolesColors, 'feedback'=>$feedback, 'functionsEvaluatorsRoles'=>$functionsEvaluatorsRoles, 'document'=>$document, 'feedbackcontrol'=>$feedbackcontrol, 'evaluation' => $evaluationId])                     
												    </div>
												</div>
											@endif
										</div>
				                    </div>
								</div>
							</div>
							<!-- End Profile Tabs -->
						</div>
		            </div>
	        	@else
	        		<h6 class="text-center text-danger"><strong>No tienes información registrada para el periodo de evaluación seleccionado, favor selecciona otro periodo.</strong></h6>
	        	@endif
	        @endif
        </div>
    </div>
@endsection
@push('scripts')   
    <script type="text/javascript">
        $(document).ready(function() {            
            var url = document.location.toString();
            if (url.match('#')) {
            	console.log("here", url.split('#')[1]);                
                $('#evaluationTabs a[href="#' + url.split('#')[1] + '"]').tab('show')
            } 
            $('#evaluationTabs a').on('shown', function (e) {
                window.location.hash = e.target.hash.replace("#", "#" + prefix);
            });          
        });

    </script>    
    
@endpush