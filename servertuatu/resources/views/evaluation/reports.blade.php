@extends('layouts.home')

@section('content')
	<div class="profile-content">
        <div class="container">
            <div class="title">
                <h3><strong>Estado actual de evaluaciones</strong></h3>
            </div>             
            <div class="row">
				<div class="col-sm-12">	                
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>                                                                        
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Competencias</th>
                                    <th>Funciones</th>
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
                                        <td class="td-actions text-right">                                             
                                            <a href="{{ route('report.detail',['document' => $register->user_id]) }}" data-toggle="tooltip" title="Ver Evaluaciones" data-placement="left" class="btn btn-info btn-simple btn-xs">
                                                <i class="material-icons">perm_contact_calendar</i>
                                            </a>
                                            
                                            @if(($register->current_functions == $register->total_functions) &&($register->current_skills == $register->total_skills))

                                            @endif                                            
                                        </td>                                    
                                    </tr>
                                @endforeach
                             </tbody>
                        </table>
                    </div> 
				</div>
			</div>			
        </div>
    </div>
@endsection

@push('scripts')    
    <script type="text/javascript">
        $(document).ready(function() {            
            $(".setFeedBack").click( (obj) => {
                console.log($(obj.target).parent().data("user"));
                //$(obj.target).parent().addClass("disabled");                
            });            
        });

    </script>    
    
@endpush