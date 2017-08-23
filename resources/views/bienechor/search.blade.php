<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Listado de Bienhechores</h2>
        <div class="navbar-form navbar-left pull-right">

            <div class="navbar-form navbar-left pull-left">

            <div class="form-group">
            	<select id="select" data-style="btn-info" data-live-search="true">
            		<option>Permanentes</option>
            		<option>Ocasionales</option>
            	</select>

            	<input type="text" class="form-control" id="searchText" name="searchText" placeholder="Buscar..."> 
            </div>



            <button type="button" class="btn btn-primary btn-rounded" onclick="buscarempleado();">Buscar</button>
            </div>

            <!--
            <div class="navbar-form navbar-left pull-right">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-3 col-md-12 col-sm-1 col-xs-12">
                        <p>Detalles</p>
                        <button class="btn btn-primary" title="Detalles"><i class="glyphicon glyphicon-zoom-in"></i></button>
                    </div>
                    
                    <div class="col-lg-3 col-md-12 col-sm-4 col-xs-12">

                        <p>Historial</P>
                        <button class="btn btn-primary" title="Historial laboral"><i class="fa fa-stack-overflow"></i></button>
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-1 col-xs-12">
                        <p>Vacaciones</p>
                        <button class="btn btn-primary" title="Vacaciones"><i class="fa fa-camera-retro fa-lg"></i></button>
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-1 col-xs-12">
                        <p>Despedir</p>
                        <button class="btn btn-danger" id="FWEF" value="" title="Despedir" ><i class="fa fa-remove"></i></button>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
</div>

    
        <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>

		<script type="text/javascript"> $(document).ready(function() {

            $(".select2").select2();

            $('#searchText').keypress(function(e){   
               if(e.which == 13){      
                 buscarempleado();      
               }   
              });    
            
        });</script>