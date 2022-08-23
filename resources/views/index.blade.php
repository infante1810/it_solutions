@extends('templates.main')

@section('content')

<!-- CABECERA -->
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Dashboard</h4>
    </div>
    {{-- DESCOMENTAR DIV PARA MOSTRAR BOTON DE AGREGAR --}}
    {{-- <div class="page-rightheader ml-md-auto">
        <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
            <div class="btn-list">
                <a href="#" class="btn btn-primary mr-3">
                    Agregar cosa</a>
            </div>
        </div> --}}
    </div>
</div>
<!-- FIN CABECERA -->




<!-- CONTENIDO -->
<div class="row">
    <div class="col-xl-12 col-md-12 col-lg-12">
        <div class="container">
            <div class="row">
                <div class="col-5 mb-5 p-5 bg-white rounded shadow ml-7">
                        <div class="d-flex">
                            <div class="mr-3 mt-0 mt-sm-1 d-block">
                                <span class="avatar avatar-xl brround mr-3" style="background-image: url({{asset('images/Oscar-Clemente.jpeg')}}"></span>
                            </div>
                            <div>
                                <div class="row fs-4 primary-font">CLEMENTE GOMEZ </br> OSCAR ROBERTO </div>
                                <div class="row text-muted">1930672</div>
                                <div class="row">1930672@upv.edu.mx</div>
                                <div class="row">Owner Area 8</div>                                    
                            </div>
                            
                        </div>
                </div>
                <!--nuevo apartado de vista-->
                <div class="col-5 mb-5 p-5 bg-white rounded shadow ml-7">
                        <div class="d-flex">
                            <div class="mr-3 mt-0 mt-sm-1 d-block">
                                <span class="avatar avatar-xl brround mr-3" style="background-image: url({{asset('images/estefania.jpg')}}"></span>
                            </div>
                            <div>
                                <div class="row fs-4 primary-font">DE LA FUENTE FLORES </br> ESTEFANIA </div>
                                <div class="row text-muted">1930019</div>
                                <div class="row">1930019@upv.edu.mx</div>
                                <div class="row">Owner Area 9</div>
                            </div>
                            
                        </div>
                </div>
                <!--nuevo apartado de vista-->
                <div class="col-5 mb-5 p-5 bg-white rounded shadow ml-7">
                        <div class="d-flex">
                            <div class="mr-3 mt-0 mt-sm-1 d-block">
                                <span class="avatar avatar-xl brround mr-3" style="background-image: url({{asset('images/anibal.jpeg')}}"></span>
                            </div>
                            <div>
                                <div class="row fs-4 primary-font">GONZALEZ TOVAR </br> ANIBAL</div>
                                <div class="row text-muted">1830612</div>
                                <div class="row">1830612@upv.edu.mx</div>
                                <div class="row">Owner Area 4</div> 
                            </div>
                            
                        </div>
                </div>
                <!--nuevo apartado de vista-->
                <div class="col-5 mb-5 p-5 bg-white rounded shadow ml-7">
                        <div class="d-flex">
                            <div class="mr-3 mt-0 mt-sm-1 d-block">
                                <span class="avatar avatar-xl brround mr-3" style="background-image: url({{asset('images/ramon.jpeg')}}"></span>
                            </div>
                            <div>
                                <div class="row fs-4 primary-font">HERNANDEZ SANCHEZ </br>RAMON URIEL </div>
                                <div class="row text-muted">1930138</div>
                                <div class="row">1930138@upv.edu.mx</div>
                                <div class="row">Owner Area 10</div>  
                            </div>
                            
                        </div>
                </div>
                <!--nuevo apartado de vista-->
                <div class="col-5 mb-5 p-5 bg-white rounded shadow ml-7">
                        <div class="d-flex">
                            <div class="mr-3 mt-0 mt-sm-1 d-block">
                                <span class="avatar avatar-xl brround mr-3" style="background-image: url({{asset('images/JQuinones.jpg')}}"></span>
                            </div>
                            <div>
                                <div class="row fs-4 primary-font">QUIÑONES MATA </br> JESUS EDUARDO</div>
                                <div class="row text-muted">1930507</div>
                                <div class="row">1930507@upv.edu.mx</div>
                                <div class="row">Owner Area 5</div>  
                            </div>
                            
                        </div>
                </div>
                <!--nuevo apartado de vista-->
                <div class="col-5 mb-5 p-5 bg-white rounded shadow ml-7">
                        <div class="d-flex">
                            <div class="mr-3 mt-0 mt-sm-1 d-block">
                                <span class="avatar avatar-xl brround mr-3" style="background-image: url({{asset('images/sandra.jpeg')}}"></span>
                            </div>
                            <div>
                                <div class="row fs-4 primary-font">TRISTAN SOTO </br> SANDRA YANETH</div>
                                <div class="row text-muted">1930507</div>
                                <div class="row">1930507@upv.edu.mx</div>
                                <div class="row">Owner Area 7</div> 
                            </div>
                            
                        </div>
                </div>
                <!--nuevo apartado de vista-->
                <div class="col-5 mb-5 p-5 bg-white rounded shadow ml-7">
                        <div class="d-flex">
                            <div class="mr-3 mt-0 mt-sm-1 d-block">
                                <span class="avatar avatar-xl brround mr-3" style="background-image: url({{asset('images/infante.jpg')}}"></span>
                            </div>
                            <div>
                                <div class="row fs-4 primary-font">INFANTE GONZALEZ </br> OSCAR ESTEBAN</div>
                                <div class="row text-muted">2010008</div>
                                <div class="row">2010008@upv.edu.mx</div>
                                <div class="row">Owner Area 1,2,3,6</div>  
                            </div>
                            
                        </div>
                </div>
            </div>
                            
        </div>
    </div>
</div>
<!-- FIN CONTENIDO -->
@endsection