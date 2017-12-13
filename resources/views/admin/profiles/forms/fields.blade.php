@if(empty($profile->id))
    @php ($profile_id='create')
    {!! Form::hidden('user_id', $user->id) !!}
@else
    @php ($profile_id=$profile->id)

@endif

<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">

    <label for="firstname">Primer Nombre</label>

    {!! Form::text('firstname', old('firstname'), ['class' => 'form-control','required','autofocus']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('firstname') ? 'show' : 'hide' }}" id="error_msg_firstname_{{$profile_id}}" role="alert" align="center">
        
        {{ $errors->first('firstname') }}

    </div>

</div>

<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">

    <label for="lastname">Segundo Nombre</label>

    {!! Form::text('lastname', old('lastname'), ['class' => 'form-control','required','autofocus']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('lastname') ? 'show' : 'hide' }}" id="error_msg_lastname_{{$profile_id}}" role="alert" align="center">
       
        {{ $errors->first('lastname') }}

    </div>

</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

    <label for="email">Email</label>

    {!! Form::email('email', old('email'), ['class' => 'form-control','required','autofocus']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('email') ? 'show' : 'hide' }}" id="error_msg_email_{{$profile_id}}" role="alert" align="center">
       
        {{ $errors->first('email') }}

    </div>

</div>


{{-- 
<div class="form-group">

    <label for="is_active">{{ trans('validation.attributes.is_active') }}</label>

    {!! Form::select('is_active',[ 'Desactivo' => 'Desactivo','Activo' => 'Activo'],null,['class' => 'form-control']); !!}

</div> 
--}}
