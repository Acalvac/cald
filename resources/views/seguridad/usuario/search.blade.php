<div class="box-header" id="capa">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <h4 class="box-title" align="center">Listado Usuario</h4>
        <hr style="border-color:black;"/>

        <div class="navbar-form navbar-left pull-left">
            <button class="btn btn-primary btn-addB" title="Nuevo usuario" onclick="cargarmodalempleado(1);">Nuevo</button>
        </div>

        <div class="navbar-form navbar-right pull-rigth">                    
            <div class="input-group">
                <select  id="select_filtro_rol" class="chosen-select" data-live-search="true"  onchange="buscarusuario();" >
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
                    <button class="btn btn-info btn-flat" type="button" onclick="buscarusuario();" >Buscar!</button>
                </span>
            </div>
        </div>           
    </div>
</div>

<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript">
    $('.chosen-select').chosen({width: "100%"});
    document.getElementById('dato_buscado').focus();
    $(document).ready(function() {
        $('#dato_buscado').keypress(function(e){   
            if(e.which == 13){      
                buscarusuario();
                document.getElementById('dato_buscado').focus();
            }   
        });
    });
</script>