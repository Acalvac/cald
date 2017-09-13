<link href="{{asset('assets/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/footable/footable.core.css')}}" rel="stylesheet">
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
                            <div class="col-lg-12">
                                <p>Datos del Niño</p>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Nombres *</label>
                                        <input id="nombre" type="text" class="form-control required">
                                    </div>
                                </div>    
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Apellidos *</label>
                                        <input id="apellidos" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Fecha de nacimiento</label>
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
                                        <label>Lugar de origen</label>
                                        <input id="confirm" name="confirm" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Procedencia</label>
                                        <input id="confirm" name="confirm" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label>Talla </label>
                                        <select id="talla" class="form-control select2" data-live-search="true">
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
                                            <input id="nombre" type="text" class="form-control">
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
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>    
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input id="apellidos" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Fecha de nacimiento</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input id="fenac" type="text" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Ocupación</label>
                                        <input id="nombre" type="text" class="form-control">
                                    </div>
                                </div>    
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label>Talla </label>
                                        <select id="talla" class="form-control select2" data-live-search="true">
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
                                            <input id="nombre" type="text" class="form-control">
                                            <span class="input-group-addon">Lbs.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Lenguaje</label>
                                        <input id="apellidos" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Religión</label>
                                        <input id="apellidos" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Parentezco</label>
                                        <input id="apellidos" type="text" class="form-control">
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
                                        <label>Anomalias observadas</label>
                                        <input id="apellidos" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label></label><br>
                                        <button class="btn btn-info btn-md" title="Agregar"><i class="fa fa-plus-circle"></i></button>
                                    </div>
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
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/plugins/footable/footable.all.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/pacientes/paciente.js')}}"></script>