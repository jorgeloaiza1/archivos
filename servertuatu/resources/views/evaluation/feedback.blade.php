<div class="card card-nav-tabs">
    <div class="header header-primary">
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="active">
                        <a href="#skills" data-toggle="tab" aria-expanded="true">
                            <i class="material-icons">face</i>
                            Competencias
                        </a>
                    </li>
                    <li class="">
                        <a href="#functions" data-toggle="tab" aria-expanded="false">
                            <i class="material-icons">playlist_add_check</i>
                            Retos
                        </a>
                    </li>
                    <li>
                        <a href="#feedback" data-toggle="tab">
                            <i class="material-icons">feedback</i>
                            Conversación TÚ a TÚ
                        </a>
                    </li>
                    <li>
                        <a href="#feedback-control" data-toggle="tab">
                            <i class="material-icons">assignment_turned_in</i>
                            Seguimiento
                        </a>
                    </li>
                    <li>
                        <a href="#feedback-avg" data-toggle="tab">
                            <i class="material-icons">donut_small</i>
                            Promedio
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="tab-content text-center">
            <div class="tab-pane active" id="skills">
                <div class="row">
                    <div class="col-md-8">                                     
                        <canvas id="skillsChart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-primary"><span >Comentarios para construir </span></h5>
                        @foreach($reportData['skillsNotes'] as $notes)
                            <blockquote>
                                <p>{{$notes->description}} </p>
                                <small>{{$notes->evaluator_name}}, {{$notes->evaluation_type}}</small>
                            </blockquote>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="functions">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>                                    
                                <th class="text-center">Reto</th>                                
                                <th></th>                                    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reportData['functions'] as $function) 
                                <tr >                                    
                                    <td class="text-left">{{ $function->description }}</td>             
                                    <td class="text-right" style="width: 130px;">                                     
                                        <span class="functionsData" data-function="{{ $function->id }}"></span>
                                    </td>                                    
                                </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
                <h5 class="text-primary"><span >Comentarios para construir </span></h5>
                @foreach($reportData['functionsNotes'] as $notes)
                    <div class="col-md-4">                                            
                        <blockquote>
                            <p>{{$notes->description}} </p>
                            <small>{{$notes->evaluator_name}}, {{$notes->evaluation_type}}</small>
                        </blockquote>
                    </div>
                @endforeach


            </div>
            <div class="tab-pane" id="feedback">
                {!! Form::open(['route' => ['feedback.save', $document , $evaluation], 'id' => 'feedBackForm', 'role'=>'form']) !!}
                    
                    <div class="col-sm-12">
                        <p>Un espacio  que permitirá un contacto cercano, cálido y retador con tu líder.</p>
                    </div>
                    <div class="col-sm-12">
                        @if( isset($feedback) && $feedback['is_closed'] && isset($feedbackcontrol) && $feedbackcontrol['is_closed']) 
                            <span class="label label-success">Evaluación Finalizada</span> 
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons" data-toggle='tooltip' title='Alineando expectativas' data-placement='bottom'>group</i>
                            </span>                                                
                            {!! Form::textarea("expectativas", isset($feedback->notes1)? $feedback->notes1 : null, ['placeholder' => 'Alineando expectativas', 'rows' => '5', 'class'=>'form-control inputFeedback', 'maxlength'=>'4000', 'required', 'data-msg'=>'Debes ingresar las expectativas']) !!}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons" data-toggle='tooltip' title='Compromisos' data-placement='bottom'>date_range</i>
                            </span>                                                
                            {!! Form::textarea("compromisos", isset($feedback->notes2)? $feedback->notes2 : null, ['placeholder' => 'Compromisos', 'rows' => '5', 'class'=>'form-control inputFeedback', 'maxlength'=>'4000', 'required', 'data-msg'=>'Debes ingresar compromisos']) !!}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons" data-toggle='tooltip' title='Necesidades de formación' data-placement='bottom'>library_books</i>
                            </span>                                                
                            {!! Form::textarea("formacion", isset($feedback->notes3)? $feedback->notes3 : null, ['placeholder' => 'Necesidades de formación', 'rows' => '5', 'class'=>'form-control inputFeedback', 'maxlength'=>'4000', 'required', 'data-msg'=>'Debes ingresar las necesidades de formación']) !!}
                        </div>
                    </div>
                    <input type="hidden" name="skills-avg-value" class="skills-avg-value">
                    <input type="hidden" name="functions-avg-value" class="functions-avg-value">
                    @if( isset($feedback) && !$feedback['is_closed']) 
                        <div class="text-center">
                            {!! Form::submit('Guardar', ["class"=>"btn btn-primary" , 'id' => 'btnSendData']) !!}
                        </div>
                    @endif
                {!! Form::close() !!}
            </div>
            <div class="tab-pane" id="feedback-control" style="min-height: 400px;">                                
                {!! Form::open(['route' => ['feedbackcontrol.save', $document, $evaluation], 'id' => 'feedBackControlForm', 'role'=>'form']) !!}
                    <div class="col-sm-12">
                        <p>Un mes después de la evaluación, máximo 3 meses, tendrás un nuevo espacio con tu líder para verificar el cumplimiento de los compromisos asignados.</p>
                    </div>
                    @if( isset($feedback) && $feedback['is_closed']) 
                        
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons" data-toggle='tooltip' title='Fecha de seguimiento' data-placement='bottom'>date_range</i>
                                </span>                                                
                                {!! Form::text("date", isset($feedbackcontrol->date)? $feedbackcontrol->date : null, ['placeholder' => 'Fecha de seguimiento', 'class'=>'form-control datepicker', 'style' => 'height: 45px', 'required', 'data-msg'=>'Debes ingresar las fecha de seguimiento']) !!}

                            </div>
                        </div>  
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons" data-toggle='tooltip' title='Observaciones' data-placement='bottom'>event_note</i>
                                </span>                                                
                                {!! Form::textarea("notes", isset($feedbackcontrol->notes)? $feedbackcontrol->notes : null, ['placeholder' => 'Observaciones', 'rows' => '5', 'class'=>'form-control inputFeedbackcontrol', 'maxlength'=>'4000', 'required', 'data-msg'=>'Debes ingresar las observaciones']) !!}
                            </div>
                        </div>                          
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons" data-toggle='tooltip' title='Valoración' data-placement='bottom'>check_circle</i>
                                </span>
                                {!! Form::select("status", ['1' => 'No alcanzaste el resultado esperado', '2' => 'Glüker confiamos en que puedes seguir desarrollando tus competencias para mejorar resultados.', '3' => 'Glüker lo lograste, tu desempeño fue estupendo'], isset($feedbackcontrol->status)? $feedbackcontrol->status : null, ['placeholder' => 'Valoración', 'class'=>'form-control', 'data-style'=>'select-with-transition', 'title'=>'Valoración', 'required', 'data-msg'=>'Debes seleccionar la valoración', 'style' => 'height: 45px']) !!}
                                <input type="hidden" name="skills-avg-value" class="skills-avg-value">
                                <input type="hidden" name="functions-avg-value" class="functions-avg-value">                               
                            </div>                            
                        </div>

                        @if( isset($feedback) && $feedback['is_closed'] && !$feedbackcontrol['is_closed']) 
                            <div class="text-center">
                                {!! Form::submit('Guardar', ["class"=>"btn btn-primary" , 'id' => 'btnSendData']) !!}
                            </div>
                        @endif
                    @else                        
                        <div class="alert alert-info">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="material-icons">info_outline</i>
                                </div>                                
                                <b>Hola.</b> Aún no está habilitado el periodo de retroalimentación y/o seguimiento
                            </div>
                        </div>
                    @endif                    
                {!! Form::close() !!}
            </div>
            <div class="tab-pane" id="feedback-avg">
                <div class="col-sm-12">
                    <p>Calificación final ponderada según el número de evaluadores que tuviste.</p>
                </div>                                
                @if( isset($feedback) )
                    <div class="col-xs-6 col-md-3 col-md-offset-1">
                        <div class="card card-pricing">
                            <div class="card-content content-info">                            
                                <div class="icon" style="display: flex;justify-content: center;">
                                    <div class="c100 blue">
                                        <span class="skills-avg-value-field">%</span>
                                        <div class="slice">
                                            <div class="bar"></div>
                                            <div class="fill"></div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-description">
                                    <strong>COMPETENCIAS</strong>                            
                                </p>                            
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="card card-pricing">
                            <div class="card-content content-info">
                                <div class="icon" style="display: flex;justify-content: center;">
                                    <div class="c100 blue">
                                        <span class="functions-avg-value-field">%</span>
                                        <div class="slice">
                                            <div class="bar"></div>
                                            <div class="fill"></div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-description">
                                    <strong>RETOS</strong>                                
                                </p>                                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="card card-pricing">
                            <div class="card-content content-info">
                                <div class="icon" style="display: flex;justify-content: center;">
                                    <div class="c100 blue">
                                        <span class="total-avg-value">%</span>
                                        <div class="slice">
                                            <div class="bar"></div>
                                            <div class="fill"></div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-description">
                                    <strong>TOTAL</strong>                                
                                </p>                                                    
                            </div>
                        </div>
                    </div>
                @else
                   <div class="alert alert-info">
                       <div class="container">
                           <div class="alert-icon">
                               <i class="material-icons">info_outline</i>
                           </div>                                
                           <b>Hola.</b> Aún no está habilitado el periodo de retroalimentación y/o seguimiento
                       </div>
                   </div> 
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>  
    <script type="text/javascript">               
        var countFunctions = 0;
        var avgFunctions = 0;
        var sumSkills = 0;
        var avgSkills = 0;

        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'
        };
        //skills data       
        var skillsData = {!! collect($reportData['skillsEvaluation'])->toJson() !!};
        var skillsProfile = {!! $reportData['desiredSkillsLevels']->values() !!};
        var skillsAvg = Array(skillsProfile.length).fill().map((x,i)=>0);
        @foreach($evaluatorsRoles as $role)
            //console.log("{{$role}}",skillsData["{{$role}}"]);
            if(skillsData["{{$role}}"].length != 0){
                for (var i = 0; i < skillsProfile.length; i++) {
                    //console.log(i,skillsData["{{$role}}"][i],skillsAvg[i]);
                    //console.log(parseFloat(skillsData["Jefe"][i].weight)*skillsData["Jefe"][i].value);
                    skillsAvg[i] += parseFloat(skillsData["{{$role}}"][i].weight)*skillsData["{{$role}}"][i].value;
                }
            }            
        @endforeach        
        //console.log("skills avg:",skillsAvg,"skills profile:", skillsProfile,"sum avg:",skillsAvg.reduce(getSum),"sum profilie:",skillsProfile.reduce(getSum));
        
        sumSkills = skillsProfile.reduce(getSum);
        avgSkills = skillsAvg.reduce(getSum);
        
        console.log("skills max value:",sumSkills,"sum avg:",avgSkills," - % ",(avgSkills/sumSkills).toFixed(2));
        //functions data
        var functionsData = {!! collect($reportData['functionsEvaluation'])->toJson() !!};
        //console.log("functions", functionsData);

        var color = Chart.helpers.color;
        var config = {
            type: 'radar',
            data: {
                labels: {!! $reportData['skillsTitles'] !!},
                datasets: [
                    {
                        label: "Perfil",
                        backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                        borderColor: window.chartColors.blue,
                        pointBackgroundColor: window.chartColors.blue,
                        data: skillsProfile
                    },
                    @foreach($evaluatorsRoles as $role) 
                        @if( isset($reportData['skillsEvaluation'][$role]) && !($reportData['skillsEvaluation'][$role]->isEmpty()))
                            {
                                label: "{{$role}}",
                                backgroundColor: color({{ $evaluatorsRolesColors[$role] }}).alpha(0.2).rgbString(),
                                borderColor: {{ $evaluatorsRolesColors[$role] }},
                                pointBackgroundColor: {{ $evaluatorsRolesColors[$role] }},
                                data: {!! $reportData['skillsEvaluation'][$role]->pluck('value') !!}
                            },                           
                        @endif
                    @endforeach
                    {
                        label: "Ponderado",
                        backgroundColor: color(window.chartColors.gray).alpha(0.4).rgbString(),
                        borderColor: window.chartColors.gray,
                        pointBackgroundColor: window.chartColors.gray,
                        data: skillsAvg
                    },
                ]
            },
            options: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: ''
                },
                scale: {
                  ticks: {
                    beginAtZero: true
                  }
                }
            }
        };

        

        $(document).ready(function() { 
            var myRadarChart = new Chart($("#skillsChart"), config);
            $("#feedBackForm").validate({
                submitHandler: function(form) {
                    $("#btnSendData").addClass("disabled")
                    form.submit();
                }
            });

            $("#feedBackControlForm").validate({
                submitHandler: function(form) {
                    $("#btnSendControlData").addClass("disabled")
                    form.submit();
                }
            });

            countFunctions = $(".functionsData").length;
            $(".functionsData").each(function() {                
                var functionId = $( this ).data("function");
                var functionAvg = 0;
                @foreach($functionsEvaluatorsRoles as $role => $weight)                   
                    if(functionsData["{{$role}}"].length != 0){
                        functionAvg += parseFloat({{$weight}})*functionsData["{{$role}}"][functionId].value;
                        //show data
                        $( this ).append( "<span class='label "+getFunctionResultStyle(functionsData["{{$role}}"][functionId].value)+"' data-toggle='tooltip' title='{{$role}}' data-placement='left'>"+functionsData["{{$role}}"][functionId].value+"</span> ");
                    }
                @endforeach
                //add avg
                var classDisplay = getFunctionResultStyle(functionAvg);
                avgFunctions += parseFloat(functionAvg.toFixed(2));

                $( this ).append( "<span class='label "+classDisplay+"' data-toggle='tooltip' title='Ponderado' data-placement='left'>"+functionAvg.toFixed(2)+"</span>");
            });
            
            console.log("functions max value",countFunctions*5,"sum avg:",avgFunctions.toFixed(2),"- %",(avgFunctions/(countFunctions*5)).toFixed(2));
            //set avg data
            var totalSkills = (avgSkills/sumSkills).toFixed(2);
            var totalFunctions = (avgFunctions/(countFunctions*5)).toFixed(2);             
            var pTotalSkills = (totalSkills*100).toFixed(0);            
            var pTotalFunctions = (totalFunctions*100).toFixed(0);
            var pTotalAVG = parseInt((parseInt(pTotalSkills) + parseInt(pTotalFunctions)) /2);
            
            $('.skills-avg-value').val(pTotalSkills);
            $('.functions-avg-value').val(pTotalFunctions);
            

            $('.skills-avg-value-field').html(pTotalSkills+"%");
            $('.functions-avg-value-field').html(pTotalFunctions+"%");            
            $('.skills-avg-value-field').parent().addClass("p"+(pTotalSkills >100 ? 100: pTotalSkills));
            $('.functions-avg-value-field').parent().addClass("p"+(pTotalFunctions >100 ? 100: pTotalFunctions));

            $('.total-avg-value').html(pTotalAVG+"%");
            $('.total-avg-value').parent().addClass("p"+(pTotalAVG  >100 ? 100: pTotalAVG));

            @if( isset($feedback) && $feedback['is_closed'])
                $('.inputFeedback').attr('readonly','readonly');
            @endif

            @if( isset($feedbackcontrol) && $feedbackcontrol['is_closed'])
                $('.inputFeedbackcontrol').attr('readonly','readonly');
            @endif


            materialKit.initFormExtendedDatetimepickers();
            $('[data-toggle="tooltip"]').tooltip();   
        });

        function getSum(total, num) {
            return total + num;
        }

        function getFunctionResultStyle(value){            
            if(value <= 2.9){
                return "label-danger";
            }else if(value <= 4.9){
                return "label-warning";
            }else{
                return "label-success";
            }
        }
        
    </script>  
@endpush