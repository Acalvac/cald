<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="tab-pan active" id="contentsecundario">
                    @if(isset($roles))
                    @if(count($roles) > 0)

                    <h4 class="box-title" align="center">Listado Rol</h4>
                    <hr style="border-color:black;"/>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="navbar-form navbar-left pull-left">
                                <div><br></div>
                                <div class="margin" id="botones_control">
                                 <button class="btn btn-primary" title="Nuevo Rol" onclick="cargar_formulario(2);">Nuevo Rol</button>
                                </div>
                                <div><br></div>
                            </div>
                        </div>
                        
                    <div class="ibox-content" style="border-color:black;">
                        <div class="table-responsive" >
					    	<table  class="table table-hover table-striped" cellspacing="0" width="100%">
					    		<thead>
					    			<tr>
					    				<th>codigo</th>
										<th>nombre</th>
										<th>slug</th>
										<th>descripcion</th>
										<th>Acción</th>
									</tr>
								</thead>
						    	<tbody>

							    @foreach($roles as $rol)
								<tr role="row" class="odd" id="filaR_{{  $rol->id }}">
									<td>{{ $rol->id }}</td>
									<td><span class="label label-default">{{ $rol->name or "Ninguno" }}</span></td>
									<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);" style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $rol->slug  }}</a></td>
									<td>{{ $rol->description }}</td>
									<td>
									<button type="button"  class="btn  btn-danger btn-xs" onclick="borrar_rol({{ $rol->id }});"   ><i class="fa fa-fw fa-remove"></i></button>
									</td>
								</tr>
							    @endforeach
								</tbody>
							</table>
						</div>
                    </div>
                    @else
                    <br><div class="rechazado"><label style='color:#FA206A'>..No se ha encontrado ningun proveedor</label></div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

