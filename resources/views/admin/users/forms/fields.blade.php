<div class="form-group div-form-input {{ $errors->has('username') ? 'has-error' : '' }}" id="div_input_username_{{ $user_id or 'create' }}">

    <label for="username">Username</label>

    {!! Form::text('username', old('username'), ['class' => 'form-control','required','autofocus']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('username') ? 'show' : 'hide' }}" id="error_msg_username_{{$user->id or 'create' }}" role="alert" align="center">
        
        {{ $errors->first('username') }}

    </div>

</div>

<div class="form-group div-form-input {{ $errors->has('password') ? 'has-error' : '' }}" id="div_input_password_{{ $user->id or 'create' }}">

    <label for="password">{{ trans('validation.attributes.password') }}</label>

    {!! Form::password('password', ['class' => 'form-control']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('password') ? 'show' : 'hide' }}" id="error_msg_password_{{$user->id or 'create' }}" role="alert" align="center">
       
        {{ $errors->first('password') }}

    </div>

</div>

<div class="form-group div-form-input {{ $errors->has('is_active') ? 'has-error' : '' }}" id="div_input_is_active_{{ $user->id or 'create'  }}">

    <label for="is_active">{{ trans('validation.attributes.is_active') }}</label>

    {!! Form::select('is_active',[ 'Desactivo' => 'Desactivo','Activo' => 'Activo'],null,['class' => 'form-control']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('is_active') ? 'show' : 'hide' }}" id="error_msg_is_active_{{$user->id or 'create' }}" role="alert" align="center">
       
        {{ $errors->first('password') }}

    </div>

</div>
