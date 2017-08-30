{!! Form::open(['url'=>'bienhechor/index','method'=>'GET','role'=>'search','class'=>'navbar-form navbar-left pull-right','onkeypress'=>'return anular(event)']) !!}
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Listado de Bienhechores</h2>
        <div class="navbar-form navbar-left pull-right">

            <div class="navbar-form navbar-left pull-left">

            <!--div class="form-group">
            	<select id="select" data-style="btn-info" data-live-search="true">
            		<option>Permanentes</option>
            		<option>Ocasionales</option>
            	</select>

            	<input type="text" class="form-control" id="searchText" name="searchText" placeholder="Buscar..."> 
            </div-->


            <input type="text" class="form-control" id="searchText" name="searchText" value="{{$searchText}}" placeholder="Buscar...">
            <button type="submit" class="btn btn-info btn-flat" >Buscar</button>
            </div>
        </div>
    </div>
</div>
{{Form::close()}}

        <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>

		<script type="text/javascript"> $(document).ready(function() {

            $(".select2").select2();

            $('#searchText').keypress(function(e){   
               if(e.which == 13){      
                 buscarempleado();      
               }   
              });    
            
        });</script>