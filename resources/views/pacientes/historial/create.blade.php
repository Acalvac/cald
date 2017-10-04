<link href="{{asset('assets/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3 align="center">Ingreso examenes de paciente</h3>
                    <a href="javascript:void(0);" onclick="cargarindex(1);">
                        <button class="btn btn-primary btn-md" title="Listado Pacientes"><i class="fa fa-arrow-circle-left"></i></button>
                    </a>
                    <hr style="border-color:black;"/>
                </div>

                <div class="ibox-content">
                    <div id="hmedico">
                        <h3>SIGNOS VITALES</h3>
                        <section>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Nombre">Paciente</label>
                                    <select class="form-control" class="chosen-select" data-live-search="true" onchange="pacientepe();" id="idpaciente">
                                    @if (isset($paciente))
                                    @foreach($paciente as $pac)
                                    <option value="{{$pac->idpaciente}}">{{$pac->nombrepa.' '.$pac->apellidopa}}</option>

                                    @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="Nombre">Peso</label>
                                    <input class="form-control" type="text" name="" id="peso" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="Nombre">Talla</label>
                                    <input class="form-control" type="text" name="" id="talla" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="Nombre">Temperatura</label>
                                    <input type="text" name="nombre" id="temperatura" class="form-control required" placeholder=".." required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nombre">Presi&oacute;n arterial</label>
                                    <input type="text" name="apellido" id="parterial" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Respiraci&oacute;n por minuto</label>
                                    <input type="text" name="direccion"  id="respiracion" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Pulso radial</label>
                                    <input type="text" name="direccion"  id="pulso" class="form-control" placeholder="...">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Circunferencia cef&aacute;lica</label>
                                    <input type="text" name="direccion"  id="circuferencia" class="form-control" placeholder="...">
                                </div>
                            </div>                           
                        </section>
                        <h3>ANOMALÍAS VISIBLES:</h3>
                        <section><p>(Describalas)</p>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="Nombre">Piel</label>
                                    <input type="text" name="nombre" id="piel" class="form-control required" placeholder=".." required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nombre">Cabeza</label>
                                    <input type="text" name="apellido" id="cabeza" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Ojos</label>
                                    <input type="text" name="ojos"  id="ojos" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Oidos</label>
                                    <input type="text" name="direccion"  id="oidos" class="form-control" placeholder="...">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Nariz</label>
                                    <input type="text" name="direccion"  id="nariz" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Boca y faringe</label>
                                    <input type="text" name="direccion"  id="boca" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Cuello</label>
                                    <input type="text" name="direccion"  id="cuello" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Coraz&oacute;n</label>
                                    <input type="text" name="direccion"  id="corazon" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Pulmones</label>
                                    <input type="text" name="direccion"  id="pulmones" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Tórax</label>
                                    <input type="text" name="direccion"  id="torax" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Manos y axilas</label>
                                    <input type="text" name="direccion"  id="manos" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Columna</label>
                                    <input type="text" name="direccion"  id="columna" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Abdomen</label>
                                    <input type="text" name="direccion"  id="abdomen" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Extremidades superiores</label>
                                    <input type="text" name="direccion"  id="extremidades" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Extremidades inferiores</label>
                                    <input type="text" name="direccion"  id="extremidadesi" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Sistema musco-esqueletico</label>
                                    <input type="text" name="direccion"  id="sistemamus" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">genitales</label>
                                    <input type="text" name="direccion"  id="genitales" class="form-control" placeholder="...">
                                </div>
                            </div>
                        </section>
                        <h3>EXAMEN NEUROLOGICO</h3>
                        <section>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="Nombre">Motor</label>
                                    <input type="text" name="nombre" id="motor" class="form-control required" placeholder=".." required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nombre">Reflejos</label>
                                    <input type="text" name="apellido" id="reflejos" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Estado mental</label>
                                    <input type="text" name="direccion"  id="estadomental" class="form-control" placeholder="...">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="stock">Reconoce o distingue</label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="1" id="reconoce" checked></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="0" id="reconoce"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <div class="form-group">
                                    <label for="observaacion">Observaci&oacute;n</label>
                                    <textarea type="text" name="" id="observacion"  rows="3" class="form-control" maxlength="100"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <br>
                                    <button type="button" class="btn btn-info btn_addExamen">Agregar</button>
                                </div>
                            </div>



                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="examen" class="table table-striped table-bordered table-hover">
                                <thead style="background-color:#A9D0F5">
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Observación</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>                           
                        </section>
                    </div>
                </div>
            </div>
        </div>

</div>

<div class="modal fade" id="erroresModalExamen" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="inputErrorExamen"></h4>
            </div>
            <div class="modal-body">
                <ul style="list-style-type:circle" id="erroresContentExamen"></ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>

<script src="{{asset('assets/js/pacientes/pacienteexamen.js')}}"></script>
<script src="{{asset('assets/js/pacientes/step.js')}}"></script>





   