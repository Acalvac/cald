<link href="{{asset('assets/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3 align="center">Ingreso de paciente</h3>
                    <a href="javascript:void(0);" onclick="cargarindex(21);">
                        <button class="btn btn-primary btn-md" title="Listado Pacientes"><i class="fa fa-arrow-circle-left"></i></button>
                    </a>
                    <hr style="border-color:black;"/>
                </div>
                <div class="ibox-content">
                    <p>
                        * Campos obligatorios.
                    </p>
                    <div id="wizard">
                        <h3>Datos Generales</h3>
                        <section>
                            <div class="col-lg-12 col-md-12">
                                <p>Datos del Niño</p>
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label>Nombres *</label>
                                        <input id="nombrep" type="text" class="form-control required">
                                    </div>
                                </div>    
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label>Apellidos *</label>
                                        <input id="apellidop" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label>Fecha de nacimiento</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input id="fechanacp" type="text" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label>Lugar de origen</label>
                                        <input id="origenp" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label>Procedencia</label>
                                        <input id="procedenciap" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2">
                                    <label>Talla </label>
                                    <div class="form-group">
                                        <select id="tallap" class="form-control">
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label>Peso </label>
                                        <div class="input-group">
                                            <input id="pesop" type="text" class="form-control">
                                            <span class="input-group-addon">Lbs.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <p>Datos de los padres</p>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Nombres *</label>
                                        <input id="nombrefam" type="text" class="form-control">
                                    </div>
                                </div>    
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input id="apellidofam" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Fecha de nacimiento</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input id="fenacfam" type="text" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Ocupación</label>
                                        <input id="ocupacionfam" type="text" class="form-control">
                                    </div>
                                </div>    
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label>Talla </label>
                                        <select id="tallafam" class="form-control" >
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Peso </label>
                                        <div class="input-group">
                                            <input id="pesofam" type="text" class="form-control">
                                            <span class="input-group-addon">Lbs.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Lenguaje</label>
                                        <select id="idiomafam" class="form-control">
                                            @if (isset($idioma))
                                                @foreach($idioma as $idi)
                                                    <option value="{{$idi->ididioma}}">{{$idi->nombreid}},&nbsp;&nbsp;</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label></label><br>
                                        <button id="addIdiofam" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Religión</label>
                                        <select id="religionfam" class="form-control " >
                                            @if (isset($religion))
                                                @foreach($religion as $rel)
                                                    <option value="{{$rel->idreligion}}">{{$rel->religion}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Anomalias observadas</label>
                                        <select id="anomaliafam" class="form-control" >
                                            @if (isset($anomalia))
                                                @foreach($anomalia as $ano)
                                                    <option value="{{$ano->idanomalia}}">{{$ano->anomalia}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label></label><br>
                                        <button id="addAnofam" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Parentesco</label>
                                        <select id="parentescofam" class="form-control " >
                                            @if (isset($parentesco))
                                                @foreach($parentesco as $pare)
                                                    <option value="{{$pare->idparentesco}}">{{$pare->parentesco}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label></label><br>
                                        <button id="addFam" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detallesfam" class="table table-striped table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th style="width: 2%">Opciones</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Edad</th>
                                                <th>Ocupación</th>
                                                <th>Talla</th>
                                                <th>Peso</th>
                                                <th>Idiomas</th>
                                                <th>Religión</th>
                                                <th>Parentezco</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detallesidio" class="table table-striped table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th style="width: 2%">Opciones</th>
                                                <th>Idioma</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detallesanoma" class="table table-striped table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th style="width: 2%">Opciones</th>
                                                <th>Anomalia</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                        <h3>Antecedentes Perinatales</h3>
                        <section>
                            <div class="col-lg-12">
                                <p>Datos del Niño</p>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Infecciones de la madre durante el embarazo</label>
                                        <input id="nombre" type="text" class="form-control required">
                                    </div>
                                </div> 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label></label><br>
                                        <button class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>   
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Enfermedades Crónicas de la madre</label>
                                        <input id="apellidos" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label></label><br>
                                        <button class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Convive la madre con animales domésticos?</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input id="fechanac" type="text" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label></label><br>
                                        <button class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Qué tipo de personal atendió a la madre en el parto?</label>
                                        <input id="confirm" name="confirm" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label></label><br>
                                        <button class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Medicamentos que haya tomado durante su embarazo, incluyendo medicina natural.</label>
                                        <input id="confirm" name="confirm" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label></label><br>
                                        <button class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Cuánto tiempo duro el trabajo del parto?</label>
                                        <input id="apellidos" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Lloró el niño inmediatamente al nacer? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Se puso cianótico el niño al nacer? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Le tuvieron que realizar alguna maniobra al niño para que respirara?</label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Se puso el niño ictérico los primeros días de nacido? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Succionaba bien el pecho, después de nacido? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Tenía sus manos y pies duros o estaban flacidos? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Se infectó el cordón del ombligo antes de caerse? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Tuvo control prenatal? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Algún comentario que le hicieron de su embarazo durante su control</label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3>Antecedentes de Crecimiento y Desarrollo</h3>
                        <section>
                            <div class="col-lg-12">
                                <p>Datos del Niño</p>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿A qué edad sostuvo solo su cabeza el niño?</label>
                                        <input id="nombre" type="text" class="form-control required">
                                    </div>
                                </div>   
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿A qué edad se sentó solo?</label>
                                        <input id="apellidos" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿A qué edad caminó?</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input id="fechanac" type="text" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿A qué edad emitió sus primeras palabras?</label>
                                        <input id="confirm" name="confirm" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>¿Cuándo notaron que el niño no estaba normal o tenía algo diferente a los demás?</label>
                                            <input id="confirm" name="confirm" type="text" class="form-control">
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Qué fue lo primero que notaron diferente?</label><br><br>
                                        <input id="apellidos" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Qué actitud tomaron al comprobar que el niño no era normal? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Qué vacunas tiene? </label><br><br>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Cuántos hermanos tiene?</label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Qué enfermedades han padecido? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Qué numero de orden le corresponde? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Está bautizado? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Se infectó el cordón del ombligo antes de caerse? </label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Tuvo control prenatal? </label><br><br>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Algún comentario que le hicieron de su embarazo durante su control</label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/plugins/steps/jquery.steps.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/pacientes/paciente.js')}}"></script>




   