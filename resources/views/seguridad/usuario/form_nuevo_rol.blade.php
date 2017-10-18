<section>
	<div class="col-md-12 box-header with-border my-box-header">
		<div><br><br></div>
		<div class="box-header with-border my-box-header">
	        <h3 class="box-title"><strong>Nuevo Rol</strong></h3>
	    </div><!-- /.box-header -->
	        
	    <hr style="border-color:black;" />

	    <div class="box-body">
	      	<form action="{{ url('seguridad/crear_rol') }}"  method="post" id="f_crear_rol" class="formentrada"  >
	      		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
		        <div class="col-md-12">	  
			        <div class="form-group">
						<label class="col-sm-2" for="apellido">Nombre del Rol*</label>
			            <div class="col-sm-10" >
							<input type="text" class="form-control" id="rol_nombre" name="rol_nombre" " required >
			            </div>
			        </div><!-- /.form-group -->
			    </div><!-- /.col -->

				<div class="col-md-12">	  
			        <div class="form-group">
						<label class="col-sm-2" for="apellido">Slug*</label>
						<div class="col-sm-10" >
							<input type="text" class="form-control" id="rol_slug" name="rol_slug" " required >
			            </div>
			        </div><!-- /.form-group -->
			    </div><!-- /.col -->

				<div class="col-md-12">	  
			            <div class="form-group">
							<label class="col-sm-2" for="apellido">Descripcion*</label>
			            	<div class="col-sm-10" >
								<input type="text" class="form-control" id="rol_descripcion" name="rol_descripcion" " required >
			        		</div>
						</div><!-- /.form-group -->
				</div><!-- /.col -->

				<div class="box-footer col-xs-12 box-gris ">
			        <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>
			</form>            
		</div>
	</div>
</section>





