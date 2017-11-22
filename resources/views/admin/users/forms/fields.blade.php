@if(empty($user->id))
    @php ($user_id='create')
@else
    @php ($user_id=$user->id)
@endif

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

    <label for="username">Username</label>
    {!! Form::text('username', old('username'), ['class' => 'form-control','required','autofocus']); !!}
    {{-- {!! Form::text('username', '', ['class' => 'form-control','required','autofocus']); !!} --}}

    <div class="alert alert-danger" id="error_msg_username_{{$user_id}}" role="alert" align="center" style="display: none;">
        <small><strong id="msg_username_{{$user_id}}"></strong></small>
    </div>

    @if ($errors->has('username'))
        <div class="alert alert-danger" role="alert" align="center">
            <small><strong>{{ $errors->first('username') }}</strong></small>
        </div>
    @endif

</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

    <label for="password">{{ trans('validation.attributes.password') }}</label>
    {!! Form::password('password', ['class' => 'form-control']); !!}

    <div class="alert alert-danger" id="error_msg_password_{{$user_id}}" role="alert" align="center" style="display: none;">
        <small><strong id="msg_password_{{$user_id}}"></strong></small>
    </div>

    @if ($errors->has('password'))
        <div class="alert alert-danger" role="alert" align="center">
            <small><strong>{{ $errors->first('password') }}</strong></small>
        </div>
    @endif

</div>

<div class="form-group">
    <label for="is_active">{{ trans('validation.attributes.is_active') }}</label>
    {!! Form::select('is_active',[ 'Desactivo' => 'Desactivo','Activo' => 'Activo'],null,['class' => 'form-control']); !!}
</div>
