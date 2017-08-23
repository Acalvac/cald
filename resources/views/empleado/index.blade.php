@extends ('layouts.index')

@section('estilos')
    @parent
        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
    @endsection

@section ('contenido')
<div class="tabs-container">
    <ul class="nav nav-tabs">
        <li class="active" data-toggle="tab" aria-expanded="false">
            <a data-toggle="tab" aria-expanded="false" onclick="cargar_formulario(4);">
                <span class="visible-xs"><i class="md md-perm-contact-cal"></i></span>
                <span class="hidden-xs">Listado de empleados</span>
            </a>
        </li>
    </ul>
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @include('empleado.searchempleado')
                    </div>
                    <div><br></div>   
                </div>
                <div><br></div>            
        
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                        <th style="width: 5%">Id</th>
                                        <th style="width: 20%">Nombre</th>
                                        <th style="width: 20%">Direcci&oacute;n</th>
                                        <th style="width: 10%">telefono</th>
                                        <th style="width: 10%">Correo</th>
                                        <th style="width: 20%">Opciones</th>
                            </thead>
                            <tbody id="listempleado">
                                @foreach ($empleado as $em)
                                    <tr class="even gradeA" id="bien{{$em->idpersona}}">
                                        <td>{{$em->idpersona}}</td>
                                        <td>{{$em->nombre.' '.$em->apellido}}</td>
                                        <td>{{$em->direccion}}</td>
                                        <td>{{$em->telefono}}</td>
                                        <td>{{$em->correo}}</td>
                                        <td>

                                            <button class="btn btn-primary btn-md btndb" title="Detalles" value="{{$em->idpersona}}"><i class="fa fa-address-card"></i></button>
                                            <button class="btn  btn-warning btn-md btneditb" title="Editar" value="{{$em->idpersona}}"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-md btneliminarb" id="FWEF" value="{{$em->idpersona}}" title="Eliminar" ><i class="fa fa-remove"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label></div>
        --> 



@endsection

@section('fin')
    @parent

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.btn-addB',function(){
                    $('#inputTitle').html("Agregar nuevo bienechor");
                    $('#formAgregar').trigger("reset");
                    $('#formModal').modal('show');
            });
        });
    </script>
@endsection



