@extends ('admin.layouts.app')
@section ('body')
    <div class="container">
        <div class="row" style="margin-top: 25px;">
            <div class="col-md-4 col-md-offset-4 centered">
                @component('admin.widgets.panel')
                    @slot ('panelTitle', 'Please Sign In')
                    @slot ('panelBody')
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <label for="email" class="control-label">E-Mail Address</label>
                                {{-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> --}}

                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">@</span>
                                  <input type="text" class="form-control" id="email" name="email" placeholder="email" aria-describedby="basic-addon1" value="{{ old('email') }}" required>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-md-12">
                                <label for="password" class="control-label">Password</label>
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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-success btn-block">
                                        Login
                                    </button>
                                    <br>
                                    <a class="btn-link" href="#">
                                        Forgot Your Password?
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
