        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
        <link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />

<div class="tabs-container" id="contentsecundario">
	<div class="row">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title" align="center">Datos del empleado</h3>
            <hr style="border-color:black;"/>
	        <h4><strong>Nombre Empleado:</strong>&nbsp;&nbsp;&nbsp;{{$detalle->nombre.' '.$detalle->apellido}}</h4>
	        <h4><strong>Teléfono:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->telefono}}</h4>
	        <h4><strong>Correo electronico:</strong>&nbsp;&nbsp;&nbsp;{{$detalle->correo}}</h4>
            <h4><strong>Dirección:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->direccion}} 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>

	        <h4><strong>Nit:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->nit}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Identificacion:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->dpi}}</h4>
            <h4><strong>Estado Civil</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$detalle->estadocivil}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Fecha Nacimiento</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->fechanacimiento}}</h4>
	    </div>
	</div>

    <div>
        <a href="javascript:void(0);" onclick="cargarindex(1);">
            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Listado Empleado"><i class="fa fa-arrow-circle-left"></i></button>
        </a>

    </div>
    
	<div class="row"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover "> 
                    <thead>
                        <th style="width: 2%">Id</th>
                        <th style="width: 10%">Tipo de antecedente</th>
                        <th style="width: 10%">Fecha vencimiento</th>
                        <!--<th style="width: 10%">Opciones</th>-->
                    </thead>
                    <tbody id="donativos">
                        @foreach ($tramite as $tra)
                            <tr class="even gradeA" id="donativo{{$tra->idtramite}}">
                                <td>{{$tra->idtramite}}</td>
                                <td>{{$tra->nombreantecedente}}</td>
                                <td>{{$tra->fechavencimiento}}</td>
                                <!--<td>
                                    <button class="btn  btn-warning btn-md btneditdb" value="{{$tra->idtramite}}" title="Editar"><i class="fa fa-pencil"></i></button>  
                                </td>-->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>           
    </div>
</div>

<div class="col-lg-12">
    <div class="modal fade" id="formModalD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="inputTitleD"></h4>
                </div>

                <form role="form" id="formAgregarD">
                    <div class="modal-header">
                        <input id="iddona" type="hidden" class="form-control" maxlength="9" aria-describedby="basic-addon1"> 
                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label">Bienhechor</label>
                            <input id="nombreD" type="text" class="form-control" aria-describedby="basic-addon1" disabled="disabled">   
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label">Fecha del donativo</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fechadona" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label">Cantidad</label>
                            <input id="cantidad" type="text" class="form-control" maxlength="9" aria-describedby="basic-addon1">   
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label class="control-label">Descripción</label>
                            <textarea class="form-control" id="observaciones" rows="3" maxlength="300"></textarea>
                        </div>
                    </div> 
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarD">Guardar</button>
                    <input type="hidden" id="idbi" name="idbi" value="0"/>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="erroresModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Errores</h4>
          </div>

          <div class="modal-body">
            <ul style="list-style-type:circle" id="erroresContent"></ul>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

<meta name="_token" content="{!! csrf_token() !!}" />

<script src="{{asset('assets/js/bienhechor/donacion.js')}}"></script>
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#fechadona').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
                
        });

        $("#formAgregar").validate({
                 rules: {
                    email: {
                        required: true,
                        email: true
                    }
                 }
             });
    });
</script>

