    <link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/footable/footable.core.css')}}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->


        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="ibox-content m-b-sm border-bottom">
                <h4 class="box-title" align="center">Editar Empleado</h4>
                <a href="javascript:void(0);" onclick="cargarindex(1);">
                    <button class="btn btn-primary btn-md btn-detalle-empleado" title="Listado Empleado"><i class="fa fa-arrow-circle-left"></i></button>
                </a>

                <hr style="border-color:black;"/>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$empleado->nombre}}" placeholder=".." maxlength="75">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="..." value="{{$empleado->apellido}}" max="75">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="stock">Direccion</label>
                                <input type="text" name="direccion"  id="direccion" class="form-control" placeholder="..." value="{{$empleado->direccion}}" maxlength="100">
                            </div>
                        </div>
                                                                       
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label for="descripcion">Telefono</label>
                            <div class="input-group">
                            <span class="input-group-addon">502</span>
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="..." value="{{$empleado->telefono}}" maxlength="8" onkeypress="return valida(event)" >
                            </div>
                        </div>


                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="puesto">Estado civil</label>
                                <select id="idcivil" class="form-control select2" data-live-search="true">
                                @if (isset($estadocivil))
                                @foreach($estadocivil as $est)
                                    <option value="{{$est->idcivil}}">{{$est->nombre}}</option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">DPI</label>
                                <input type="text" name="dpi" id="dpi" class="form-control" placeholder="..." value="{{$empleado->dpi}}" maxlength="13" onkeypress="return valida(event)">
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Nit</label>
                                <input type="text" name="nit"  id="nit" class="form-control" placeholder="..." value="{{$empleado->nit}}" maxlength="9">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Correo electronico</label>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="..." value="{{$empleado->correo}}" maxlength="75">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Fecha nacimiento</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="birth_date" type="text" class="form-control" value="{{\Carbon\Carbon::createFromFormat('Y-m-d',$empleado->fechanacimiento)->format('d/m/Y')}}">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="puesto">Puesto</label>
                                <select name="idpuesto" id="idpuesto" class="form-control select2" data-live-search="true">
                                @if (isset($puesto))
                                @foreach($puesto as $pue)
                                    <option value="{{$pue->idpuesto}}">{{$pue->nombrepuesto}}</option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="salario">Salario</label>
                                <input type="number" name="salario" id="salario" class="form-control" placeholder="..." value="{{$empleado->salario}}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="date_added">Fecha inicio labores</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_work_start" type="text" class="form-control" value="{{\Carbon\Carbon::createFromFormat('Y-m-d',$empleado->fechainicio)->format('d/m/Y')}}">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" name="imagen" class="form-control">
                        </div>
                    </div>
                    -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div><br></div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-btnUpdateEmpleado"  type="button" id="btnGuardarEmpleado" value="{{$empleado->idpersona}}">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>       

<!-- Modal for displaying the messages -->
<div class="modal fade" id="erroresModalEmpleado" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Errores</h4>
            </div>

            <div class="modal-body">
                <!-- The messages container -->
<!--                <div id="erroresContent"></div>-->
                   <ul style="list-style-type:circle" id="erroresContentEmpleado"></ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




    <script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/plugins/footable/footable.all.min.js')}}"></script>
    <script src="{{asset('assets/js/empleado/persona.js')}}"></script>

    <!-- Validaciones -->
    <script src="{{asset('assets/js/validacion.js')}}"></script>

    <!-- Sweet alert -->
    <script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.js')}}"></script>

    <script>
        $(document).ready(function() {



            $('#date_work_start').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
                
            });

            $('#birth_date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#expiration_date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
                
            });

        });

    </script>


