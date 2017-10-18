
   

<div class="tabs-container">
    <!--<ul class="nav nav-tabs">
        <li class="active" data-toggle="tab" aria-expanded="false">
            <a data-toggle="tab" aria-expanded="false">
                <span class="visible-xs"><i class="md md-perm-contact-cal"></i></span>
                <span class="hidden-xs">Listado de usuarios</span>
            </a>
        </li>
    </ul> -->
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
				<div class="tab-pan active" id="contentsecundario">
				    @if(isset($usuarios))

				        <div class="row">
				        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                @include('seguridad.usuario.search')

				        	</div>
				            <div><br></div>
				   
				        </div>

				        @if(count($usuarios) > 0)
				        
				            <div class="ibox-content">
                    			<div class="table-responsive">
                        			<table class="table table-striped table-bordered table-condensed table-hover">
				                        <thead>
				                            <th  style="width: 5%">Id</th>
				                            <th  style="width: 20%">Nombre</th>
				                            <th  style="width: 20%">Email</th>
				                            <th >Roles</th>
				                            <th  style="width: 5%">Opciones</th>
				                        </thead>
		                                @foreach ($usuarios as $usu)
		                                <tr>
		                                    <td>{{$usu->id}}</td>
		                                    <td class="mailbox-messages mailbox-name">{{ $usu->name  }}</td>
		                                    <td style="width: 20%s">{{$usu->email}}</td>
		                                    <td><span class="label label-success">
		                                        @foreach($usu->getRoles() as $roles)
		                                            {{  $roles.","  }}
		                                        @endforeach
		                                    </span></td>
	                                        <td style="width: 20%">
	                                        	<button class="btn  btn-warning btn-md btneditb" title="Editar" value="{{$usu->id}}" onclick="verinfo_usuario({{$usu->id}})" > <i class="fa fa-pencil"></i></button>
	                                        	<button class="btn btn-danger btn-md btneliminarb" id="FWEF" value="{{$usu->id}}" title="Eliminar" ><i class="fa fa-remove"></i></button>
	                                        </td>                     
	                                    </tr>
	                                    @include('seguridad.usuario.modal')
		                                @endforeach
				                    </table>
				                {{$usuarios->render()}}
				                </div>
				            </div>           
				        @else
				            <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div> 
				        @endif
				    @endif
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
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

