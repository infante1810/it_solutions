@extends('templates.main')

@section('content')

<!-- CABECERA -->

<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Editar  registro</h4>
        <ul class="breadcrumb">
            <li class="mb-1 fs-16"><a href="{{ route('registro1.index') }}">Registro1</a></li>
            <li class="text-muted mb-1 fs-16 ml-2 mr-2"> / </li>
            <li class="text-muted mb-1 fs-16">Editar departamento</li>
        </ul>
    </div>
</div>


    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <form method="POST" action="{{route('registro1.update', $departamento->id)}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <h4 class="mb-5 font-weight-semibold">Edita el departamento {{$departamento->id}} </h4>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" maxlength="22"
                                            name="name" autofocus required value="{{ $departamento->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong> {{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Descripción</label>
                                    <textarea id="name" class="form-control @error('name') is-invalid @enderror" type="text" rows="6"
                                            name="name" autofocus required value="{{ $departamento->name }}"></textarea>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong> {{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a role="button" class="btn btn-outline-dark">
                                <i class="feather feather-corner-down-left sidemenu_icon"></i>
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="feather  feather-save sidemenu_icon"></i>
                                Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 @endsection
