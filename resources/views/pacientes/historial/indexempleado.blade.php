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
                <span class="hidden-xs">Solicitados</span>
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
                                        <th>telefono</th>
                                        <th style="width: 10%">DPI</th>
                                        <th style="width: 10%">Tipo Persona</th>
                            </thead>
                            <tbody>
                                             <tr class="gradeC">


                                        <td>2</td>
                                        <td>Luis Alberto López</td>
                                        <td>llopez@gmail.com</td>
                                        <td>Ocasional</td>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-primary" title="Detalles"><i class="glyphicon glyphicon-zoom-in"></i></button>
                                            <button class="btn btn-danger" id="FWEF" value="" title="Despedir" ><i class="fa fa-remove"></i></button>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label></div> 

    </div>
            
        <div class="col-lg-12">
                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <input type="hidden" name="idemple" id="idemple">
                            <input type="hidden" name="identifica" id="identifica">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="inputTitle"></h4>
                            </div>

                            <form role="form" id="form">
                                <div class="modal-header">

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Identificación</label>
                                        <input id="nombreC" type="text" class="form-control" name="dias" aria-describedby="basic-addon1">   
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Nit</label>
                                        <input id="nombreC" type="text" class="form-control" name="dias" aria-describedby="basic-addon1">   
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Nombre</label>
                                        <input id="nombreC" type="text" class="form-control" name="dias" aria-describedby="basic-addon1">   
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Apellido</label>
                                        <input id="nombreC" type="text" class="form-control" name="dias" aria-describedby="basic-addon1">   
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Fecha ingreso</label>
                                        <input type="text" id="fecha_inicio" class="form-control" name="fechainicio">
                                    </div>

                                    <div class="modal-header">
                                        <label>Tipo de bienechor</label><br>
                                        <select id="select" data-style="btn-info" data-live-search="true">
                                            <option>Permanentes</option>
                                            <option>Ocasionales</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label">Dirección</label>
                                        <input type="text" id="fecha_inicio" class="form-control" name="fechainicio">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Descripcion</label>
                                        <textarea class="form-control" placeholder=".........." id="observaciones" rows="3" maxlength="300"></textarea>
                                    </div>
                              </div> 
                            </form>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary btn-adddespedir" id="btnGuardarBaja">Guardar</button>
                                <input type="hidden" name="idE" id="idE" value="0"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <input type="hidden"  id="url_raiz_proyecto" value="{{ url("/") }}" />
    <div id="capa_modal" class="div_modal" style="display: none;"></div>
    <div id="capa_formularios" class="div_contenido" style="display: none;"></div>

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



