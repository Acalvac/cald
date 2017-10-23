<div class="tabs-container" id="contentsecundario">
	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div><br></div>
                <div class="margin" id="botones_control">
                    <a href="javascript:void(0);" onclick="cargarindex(21);">
                        <button class="btn btn-primary btn-md" title="Regresar"><i class="fa fa-arrow-circle-left"></i></button>
                    </a>
                    <a href="{{URL::action('CPaciente@pdf',$paciente->idpaciente)}}"><button class="btn btn-success btn-md">Descargar</button></a>
                </div>
            <div><br></div>
        </div>
    </div>
	<div class="row">
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	    <h3 class="text-center">Datos Generales</h3>
	        <h4>Nombre del niño:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$paciente->nombrepa}}</h4>
	        <h4>Fecha de nacimiento:&nbsp;&nbsp;&nbsp;{{$paciente->fechanac}}</h4>
	        <h4>Lugar de origen:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$paciente->lorigen}}</h4>
	        <h4>Procedencia:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$paciente->procedencia}}</h4>
	    </div>
	</div>
	<div class="row"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<h3 class="text-center">Datos de Familiares</h3>
        	<div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover "> 
                    <thead>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Talla</th>
                        <th>Peso</th>
                        <th>Lenguaje</th>
                        <th>Religión</th>
                        <th>Ocupación</th>
                        <th>Anomalias</th>
                        <th>Parentesco</th>
                    </thead>
                    <tbody id="donativos">
                        @foreach ($familiar as $fam)
                            <tr class="even gradeA" id="familia{{$fam->idfamiliar}}">
                                <td>{{$fam->nombre}}</td>
                                <td>{{$fam->fechanac}} años</td>
                                <td>{{$fam->talla}}</td>
                                <td>{{$fam->peso}}</td>
                                <td>{{$fam->idiomas}}</td>
                                <td>{{$fam->religion}}</td>
                                <td>{{$fam->ocupacion}}</td>
                                <td>{{$fam->anomalias}}</td>
                                <td>{{$fam->parentesco}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>           
    </div>
    <div class="row"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<h3 class="text-center">Antecedentes Perinatales</h3>
        	<div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover "> 
                    <thead>
	                    <tr>
	                        <th style="width: 30%">Infecciones de la madre durante el embarazo:</th>
	                        @if($antperinatal->infeccembarazo == 'Si')
	                        	<td>
	                        		@foreach($infecciones as $inf)
                                        {{$inf->nombre}},
                                    @endforeach
	                        	</td>
	                        @else
	                        	<td>No tuvo infecciones durante su embarazo.</td>
	                        @endif
	                    </tr>
	                    <tr>
	                        <th>Enfermedades crónicas de la madre</th>
	                        @if($antperinatal->enfcronicas == 'Si')
	                        	<td>
	                        		@foreach($enfermedad as $enf)
                                        {{$enf->nombre}},
                                    @endforeach
	                        	</td>
	                        @else
	                        	<td>No se enfermo durante su embarazo.</td>
	                        @endif
	                    </tr>
	                    <tr>
	                        <th>Convive la madre con animales domésticos</th>
	                        @if($antperinatal->conviveanimal == 'Si')
	                        	<td>
	                        		@foreach($conanimales as $ca)
                                        {{$ca->nombreanimal}},
                                    @endforeach
	                        	</td>
	                        @else
	                        	<td>No convivio con animales durante su embarazo.</td>
	                        @endif
	                    </tr>
	                    <tr> 
	                    	<th>¿Qúe tipo de personal atendió a la madre en el parto?</th>
	                    	@if($antperinatal->personatendio == 'Si')
	                        	<td>
	                        		@foreach($peratiende as $per)
                                        {{$per->nombre}},
                                    @endforeach
	                        	</td>
	                        @else
	                        	<td>No presento registros.</td>
	                        @endif
	                    </tr>
	                    <tr>    
	                        <th>Medicamentos que haya tomado durante su embarazo, incluyendo medicina natural:</th>
	                        @if($antperinatal->medicatomados == 'Si')
	                        	<td>
	                        		@foreach($medicina as $medi)
                                        {{$medi->nombre}},
                                    @endforeach
	                        	</td>
	                        @else
	                        	<td>No tomo medicamentos durante su embarazo.</td>
	                        @endif
	                    </tr>
	                    <tr>    
	                        <th>¿Cuánto tiempo duró el trabajo del parto?</th><td>{{$antperinatal->duroparto}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿LLoró el niño inmediatamente al nacer?</th><td>{{$antperinatal->lloronacer}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Se puso cianótico el niño al nacer?</th><td>{{$antperinatal->cianaticonacer}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Le tuvieron que realizar alguna maniobra al niño para que respirara?</th><td>{{$antperinatal->maniobrarespira}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Se puso el niño ictérico los primeros días de nacido?</th><td>{{$antperinatal->ictericonacido}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Succionaba bien el pecho, después de nacido?</th><td>{{$antperinatal->succiondepecho}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Tenía sus manos y pies duros o estaban flácidos?</th><td>{{$antperinatal->manosypies}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Se infectó el cordón del ombligo antes de caerse?</th><td>{{$antperinatal->cordonantesdecaer}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Tuvo control prenatal?</th><td>{{$antperinatal->controlprenatal}}</td>
	                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover" >
                    <thead>
                        <th>¿Con quien?</th>
                        <th>¿Cuántas veces?</th>
                        <th>Algún comentario en su control</th>
                    </thead>
                    <tbody id="productsA" name="productsA">
                                 
                    </tbody>
                </table>
            </div>
        </div>           
    </div>
    <div class="row"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<h3 class="text-center">Antecedentes de Crecimiento y Desarrollo</h3>
        	<div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover "> 
                    <thead>
	                    <tr>
	                        <th style="width: 30%">¿A qué edad sostuvo solo su cabeza el niño?</th><td>{{$cresydesa->edadsostuvocabeza}}</td>
	                    </tr>
	                    <tr>
	                        <th>¿A qué edad se sentó solo?</th><td>{{$cresydesa->edadsentosolo}}</td>
	                    </tr>
	                    <tr>
	                        <th>¿A qué edad caminó?</th><td>{{$cresydesa->edadcamino}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿A qué edad emitió sus primeras palabras?</th><td>{{$cresydesa->primeraspalabras}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Cuándo notaron que el niño no estaba normal o tenía algo diferente a los demás niños?</th><td>{{$cresydesa->notaronnoesnormal}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Qué fue lo primero que notaron diferente?</th><td>{{$cresydesa->notarondiferente}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Qué actitud tomaron al comprobar que el niño no era normal?</th><td>{{$cresydesa->actitudtomada}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Qué vacunas tiene?</th>
	                        @if($cresydesa->vacuna == 'Si')
	                        	<td>
	                        		@foreach($vacunast as $vac)
                                        {{$vac->vacuna}},
                                    @endforeach
	                        	</td>
	                        @else
	                        	<td>No tiene vacunas.</td>
	                        @endif
	                    </tr>
	                    <tr>    
	                        <th>¿Cuántos hermanos tiene?</th><td>{{$cresydesa->hermanostiene}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Qué enfermedades han padecido?</th>
	                        @if($cresydesa->enfepadecido == 'Si')
	                        	<td>
	                        		@foreach($enferpadecido as $enf)
                                        {{$enf->nombre}},
                                    @endforeach
	                        	</td>
	                        @else
	                        	<td>No han padecido de enfermedades.</td>
	                        @endif
	                    </tr>
	                    <tr>    
	                        <th>¿Qué número de orden le corresponde?</th><td>{{$cresydesa->ordecorresponde}}</td>
	                    </tr>
	                    <tr>    
	                        <th>¿Está bautizado?</th><td>{{$cresydesa->estabautizado}}</td>
	                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
       </div>           
    </div>
    <div class="row"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<h3 class="text-center">Persona Responsable</h3>
        	<div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover "> 
                    <thead>
                    	<tr>
		                    <th style="width: 20%">Persona Responsable:</th><td>{{$paciente->nombre}}</td>
		                </tr>
	                    <tr> 
		                    <th>Identificación:</th><td>{{$paciente->identificacion}}</td>
		                </tr>
	                    <tr> 
		                    <th>Dirección:</th><td>{{$paciente->direccion}}</td>
		                </tr>	
	                    <tr> 
		                    <th>Teléfono:</th><td>{{$paciente->telefono}}</td>
		                </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
       </div>           
    </div>
</div>
<meta name="_token" content="{!! csrf_token() !!}" />



