<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
    	<h4 class="box-title" align="center">Nuevo Rol</h4> 
        <a href="javascript:void(0);" onclick="cargarindex(12);">
            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Listado Empleado"><i class="fa fa-arrow-circle-left"></i></button>
        </a>
        <hr style="border-color:black;"/>
        <div class="panel-body">
            <div class="row">
		      		 
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	  
				        <div class="form-group">
							<label class="col-sm-2" for="apellido">Nombre del Rol</label>
				            <div class="col-sm-10 " >
								<input type="text" class="form-control" id="rol_nombre" name="rol_nombre" " required >
				            </div>
				        </div><!-- /.form-group -->
				    </div><!-- /.col -->

					<div class="col-md-12">	  
				        <div class="form-group">
							<label class="col-sm-2" for="apellido">Slug</label>
							<div class="col-sm-10" >
								<input type="text" class="form-control" id="rol_slug" name="rol_slug" " required >
				            </div>
				        </div><!-- /.form-group -->
				    </div><!-- /.col -->

					<div class="col-md-12">	  
				            <div class="form-group">
								<label class="col-sm-2" for="apellido">Descripcion</label>
				            	<div class="col-sm-10" >
									<input type="text" class="form-control" id="rol_descripcion" name="rol_descripcion" " required >
				        		</div>
							</div><!-- /.form-group -->
					</div><!-- /.col -->

					<div class="box-footer col-xs-12 box-gris">
				        <button class="btn btn-primary btn-btnGuardarRol" type="button" id="btnGuardarRol">Guardar</button>
				    </div>  
			</div>
		</div>          	
	</div>
</div>


<div class="modal fade" id="erroresModalRol" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="inputErrorRol"></h4>
            </div>
            <div class="modal-body">
                <ul style="list-style-type:circle" id="erroresContentRol"></ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


