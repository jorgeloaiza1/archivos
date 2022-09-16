@extends('layouts.web')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="card card-signup">
				<form class="form" method="" action="">
					<div class="header header-primary text-center">
						<h2><strong>TÚ</strong> a <strong>TÚ</strong></h2>
						<p>Evaluación de desempeño </p>									
					</div>					
					<div class="content text-center">
						 El propósito de la <strong>Evaluación “Tú a Tú”</strong> es desarrollar competencias, mejorar los perfiles y generar conversaciones profundas que mejoren las relaciones.<br>
					</div>
					<div class="footer text-center">
						<a href="{{ route('login.google') }}" class="btn btn-simple btn-primary btn-lg btn-icon" id="btnLogin"><i class="fa fa-google"></i> Ingresar</a>						
					</div>
				</form>
			</div>
			@if ($errors->has('sociallite'))
				<div class="alert alert-danger">
				    <div class="container-fluid">
					  <div class="alert-icon">
					    <i class="material-icons">error_outline</i>
					  </div>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true"><i class="material-icons">clear</i></span>
					  </button>
				      <b>Error:</b> {{ $errors->first('sociallite') }}
				    </div>
				</div>
			@endif
		</div>
	</div>
@endsection
@push('scripts')
    
    <script type="text/javascript">
        $(document).ready(function() {            
            $("#btnLogin").click(()	=>{
				$("#btnLogin").addClass("disabled");
            });
        });

    </script>    
    
@endpush