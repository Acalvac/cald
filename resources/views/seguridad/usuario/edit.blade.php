<div class="tab-content" id="contentsecundario">
  <div id="tab-1" class="tab-pane active">
    <div class="panel-body">
      <div class="row" >
        <div class="col-md-12">
          <div class="box box-primary box-gris">
            <div class="box-header with-border my-box-header">
              <h3 class="box-title"><strong>Asignar rol al usuario: {{$usuario->name}}</strong></h3>
            </div><!-- /.box-header -->
       
            <div id="zona_etiquetas_roles" style="background-color:white;" >
              Roles asignados:
              @foreach($usuario->getRoles() as $rl)
                <span class="label label-warning" style="margin-left:10px;">{{ $rl }} </span> 
              @endforeach
            </div>
            
            <div class="box-body">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-2" for="tipo">Rol a asignar*</label>
                  <div class="col-sm-6" >         
                    <select id="rol1" name="rol1" class="form-control">
                      @foreach($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                      @endforeach
                    </select>    
                  </div>

                  <div class="col-sm-4">
                    <button type="button" class="btn btn-xs btn-primary" onclick="asignar_rol({{$usuario->id }});">Asignar rol</button>    
                  </div>
                </div>
              </div>
              <hr>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-2" for="tipo">Rol a quitar*</label>
                  <div class="col-sm-6" >         
                    <select id="rol2" name="rol2" class="form-control">
                      @foreach($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                      @endforeach
                    </select>    
                  </div>
                  <div class="col-sm-4" >         
                    <button type="button" class="btn btn-xs btn-primary" onclick="quitar_rol({{$usuario->id}});" >Quitar rol</button>    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="col-md-12">
          <div class="box box-primary box-gris">
            <div class="box-header with-border my-box-header">
              <h3 class="box-title"><strong>Modificar clave al usuario: {{$usuario->name}}</strong></h3>
            </div><!-- /.box-header -->
            

             <div class="box-body">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="email">E-Mail</label>
                  <div class="col-sm-6">
                      <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" disabled="" required>
                      @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                  </div>
                  <div class="col-sm-4" >         
                        <button type="button" class="btn btn-xs btn-primary" onclick="cambiarclave({{$usuario->id}});" >Modificar contraseña</button>    
                  </div>
                </div>
              </div>
              <hr>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-2 control-label">Contraseña</label>
                    <div class="col-sm-6">
                      <input id="password" type="password" class="form-control" name="password" required>
                      @if ($errors->has('password'))
                        <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="box box-primary box-gris">
            <div class="box-header with-border my-box-header">
              <h3 class="box-title"><strong>Modificar el nombre del usuario: {{$usuario->name}}</strong></h3>
            </div><!-- /.box-header -->
            

             <div class="box-body">
                         <hr>
              <div class="col-md-12">
                <div class="form-group">

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-2 control-label">Nombre usuario</label>
                    <div class="col-sm-6">
                      <input id="name" type="text" class="form-control" name="name" required>
                    </div>
                  </div> 

                  <div class="col-sm-4" >         
                        <button type="button" class="btn btn-xs btn-primary" onclick="cambiarname({{$usuario->id}});" >Modificar nombre</button>    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>