<link href="{{asset('assets/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

<div class="wrapper wrapper-content animated fadeInRight ecommerce">
                
    <div class="ibox float-e-margins">
        <div class="ibox-title">
                    <h3 align="center">Ingreso de paciente</h3>
                    <a href="javascript:void(0);" onclick="cargarindex(21);">
                        <button class="btn btn-primary btn-md" title="Listado Pacientes"><i class="fa fa-arrow-circle-left"></i></button>
                    </a>
                    <hr style="border-color:black;"/>
        </div>
        <div class="ibox-content">
                        <div id="wizard">
                            <h1>Datos Generales</h1>
                            <div class="step-content">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>Datos del Niño</p>
                                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                                        <label>Nombres y apellidos</label>
                                        <div class="form-group">
                                            <input id="nombrep" name="nino" type="text" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Fecha de nacimiento</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input id="fechanacp" type="text" class="form-control" maxlength="10" onkeypress="return valida(event);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <label>Talla </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="tallap">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Peso </label>
                                            <div class="input-group">
                                                <input id="pesop" type="text" class="form-control" maxlength="6" onkeypress="return valida(event);">
                                                <span class="input-group-addon">Lbs.</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Procedencia</label>
                                            <input id="procedenciap" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-3 col-md-4 col-sm-9 col-xs-12">
                                        <label>Lugar de origen</label>
                                                <div class="form-group">
                                                    <select id="origenp" class="form-control" >
                                                        @if (isset($origen))
                                                            @foreach($origen as $org)
                                                                <option value="{{$org->idmunicipio}}">{{$org->municipio}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <br>
                                        <button id="btnaddlug" class="btn btn-success btn-md" title="Agregar"><i class="fa fa-window-restore"></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <p>Datos de los padres</p>
                                    <div class="col-lg-2 col-md-4">
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
                                    <div class="col-lg-3 col-md-4">
                                        <div class="form-group">
                                            <label>Nombres *</label>
                                            <input id="nombrefam" type="text" class="form-control">
                                        </div>
                                    </div>    
                                    <div class="col-lg-1 col-md-2">
                                        <div class="form-group">
                                            <label>Edad</label>
                                            <div class="input-group">
                                                <input id="fenacfam" type="text" class="form-control" maxlength="2" onkeypress="return valida(event);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2">
                                        <div class="form-group">
                                            <label>Talla </label>
                                            <input type="text" class="form-control" id="tallafam">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4">
                                        <div class="form-group">
                                            <label>Peso </label>
                                            <div class="input-group">
                                                <input id="pesofam" type="text" class="form-control" maxlength="6" onkeypress="return valida(event);">
                                                <span class="input-group-addon">Lbs.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="form-group">
                                            <label>Ocupación</label>
                                            <input id="ocupacionfam" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">

                                    <div class="col-lg-3 col-md-5 col-sm-9 col-xs-12 form-inline">
                                    <label>Lenguaje</label>
                                            <div id="divlenguaje" >
                                                    <select id="idiomafam" class="chosen-select form-control"  multiple data-placeholder="Seleccione ...">
                                                        @if (isset($idioma))
                                                            @foreach($idioma as $idi)
                                                                <option value="{{$idi->ididioma}}">{{$idi->nombreid}},&nbsp;&nbsp;</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                            </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-12"><br>
                                        <button id="addIdiofam" class="btn btn-success btn-md" title="Agregar nuevo registro"><i class="fa fa-window-restore"></i></button>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-9 col-xs-12">
                                        <label>Religión</label>
                                        <div class="form-group">
                                            <select id="religionfam" class="form-control">
                                                @if (isset($religion))
                                                    @foreach($religion as $rel)
                                                        <option value="{{$rel->idreligion}}">{{$rel->religion}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-12">
                                        <br>
                                        <button id="btnaddrel" class="btn btn-success btn-md" title="Agregar una nueva religión"><i class="fa fa-window-restore"></i></button>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <label>Anomalias observadas</label>
                                        <div class="form-group">
                                            <label>Si<input type="radio" value="Si" onclick="Anofams(this)" id="an" name="an"></label>&nbsp;&nbsp;
                                            <label>Ninguna<input type="radio" value="No" onclick="Anofams(this)" id="an" name="an" checked=""></label>
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12" id="divanomal" style="display: none;">
                                            <select id="anomaliafam" class="chosen-select" style="width:350px;"  multiple data-placeholder="Seleccione ...">
                                                @if (isset($anomalia))
                                                    @foreach($anomalia as $ano)
                                                        <option value="{{$ano->idanomalia}}">{{$ano->anomalia}},&nbsp;&nbsp;</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12" id="divbtn" style="display: none;">
                                            <button id="addAnofam" class="btn btn-success btn-md" title="Agregar nuevo registro"><i class="fa fa-window-restore"></i></button>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12"><br>
                                            <button id="addFam" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i>&nbsp;Añadir</button>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                                        <table id="detallesfam" class="table table-striped table-bordered table-hover">
                                            <thead style="background-color:#A9D0F5">
                                                <tr>
                                                    <th style="width: 2%">Opciones</th>
                                                    <th>Nombres</th>
                                                    <th>Edad</th>
                                                    <th>Ocupación</th>
                                                    <th>Talla</th>
                                                    <th>Peso</th>
                                                    <th>Idiomas</th>
                                                    <th>Religión</th>
                                                    <th>Anomalias</th>
                                                    <th>Parentezco</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <h1>Antecedentes Perinatales</h1>
                            <div class="step-content">
                                <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label>Infecciones de la madre durante el embarazo&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" onclick="Infecmadre(this)" id="imde" name="imde"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" onclick="Infecmadre(this)" id="imde" name="imde" checked=""></label>
                                    </div>
                                    <div class="col-lg-12" id="Div1" style="display: none;">
                                            <div class="col-lg-8">
                                                <select id="infecciontipo" class="select2 form-control" >
                                                    @if (isset($tipoinfeccion))
                                                        @foreach($tipoinfeccion as $inf)
                                                            <option value="{{$inf->idtipoinfeccion}}">{{$inf->nombre}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <button id="btninfeccion" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                                </div>
                                            </div> 
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <button id="btnaddinf" class="btn btn-success btn-md" title="Agregar"><i class="fa fa-window-restore"></i></button>
                                                </div>
                                            </div>  
                                    </div>
                                </div>  
                                <div class="col-lg-4">
                                    <label>Enfermedades Crónicas de la madre&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" onclick="Enfcmadre(this)" id="ecdm" name="ecdm"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" onclick="Enfcmadre(this)" id="ecdm" name="ecdm" checked=""></label>                         
                                    </div>
                                    <div class="col-lg-12" id="Div2" style="display: none;">
                                        <div class="col-lg-8">
                                            <select id="enfermedadtipo" class="form-control" >
                                                @if (isset($tipoenfermedad))
                                                    @foreach($tipoenfermedad as $enf)
                                                        <option value="{{$enf->idtipoenfermedad}}">{{$enf->nombre}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <button id="enftipo" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                            </div>
                                        </div> 
                                        <div class="col-lg-1">
                                                <div class="form-group">
                                                    <button id="btnaddenf" class="btn btn-success btn-md" title="Agregar"><i class="fa fa-window-restore"></i></button>
                                                </div>
                                            </div>  
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                <label>¿Convive la madre con animales domésticos?&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" onclick="Conmadre(this)" id="cmcad" name="cmcad"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" onclick="Conmadre(this)" id="cmcad" name="cmcad" checked=""></label>
                                    </div>
                                    <div class="col-lg-12" id="Div3" style="display: none;">
                                            <div class="col-lg-8">
                                            <select id="animaltipo" class="form-control" >
                                                @if (isset($tipoanimal))
                                                    @foreach($tipoanimal as $ani)
                                                        <option value="{{$ani->idanimal}}">{{$ani->nombreanimal}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <button id="btnanimal" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <button id="btnaddanimal" class="btn btn-success btn-md" title="Agregar"><i class="fa fa-window-restore"></i></button>
                                                </div>
                                            </div>    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label>¿Qué tipo de personal atendió a la madre en el parto?</label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" onclick="Atmadre(this)" id="tpamp" name="tpamp"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" onclick="Atmadre(this)" id="tpamp" name="tpamp" checked=""></label>                         
                                    </div>
                                    <div class="col-lg-12" id="Div4" style="display: none;">
                                        <div class="col-lg-8">
                                            <select id="personalati" class="form-control" >
                                                @if (isset($personalat))
                                                    @foreach($personalat as $ano)
                                                        <option value="{{$ano->idpersonalatiende}}">{{$ano->nombre}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <button id="btnpersonal" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                            </div>
                                        </div> 
                                        <div class="col-lg-1">
                                                <div class="form-group">
                                                    <button id="btnaddpersonal" class="btn btn-success btn-md" title="Agregar"><i class="fa fa-window-restore"></i></button>
                                                </div>
                                            </div>   
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <label>Medicamentos que haya tomado durante su embarazo, incluyendo medicina natural.</label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" onclick="mtdeimn(this)" id="mednatural" name="mednatural"></label>&nbsp;&nbsp;
                                        <label>Ninguno<input type="radio" value="No" onclick="mtdeimn(this)" id="mednatural" name="mednatural" checked=""></label>                         
                                    </div>
                                    <div class="col-lg-10" id="Div6" style="display: none;">
                                        <div class="col-lg-8">
                                            <select id="medicamento" class="form-control" >
                                                @if (isset($medicina))
                                                    @foreach($medicina as $ano)
                                                        <option value="{{$ano->idmedicina}}">{{$ano->nombre}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <button id="btnmedicina" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                <button id="btnaddmedicina" class="btn btn-success btn-md" title="Agregar"><i class="fa fa-window-restore"></i></button>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>¿Cuánto tiempo duro el trabajo del parto?</label>
                                        <input id="tparto" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>¿Lloró el niño inmediatamente al nacer? </label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" id="lnin" name="lnin"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" id="lnin" name="lnin" checked=""></label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>¿Se puso cianótico el niño al nacer? </label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" id="pcnn" name="pcnn"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" id="pcnn" name="pcnn" checked=""></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label>¿Le tuvieron que realizar alguna maniobra al niño para que respirara?</label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" id="mnpr" name="mnpr"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" id="mnpr" name="mnpr" checked=""></label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>¿Se puso el niño ictérico los primeros días de nacido? </label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" id="nipdn" name="nipdn"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" id="nipdn" name="nipdn" checked=""></label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>¿Succionaba bien el pecho, después de nacido? </label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" id="sbpdn" name="sbpdn"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" id="sbpdn" name="sbpdn" checked=""></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label>¿Tenía sus manos y pies duros o estaban flacidos? </label>
                                    <div class="form-group">
                                        <label>Duros<input type="radio" id="tpym" value="Duros" name="tpym"></label>&nbsp;&nbsp;
                                        <label>Flacidos<input type="radio" id="tpym" value="Flacidos" name="tpym" checked=""></label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>¿Se infectó el cordón del ombligo antes de caerse? </label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" id="icoac" name="icoac"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" id="icoac" name="icoac" checked=""></label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>¿Tuvo control prenatal? </label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" onclick="Tcontrolp(this)" id="tcp" name="tcp"></label>&nbsp;&nbsp;
                                        <label>No<input type="radio" value="No" onclick="Tcontrolp(this)" id="tcp" name="tcp" checked=""></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" id="Div5" style="display: none;">
                                <div class="col-lg-4" >
                                    <div class="form-group">
                                        <label>¿Con quien?</label>
                                        <input id="conquien" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>¿Cuántas veces?</label>
                                        <input id="veces" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Algún comentario que le hicieron de su embarazo durante su control</label>
                                        <input id="comentario" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" id="infeccion" style="display: none;">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detallesinfec" class="table table-striped table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th style="width: 2%">Opciones</th>
                                                <th>Infecciones de la madre</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12" id="enfcronicas" style="display: none;">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detallesenf" class="table table-striped table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th style="width: 2%">Opciones</th>
                                                <th>Enfermedades crónicas de la madre</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12" id="anconvive" style="display: none;">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detallesanimal" class="table table-striped table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th style="width: 2%">Opciones</th>
                                                <th>Animales con las que convive la madre</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12" id="personaatendio" style="display: none;">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detallespersona" class="table table-striped table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th style="width: 2%">Opciones</th>
                                                <th>Tipo de personal que atendio a la madre durante el parto</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12" id="medicamentos" style="display: none;">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detallesmedicina" class="table table-striped table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th style="width: 2%">Opciones</th>
                                                <th>Medicamento que tomó durante su embarazo</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            </div>

                            <h1>Antecedentes de Crecimiento y Desarrollo</h1>
                            <div class="step-content">
                                <div class="col-lg-12">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿A qué edad sostuvo solo su cabeza el niño?</label>
                                        <input id="edadscn" type="text" class="form-control required">
                                    </div>
                                </div>   
                                <div class="col-lg-3">
                                    <label>¿A qué edad se sentó solo?</label>
                                    <div class="form-group">
                                        <input id="edadss" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>¿A qué edad caminó?</label>
                                    <div class="form-group">
                                        <input id="edadcamino" name="confirm" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿A qué edad emitió sus primeras palabras?</label>
                                        <input id="edadepp" name="confirm" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>¿Cuándo notaron que el niño no estaba normal o tenía algo diferente a los demás?</label>
                                            <input id="cnoeranormal" name="confirm" type="text" class="form-control">
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Qué fue lo primero que notaron diferente?</label><br><br>
                                        <input id="qfpnd" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Qué actitud tomaron al comprobar que el niño no era normal? </label>
                                        <input id="qatcnen" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>¿Qué vacunas tiene? </label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" onclick="Vacunast(this)" id="vtiene" name="vtiene"></label>&nbsp;&nbsp;
                                        <label>Ninguna<input type="radio" value="No" onclick="Vacunast(this)" id="vtiene" checked="" name="vtiene"></label>
                                    </div>
                                    <div class="col-lg-12" id="divacuna" style="display: none;">
                                        <div class="col-lg-8">
                                            <select id="vacunass" class="form-control" >
                                                @if (isset($vacunas))
                                                    @foreach($vacunas as $ano)
                                                        <option value="{{$ano->idvacuna}}">{{$ano->vacuna}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <button id="btnvacuna" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                                <div class="form-group">
                                                    <button id="btnadvac" class="btn btn-success btn-md" title="Agregar"><i class="fa fa-window-restore"></i></button>
                                                </div>
                                            </div>  
                                    </div>   
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Cuántos hermanos tiene?</label>
                                        <input id="chermanost" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>¿Qué numero de orden le corresponde? </label>
                                        <input id="ordencor" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>¿Está bautizado? </label>
                                        <div class="form-group">
                                            <label>Si<input type="radio" value="Si" id="bautizado" name="bautizado"></label>&nbsp;&nbsp;
                                            <label>No<input type="radio" value="No" id="bautizado" name="bautizado" checked=""></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>¿Qué enfermedades han padecido? </label>
                                    <div class="form-group">
                                        <label>Si<input type="radio" value="Si" onclick="Enfpadecido(this)" id="epadecido" name="epadecido"></label>&nbsp;&nbsp;
                                        <label>Ninguna<input type="radio" value="No" onclick="Enfpadecido(this)" id="epadecido" checked="" name="epadecido"></label>
                                    </div>
                                    <div class="col-lg-12" id="divpadecido" style="display: none;">
                                        <div class="col-lg-8">
                                            <select id="enfpadecido" class="form-control" >
                                            @if (isset($tipoenfermedad))
                                                @foreach($tipoenfermedad as $enf)
                                                    <option value="{{$enf->idtipoenfermedad}}">{{$enf->nombre}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <button id="btnpadecido" class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                                <div class="form-group">
                                                    <button id="btnaddenfh" class="btn btn-success btn-md" title="Agregar"><i class="fa fa-window-restore"></i></button>
                                                </div>
                                            </div>  
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-12" id="vactable" style="display: none;">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detallesvacuna" class="table table-striped table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th style="width: 2%">Opciones</th>
                                                <th>Vacunas que tiene el niño</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12" id="enftable" style="display: none;">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detallesenpadecido" class="table table-striped table-bordered table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th style="width: 2%">Opciones</th>
                                                <th>Enfermedades que han padecido</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                            <h1>Responsable</h1>
                            <div class="step-content">
                                <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label>Persona Responsable *</label>
                                    <div class="form-group">
                                        <input id="nombreres" name="responsable" type="text" class="form-control required">
                                    </div>
                                </div>   
                                <div class="col-lg-2">
                                    <label>Identificación</label>
                                    <div class="form-group">
                                        <input id="identificacionres" type="text" class="form-control" maxlength="13" onkeypress="return valida(event);">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Dirección</label>
                                    <div class="form-group">
                                        <input id="direccionres" name="confirm" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label>Teléfono</label>
                                    <div class="form-group">
                                        <input id="telefonores" name="confirm" type="text" class="form-control" maxlength="8" onkeypress="return valida(event);">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>

</div>
<div class="col-lg-12">
                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="inputTitle"></h4>
                            </div>

                        <form role="form" id="formAgregar">
                            <div class="modal-header">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Nombre</label>
                                        <input id="nombre" name="nombre" type="text" class="form-control" aria-describedby="basic-addon1">   
                                    </div>
                                </div>
                            </div> 
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                            <input type="hidden" id="idb" name="idb" value="0"/>
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

<script src="{{asset('assets/js/plugins/steps/jquery.steps.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/pacientes/paciente.js')}}"></script>



   