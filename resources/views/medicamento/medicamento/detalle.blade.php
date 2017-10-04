        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
        <link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />

<div class="tabs-container" id="contentsecundario">
	<div class="row">
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3 class="box-title" align="center">Datos de un medicamento</h3>
            <hr style="border-color:black;"/>
	        <h4><strong>Nombre Medicamento:</strong>&nbsp;&nbsp;&nbsp;{{$detalle->medicamento}}</h4>
	        <h4><strong>Marca:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->marca}}</h4>
	        <h4><strong>Presentaci&oacute;n:</strong>&nbsp;&nbsp;&nbsp;{{$detalle->presentacion}}</h4>
            <h4><strong>Cantidad:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->cantidad}} 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
	        
	    </div>
	</div>

    <div>
        <a href="javascript:void(0);" onclick="cargarindex(4);">
            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Listado Empleado"><i class="fa fa-arrow-circle-left"></i></button>
        </a>

    </div>

	<div class="row"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover "> 
                    <thead>
                        <th style="width: 2%">Id</th>
                        <th style="width: 10%">Sustancia</th>
                        <th style="width: 10%">Concentración</th>
                        <th style="width: 10%">Familia</th>
                    </thead>
                    <tbody id="donativos">
                        @foreach ($composicion as $com)
                            <tr class="even gradeA" id="composicion{{$com->idcomposicion}}">
                                <td>{{$com->idcomposicion}}</td>
                                <td>{{$com->principio}}</td>
                                <td>{{$com->concentracion}}</td>
                                <td>{{$com->familia}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>           
    </div>

</div>

<meta name="_token" content="{!! csrf_token() !!}" />


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

