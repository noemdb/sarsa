{{-- Mensaje flash sobreo operaciones con base de datos --}}
<div class="div-alert-error alert alert-danger hide" id="alert_result_ok_{{$user->id}}" role="alert" align="center"></div>

{{-- INI campo user_id --}}
@empty($profile->id)

  <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">

      @if (isset($user->id))

        {!! Form::hidden('user_id', $user->id) !!}

      @else

        <label for="user_id">Usuario</label>
        
        {!! Form::select('user_id',$user_list,old('user_id'),['class' => 'form-control']); !!}

      @endif

      <div class="div-alert-error alert alert-danger {{ $errors->has('user_id') ? 'show' : 'hide' }}" id="error_msg_user_id_{{$user->id}}" role="alert" align="center">
          
          {{ $errors->first('user_id') }}

      </div>

  </div>
    
@endempty
{{-- FIN campo user_id --}}

{{-- INI campo firstname --}}
<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">

    <label for="firstname">Primer Nombre</label>

    {!! Form::text('firstname', old('firstname'), ['class' => 'form-control','required','autofocus']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('firstname') ? 'show' : 'hide' }}" id="error_msg_firstname_{{$profile->id or ''}}" role="alert" align="center">
        
        {{ $errors->first('firstname') }}

    </div>

</div>
{{-- FIN campo firstname --}}

{{-- INI campo lastname --}}
<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">

    <label for="lastname">Segundo Nombre</label>

    {!! Form::text('lastname', old('lastname'), ['class' => 'form-control','required','autofocus']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('lastname') ? 'show' : 'hide' }}" id="error_msg_lastname_{{$profile->id or ''}}" role="alert" align="center">
       
        {{ $errors->first('lastname') }}

    </div>

</div>
{{-- FIN campo lastname --}}

{{-- INI campo email --}}
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

    <label for="email">Email</label>

    {!! Form::email('email', old('email'), ['class' => 'form-control','required','autofocus']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('email') ? 'show' : 'hide' }}" id="error_msg_email_{{$profile->id or ''}}" role="alert" align="center">
       
        {{ $errors->first('email') }}

    </div>

</div>
{{-- FIN campo email --}}