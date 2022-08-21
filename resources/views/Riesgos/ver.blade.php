@extends('templates.main')

@section('content')

<!-- CABECERA -->
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Ver registro #{{$riesgo->id}}</h4>
        <ul class="breadcrumb">
            <li class="mb-1 fs-16"><a href="{{ route('registro10.index') }}">Registro 10</a></li>
            <li class="text-muted mb-1 fs-16 ml-2 mr-2"> / </li>
            <li class="text-muted mb-1 fs-16">Ver registro</li>
        </ul>
    </div>
</div>
<!-- FIN CABECERA -->




<!-- CONTENIDO -->
<div class="row">
    <div class="col-xl-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
            <h4 class="mb-5 font-weight-semibold">Registro</h4>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label">Nombre</label>
            <div class="text-muted">{{$riesgo->name}}</div>
        </div>
    </div>                 
                <!--div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">ID</label>
                                <input class="form-control" type="text" name="id" placeholder="ID" disabled value="{{$riesgo->id}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nombre del riesgo</label>
                                <input class="form-control" type="text" placeholder="Sin información" name="name" maxlength="22" value="{{$riesgo->name}}" disabled>
                            </div>
                        </div-->
                    </div>
                    <div class="row">
                            {{-- Descripción --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Descripción:</label>
                                    <div class="text-muted">{{$riesgo->description}}</div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="form-label">Costo total</label>
							<div class="text-muted">{{$riesgo->total_cost}}</div>   
                            </div>
                        </div>
                    </div>
                </div>                    
                </form>
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
<!-- FIN CONTENIDO -->
@endsection