@extends('templates.main')

@section('content')

<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Departamentos s</h4>
    </div>
    <div class="page-rightheader ml-md-auto">
        <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
            <div class="btn-list">
                <a href="{{ route('departamentos.create') }}" class="btn btn-primary mr-3">
                    <i class="fa-solid fa-plus"></i>Agregar Departamento</a>
            </div>
        </div>
    </div>

                <!-- VENTANA EMERGENTE -->
                <div class="modal fade" id="ventana1" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" Style="border-radius: 20px;">
                            <!-- HEADER DE LA VENTANA-->
                            <div class="modal-header">
                                <h2 class="modal-title" style="font-size: 20px; font-weight: bold;">Agregar un departamento</h2>
                                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <!-- CONTENIDO DE LA VENTANA-->
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="table table-vcenter text-wrap table bordered">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Nombre del departamento</label>
                                                    <input id="name" class="form-control @error('name')is-invalid @enderror" type="text" required
                                                           placeholder="Ej. Departamento de Finanzas" name="name" maxlength="250"
                                                           value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong> {{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">
					                        Guardar
                                        </button>
                                    </div>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- CONTENIDO -->
<div class="row">
    <div class="col-xl-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departamentos as $departamento)
                                <tr>
                                    <td class="text-center">{{ $departamento->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash-alt"></i>
                                            </button>
                                        </form>
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