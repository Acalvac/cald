<div class="box-header" id="capa">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="navbar-form navbar-left pull-left">
            <button class="btn btn-primary btn-addB" title="Nuevo usuario" onclick="cargarmodalempleado(1);">Nuevo Usuario</button>
        </div>

        <div class="navbar-form navbar-right pull-rigth">                    
                        <div class="input-group">
                            <select  id="select_filtro_rol" class="form-control select2" data-live-search="true"  onchange="buscarusuario();" >
                                <?php  if(isset($rolsel)){ 
                                    $listadopais=$rolsel->name; 
                                    $optsel= '<option value="'.$rolsel->id.'">'.$rolsel->name.' </option>';
                                }else{  
                                    $listadopais="General";
                                    $optsel="";
                                 } ?>

                                <?=  $optsel;  ?>
                                <option value="0">General </option>
                                @if(isset($roles))
                                <?php foreach($roles as $rol){   ?>
                                <option value="<?= $rol->id; ?>" > <?= $rol->name; ?></option>
                                <?php }  ?>
                                @endif
                            </select>
                        </div>

                        <div class="input-group">     
                            <input type="text" class="form-control" id="dato_buscado">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-flat" type="button"   onclick="buscarusuario();" >Buscar!</button>
                            </span>
                        </div>
        </div>           
    </div>
</div>
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>


    <script type="text/javascript">
        document.getElementById('dato_buscado').focus();

    
        $(document).ready(function() {
            $(".select2").select2();

            $('#dato_buscado').keypress(function(e){   
                if(e.which == 13){      
                    buscarusuario();
                    document.getElementById('dato_buscado').focus();

                }   
            });
        });
    </script>




