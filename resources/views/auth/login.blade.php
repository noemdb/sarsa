@extends ('admin.layouts.app')
@section ('body')
    <div class="container">
        <div class="row" style="margin-top: 25px;">
            <div class="col-md-4 col-md-offset-4 centered">
                @component('elements.widgets.panel')
                    @slot ('panelTitle', 'Ingresar sus datos de acceso')
                    @slot ('class','info')
                    @slot ('panelBody')
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="col-md-12">

                                    <label for="username" class="control-label">Nombre de Usuario</label>

                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">@</span>
                                      <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de Usuario" aria-describedby="basic-addon1" value="{{ old('username') }}" required>
                                    </div>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                    
                                </div>

                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                                <div class="col-md-12">
                                    <label for="password" class="control-label">Contraseña</label>
                                    {{-- <input id="password" type="password" class="form-control" name="password" required> --}}

                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                      </span>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="password" aria-describedby="basic-addon1" required>
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <div class="checkbox" align="right">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                        </label>
                                    </div>
                                    @component('elements.widgets.button')
                                        @slot('type','submit')
                                        @slot('value','Ingresar')
                                        @slot('class','info btn-block')
                                    @endcomponent
                                    
                                    <br>
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        Olvidaste tu Contraseña?
                                    </a>
                                </div>
                            </div>
                        </form>
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
