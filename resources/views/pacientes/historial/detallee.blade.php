<div class="row">


    <div>
        <a href="javascript:void(0);" onclick="detalle(9,{{$historial->idpaciente}});">
            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Listado Empleado"><i class="fa fa-arrow-circle-left"></i></button>
        </a>
    </div>
    
    <h5>SIGNOS VITALES</h5>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<div class="table-responsive">
            <table class="table table-striped table-condensed table-hover"> 
            <tbody>
            	<!--
            	<tr>
            			<th style="width: 10%"> Temperatura </th>
            		<td style="border-bottom:0.1px solid #000000; width: 10%;" > 37 C</td>
            		<th style="width: 10%">presion arterial</th>
            		<td style="border-bottom:1px solid #000000; width: 10%;"> 37 C</td>
            		
            	</tr>
            	-->
 
            	<tr>
            		<th style="width: 10%">Temperatura</th>
            		<td style="border-bottom:1px solid #000000;  width: 40%">{{$historial->temperatura}} </td>
            		
            		<th style="width: 10%">presi&oacute;n arterial</th>
            		<td style="border-bottom:1px solid #000000;  width: 40%"></td>
            	</tr>

            	<tr>
            		<th style="width: 15%">Respiracion por minuto</th>
            		<td style="border-bottom:1px solid #000000;  width: 35%">{{$historial->respiracionminuto}}</td>
            		
            		<th style="width: 10%">pulso radial</th>
            		<td style="border-bottom:1px solid #000000;  width: 40%">{{$historial->pulso}}</td>
            	</tr>

            	<tr>
            		<th style="width: 15%">Circunferencia cef&aacute;lica</th>
            		<td style="border-bottom:1px solid #000000;" colspan="3">{{$historial->circunferencia}}</td>
            	</tr>
            </tbody>
            </table>
           </div>
    </div>
            
 
    <h5>ANOMALÍAS VISIBLES</h5>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<div class="table-responsive">
            <table class="table table-striped table-condensed table-hover"> 
            <tbody>
            	<tr>
            		<th style="width: 10%">a) Piel</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->piel}}</td>
            	</tr>

            	<tr>
            		<th style="width: 10%">b) Cabeza</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->cabeza}}</td>
            	</tr>

            	<tr>
            		<th style="width: 10%">c) Ojos</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->ojos}}</td>
            	</tr>
            	<tr>
            		<th style="width: 10%">d) Oidos</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->oidos}}</td>
            	</tr>
            	<tr>
            		<th style="width: 10%">e) nariz</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->nariz}}</td>
            	</tr>
            	<tr>
            		<th style="width: 10%">f) Boca y faringe</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->bacayfaringe}}</td>
            	</tr>
            	<tr>
            		<th style="width: 10%">g) Cuello</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->cuello}}</td>
            	</tr>

            	<tr>
            		<th style="width: 10%">h) Coraz&oacute;n</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->corazon}}</td>    		
            	</tr>
            	<tr>
            		<th style="width: 10%">i) Pulmones</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->pulmones}}</td>
            	</tr>
            	<tr>
            		<th style="width: 10%">j) tórax</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->torax}}</td>
            	</tr>
            	<tr>
            		<th style="width: 15%">k) Manos y axilas</th>
            		<td style="border-bottom:1px solid #000000;  width: 85%">{{$historial->manoaxila}}</td>
            	</tr>
            	<tr>
            		<th style="width: 10%">l) Columna</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->columna}}</td>
            	</tr>
            	<tr>
            		<th style="width: 10%">m) Abdomen</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->abdomen}}</td>
            	</tr>
            	<tr>
            		<th style="width: 20%">n) Extremidades superiores</th>
            		<td style="border-bottom:1px solid #000000;  width: 80%">{{$historial->exsuperior}}</td>
            	</tr>
            	<tr>
            		<th style="width: 20%">o) Extremidades inferiores</th>
            		<td style="border-bottom:1px solid #000000;  width: 80%">{{$historial->exinferior}}</td>
            	</tr>
            	<tr>
            		<th style="width: 20%">p) Sistema musco-esqueletico</th>
            		<td style="border-bottom:1px solid #000000;  width: 80%">{{$historial->muscoesqueletico}}</td>
            	</tr>
            	<tr>
            		<th style="width: 10%">q) Genitales</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->genitales}}</td>
            	</tr>
            </tbody>
            </table>
           </div>
    </div>
    
    <h5>EXAMEN NEUROLOGICO</h5>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<div class="table-responsive">
            <table class="table table-striped table-condensed table-hover"> 
            <tbody>
            	<tr>
            		<th style="width: 10%">r) Motor</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->motor}}</td>
            	</tr>
            	<tr>
            		<th style="width: 10%">s) Reflejos</th>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$historial->reflejos}}</td>
            	</tr>
            	<tr>
            		<th style="width: 20%">t) Estado mental</th>
            		<td style="border-bottom:1px solid #000000;  width: 80%">{{$historial->estadomental}}</td>
            	</tr>
            	<tr>
            		<th style="width: 20%">u) Reconoce o distingue</th>
            		<td style="border-bottom:1px solid #000000;  width: 80%">
            		@if($historial->reqconoce == 1)
            		Si
            		@endif
            		@if($historial->reqconoce == 0)
            		No
            		@endif</td>
            	</tr>
            </tbody>
            </table>
           </div>
    </div>
    <h5>COMENTARIOS SOBRE EL CASO</h5>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<div class="table-responsive">
            <table class="table table-striped table-condensed table-hover"> 
            <tbody>
            	@foreach ($observacion as $ob)
            	<tr>
            		<td style="border-bottom:1px solid #000000;  width: 90%">{{$ob->observacion}}</td>
            	</tr>
            	@endforeach
             </tbody>
            </table>
           </div>
    </div>

    <div><br></div>
</div>

<meta name="_token" content="{!! csrf_token() !!}" />

<script src="{{asset('assets/js/bienhechor/donacion.js')}}"></script>
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>