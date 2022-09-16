@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' Results')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-certificate"></i> Results
        </h1>                
    </div>
@stop

@section('content')

    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        @include('flash::message')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">  
                        <form method="get" class="form-search">
                            <div class="row">                          
                              <div class="col-md-8 col-lg-6">
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
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cargo</th>
                                            <th>Competencias</th>
                                            <th>Funciones</th>
                                            <th>% Competencias</th>
                                            <th>% Funciones</th>
                                            <th></th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($evaluationStatus as $register)                                         
                                           <tr>                                                                            
                                               <td>{{ $register->user_name }}</td>
                                               <td>{{ $register->user_job_title }}</td> 
                                               <td>
                                                   @if( $register->current_skills == $register->total_skills)
                                                       <span class="label label-success">OK</span>
                                                   @else
                                                       <span class="label label-danger">{{$register->current_skills}} / {{$register->total_skills}}</span>
                                                   @endif 
                                               </td> 
                                               <td>
                                                   @if($register->current_functions == $register->total_functions)
                                                       <span class="label label-success">OK</span>
                                                   @else
                                                       <span class="label label-danger">{{$register->current_functions}} / {{$register->total_functions}}</span>
                                                   @endif
                                               </td>
                                               <td>{{ $register->avg_skills }}</td> 
                                               <td>{{ $register->avg_functions }}</td>                                     
                                               <td class="td-actions text-right">                                             
                                                   <a href="{{ route('report.detail',['document' => $register->user_id, 'evaluation' => $selectedEvaluation]) }}" data-toggle="tooltip" title="Ver Evaluaciones" data-placement="left" title="View" class="btn btn-sm btn-warning pull-right view">
                                                       <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                                   </a>
                                                   
                                                   @if(($register->current_functions == $register->total_functions) &&($register->current_skills == $register->total_skills))
                                                        <!--
                                                            <button type="button" rel="tooltip" title="Activar Retroalimentación" data-user="{{ $register->user_id }}" data-action="true" data-placement="bottom" class="btn btn-info btn-simple btn-xs setFeedBack">
                                                                <i class="material-icons">lock</i>
                                                            </button>                                            
                                                            <button type="button" rel="tooltip" title="Inactivar Retroalimentación" data-user="{{ $register->user_id }}" data-action="false"  data-placement="bottom" class="btn btn-info btn-simple btn-xs setFeedBack">
                                                                <i class="material-icons">lock_open</i>
                                                            </button>
                                                        -->
                                                   @endif                                            
                                               </td>                                    
                                           </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
	
@endsection

@section('css')
@if(config('dashboard.data_tables.responsive'))
<link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@section('javascript')
    <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>    
    <script type="text/javascript">
        $(document).ready(function() {            
            /*$(".setFeedBack").click( (obj) => {
                console.log($(obj.target).parent().data("user"));
                //$(obj.target).parent().addClass("disabled");                
            });*/

            var table = $('#dataTable').DataTable({!! json_encode(
                array_merge([
                    "order" => [],
                    "language" => __('voyager::datatable'),
                    "columnDefs" => [['searchable' =>  false, 'targets' => -1 ]],
                ],
                config('voyager.dashboard.data_tables', []))
            , true) !!});

        });

    </script>    
    
@stop