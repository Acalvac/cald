<div class="tabs-container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title" align="center">Datos del paciente</h3>
            <hr style="border-color:black;"/>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h4><strong>Nombre:</strong></h4>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h4><strong>{{$encabezado->nombrepa}}</strong></h4>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h4><strong>Edad:</strong></h4>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h4><strong>{{$edad}}</strong></h4>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h4><strong>Fecha ingreso:</strong></h4>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h4><strong>{{$encabezado->fechaingreso}}</strong></h4>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h4><strong>Procedencia:</strong></h4>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h4><strong>{{$encabezado->procedencia}}</strong></h4>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h4><strong>Lugar origen:</strong></h4>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h4><strong>{{$encabezado->lorigen}}</strong></h4>
            </div>

        </div>
    </div>

    <div id="cargardetalle">
        <div>
            <a href="javascript:void(0);" onclick="cargarindex(21);">
                <button class="btn btn-primary btn-md btn-detalle-empleado" title="Listado Empleado"><i class="fa fa-arrow-circle-left"></i></button>
            </a>
        </div>
        
    	<div class="row"><br><br>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover "> 
                        <thead>
                            <th style="width: 2%">Id</th>
                            <th style="width: 10%">Fecha Examen</th>
                            <th style="width: 10%">Temperatura</th>
                            <th style="width: 10%">Respiracion por minuto</th>
                            <th style="width: 10%">Pulso</th>
                            <th style="width: 10%">Opciones</th>
                        </thead>
                        <tbody id="donativos">
                            @foreach ($detalle as $det)
                                <tr class="even gradeA" id="examen{{$det->idhistorialmedic}}">
                                    <td>{{$det->idhistorialmedic}}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d',$det->fecha)->format('d-m-Y')}}</td>
                                    <td>{{$det->temperatura}}</td>
                                    <td>{{$det->respiracionminuto}}</td>
                                    <td>{{$det->pulso}}</td>
                                    <td>
                                        <a href="javascript:void(0);" onclick="cargardetalle(10,{{$det->idhistorialmedic}});">
                                            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles"><i class="fa fa-address-card"></i></button>
                                        </a>  
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

<meta name="_token" content="{!! csrf_token() !!}" />

<script src="{{asset('assets/js/bienhechor/donacion.js')}}"></script>
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>