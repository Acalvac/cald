<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
        <div class="navbar-form navbar-left pull-right">

            <div class="navbar-form navbar-left pull-left">

            <input type="text" class="form-control" id="dato_buscado" name="dato_buscado" placeholder="Buscar...">
            <button type="button" class="btn btn-info btn-flat" onclick="buscarbienhechor();" >Buscar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() 
    {
        $('#dato_buscado').keypress(function(e)
        {   
            if(e.which == 13){    
                //alert('dd');  
                buscarbienhechor();      
            }   
        }); 
    });
    function buscarbienhechor(){
        var urlraiz=$("#url_raiz_proyecto").val();
        var dato=$("#dato_buscado").val();
        if(dato == "")
        {
            var url=urlraiz+"/bienhechor/indexb/"+"";
        }
        else{
        var url=urlraiz+"/bienhechor/indexb/"+dato;
        }
        $("#contentsecundario").html($("#cargador_empresa").html());
            $.get(url,function(resul){
            $("#contentsecundario").html(resul);  
        })
    }
</script>