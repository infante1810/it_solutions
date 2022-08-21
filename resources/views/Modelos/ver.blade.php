@extends('templates.main')

@section('content')

<!-- CABECERA -->
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
    <h4 class="page-title">Ver  registro #{{$model->id}}</h4>
        <ul class="breadcrumb">
            <li class="mb-1 fs-16"><a href="{{ route('registro2.index') }}">Registro 2</a></li>
            <li class="text-muted mb-1 fs-16 ml-2 mr-2"> / </li>
            <li class="text-muted mb-1 fs-16">Ver registro</li>
        </ul>
    </div>
</div>
<!-- FIN CABECERA -->


<!-- Row -->
<div class="row">
	<div class="col-xl-12 col-md-12 col-lg-12">
		<div class="card">

			<div class="card-body">

				<h4 class="mb-5 font-weight-semibold">Registro</h4>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="form-label">Nombre</label>
							<div class="text-muted">{{$model->name}}</div>
						</div>
					</div>
				<!--<div class="col-md-3">
						<div class="form-group">
							<label class="form-label">Localización</label>
							<div class="text-muted">{{$model->location}}</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label class="form-label">Numero de vistas</label>
							<div class="text-muted">{{$model->views_counter}}</div>
						</div>
					</div>-->
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-label">Descripcion</label>
							<div class="text-muted">{{$model->description}}</div>
						</div>
					</div>
				</div>

                <div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="form-label">Costo total</label>
							<div class="text-muted">{{$model->total_cost}}</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card-footer text-right">
				<a role="button" class="btn btn-outline-dark" href="{{ url()->previous() }}">
					<i class="feather feather-corner-down-left sidemenu_icon"></i>
					Regresar
				</a>
			</div>
		</div>
	</div>
</div>
@endsection
