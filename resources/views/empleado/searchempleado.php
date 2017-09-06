    <div class="row">
        <h4 class="box-title" align="center">Listado Empleado</h4>
        <hr style="border-color:black;"/>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="navbar-form navbar-left pull-left">
                <a href="add"><button class="btn btn-primary btn-addEmpleado" title="Nuevo Empleado" value="addb" id="addEmpleado">Nuevo Empleado</button></a>
            </div>

        <div class="navbar-form navbar-right pull-rigth">
                <div class="input-group">                    
                    <input type="text" class="form-control" id="searchText" name="searchText" placeholder="Buscar...">
                    <span class="input-group-btn"> 
                        <button type="button" class="btn btn-info btn-flat" onclick="buscarempleado();">Buscar</button>
                    </span>
                </div>
            </div>            
        </div>
    </div>
    


    <script type="text/javascript"> 

    var $ = jQuery;
    $(document).ready(function() {


            $('#searchText').keypress(function(e){   
               if(e.which == 13){      
                 buscarempleado();      
               }   
              });    
            
        });</script>


