@extends('templates.main')

@section('content')

<!-- CABECERA -->
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Ver registro #{{$project->id}}</h4>
        <ul class="breadcrumb">
            <li class="mb-1 fs-16"><a href="{{ route('registro9.index') }}">Registros 9</a></li>
            <li class="text-muted mb-1 fs-16 ml-2 mr-2"> / </li>
            <li class="text-muted mb-1 fs-16">Ver registro</li>
        </ul>
    </div>
</div>
<!-- FIN CABECERA -->




<div class="row">

    {{-- Tarjeta información --}}
    <div class="col-xl-3 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-5 font-weight-semibold">Registro9</h4>

				<div class="row">
					<div class="col-md-20">
						<div class="form-group">
							<label class="form-label">Nombre</label>
							<div class="text-muted">{{$project->name}}</div>
						</div>
					</div>
				<!--<div class="col-md-3">
						<div class="form-group">
							<label class="form-label">Localización</label>
							<div class="text-muted">{{$project->location}}</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label class="form-label">Numero de vistas</label>
							<div class="text-muted">{{$project->views_counter}}</div>
						</div>
					</div>-->
				</div>

				<div class="row">
					<div class="col-md-20">
						<div class="form-group">
							<label class="form-label">Descripcion</label>
							<div class="text-muted">{{$project->description}}</div>
						</div>
					</div>
				</div>

                <div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label class="form-label">Costo total</label>
							<div class="text-muted">{{$project->total_cost}}</div>
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
</div>
<!-- End Row-->
@endsection
