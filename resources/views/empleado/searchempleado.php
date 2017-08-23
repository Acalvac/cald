    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="navbar-form navbar-left pull-left">
                <a href="add"><button class="btn btn-primary btn-addEmpleado" title="Nuevo Empleado">Nuevo Empleado</button></a>
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

    <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript"> 

    var $ = jQuery;
    $(document).ready(function() {

            $(".select2").select2();

            $('#searchText').keypress(function(e){   
               if(e.which == 13){      
                 buscarempleado();      
               }   
              });    
            
        });</script>


