@extends('layouts.app')

@section('content')

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Bienvenido al sistema Hermano Pedro</h2>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">

                    <form class="m-t" method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="Correo" value="{{ old('email') }}" required autofocus name="email">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <i class="md md-markunread form-control-feedback l-h-34"></i>

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" required="">
                                                        @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        <i class="md md-vpn-key form-control-feedback l-h-34"></i>

                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>

                        <a href="#">
                            <small>¿Olvidaste tu contraseña?</small>
                        </a>
                        <!--
                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                        -->
                    </form>

<!--


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                        <a class="btn btn-link" href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                    </form>-->
                    <!--
                    <p class="m-t">
                        <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                    </p>
                    -->
                </div>
            </div>
        </div>
        <hr/>
        <!--
        <div class="row">
            <div class="col-md-6">
                Copyright Example Company
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-2015</small>
            </div>
        </div>
        -->
    </div>


@endsection
