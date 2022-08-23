@extends('templates.main')

@section('content')

<!-- CABECERA -->
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Registros Area 9</h4>
    </div>

    <div class="page-rightheader ml-md-auto">
        <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
            <div class="btn-list">
                <a href="{{route('registro9.create')}}" class="btn btn-primary mr-3">
                    <i class="fa-solid fa-plus"></i>
                    Agregar Registro
                </a>
            </div>
            <!--COPIAR DESDE AQUI-->
            <div class="btn-list">
                <a href="{{route('registro9.generatePDF')}}" class="btn btn-primary mr-3">
                    <i class="fa-thin fa-file-arrow-down"></i>
                    Reporte PDF
                </a>
            </div>
            <!--HASTA AQUI-->
        </div>
    </div>
</div>
<!-- FIN CABECERA -->




<!-- CONTENIDO -->
<div class="row">
    <div class="col-xl-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header  border-0">
                <h4 class="card-title">Lista de productos/servicios</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-vcenter text-wrap table-bordered border-bottom dt" id="project-list">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">ID</th>
                                <th class="border-bottom-0">Servicio/Producto</th>
                                <th class="border-bottom-0">Descripcion </th>
                                <th class="border-bottom-0">Costos</th>
                                <th class="border-bottom-0" Style="text-align: center;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($projects)
                                @foreach ($projects as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="mr-3 mt-0 mt-sm-1 d-block">
                                                <h6 class="mb-1 fs-14">{{$project->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span>{{$project->description}}</span>
                                    </td>
                                    <td>
                                        <span>{{$project->total_cost}}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('registro9.show', $project->id)}}" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa-solid fa-eye text-primary"></i></a>
                                            <a href="{{route('registro9.edit', $project->id)}}" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa-solid fa-pen text-success"></i></a>
                                            <form action="{{route('registro9.destroy', $project->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="action-btns1" data-toggle="tooltip" data-placement="top" title="Eliminar" type="submit"><i class="fa-regular fa-trash-can text-danger"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
</div>
<!-- FIN CONTENIDO -->
@endsection


@section('extra-script')
<script type="text/javascript">
    function mensaje(){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-outline-dark'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: '¿Eliminar registro?',
          text: "Si eliminas a este registro se eliminará permanentemente del sistema.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, eliminar registro!.',
          cancelButtonText: 'No, mantener registro!.',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              'Eliminado!',
              'El registro se ha eliminado correctamente.',
              'success'
            )
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Proceso cancelado.',
              '',
              'error'
            )
          }
        })
    }
</script>
@endsection