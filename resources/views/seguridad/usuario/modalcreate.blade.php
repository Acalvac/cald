<form role="form" id="formAgregarUsuario">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required />
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                        

                            <label class="col-md-4 control-label">Empleado</label>
                            <div class="col-md-6">
                                <select name="idpersona" id="idpersona" class="form-control select2" data-live-search="true">
                                @if (isset($persona))
                                @foreach($persona as $per)
                                    <option value="{{$per->idpersona}}">{{$per->nombre.' '.$per->apellido}}</option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label class="col-sm-4" for="tipo">Rol a asignar*</label>
                                <div class="col-sm-6" >         
                                    <select id="idrol" name="idrol" class="form-control">
                                        @if (isset($role))
                                        @foreach($role as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>    
                                </div>

                                <div class="navbar-form navbar-right pull-rigth">
                                    <button type="button" id="bt_addrol" class="btn btn-xs btn-info">Asignar rol</button>
                                </div>
                            </div>
                        </div>
                        <div><br><br><br><br><br><br><br><br><br></div>
                        <div class="form-group">
                        <br>
                            <div class="col-sm-10">
                                <table id="rolUsuario" class="table table-bordered">

                                    <thead>
                                        <tr>
                                            <th style="width: 5%">Opciones</th>
                                            <th>Rol</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th></th>
                                        <th></th>
                                    </tfoot>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                    <script type="text/javascript">
                        var cont = 0;

function agregar(){

        idrol =$("#idrol option:selected").val(); 
        rol =$("#idrol option:selected").text();

        var item  = '<tr class="even gradeA" id="rol'+cont+'">';
            item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>';
            item += '<td><input type="hidden" name="idrol[]" value="'+idrol+'">'+rol+'</td>';

        $('#rolUsuario').append(item);
    }

    $(document).ready(function() {
        $('#bt_addrol').click(function() {
            agregar();
        });
    });

    function eliminar(index){
       $("#rol" + index).remove();
       cont--;
   }
                    </script>