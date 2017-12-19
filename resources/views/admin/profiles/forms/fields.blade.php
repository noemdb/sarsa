{{-- INI campo firstname --}}
<div class="form-group div-form-input {{ $errors->has('firstname') ? ' has-error' : '' }}" id="div_input_firstname_{{ $profile->id or 'create' }}">

    <label for="firstname">Primer Nombre</label>

    {!! Form::text('firstname', old('firstname'), ['class' => 'form-control','required','autofocus']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('firstname') ? 'show' : 'hide' }}" id="error_msg_firstname_{{$profile->id or 'create'}}" role="alert" align="center">
        
        {{ $errors->first('firstname') }}

    </div>

</div>
{{-- FIN campo firstname --}}

{{-- INI campo lastname --}}
<div class="form-group div-form-input {{ $errors->has('lastname') ? ' has-error' : '' }}" id="div_input_lastname_{{ $profile->id or 'create' }}">

    <label for="lastname">Segundo Nombre</label>

    {!! Form::text('lastname', old('lastname'), ['class' => 'form-control','required','autofocus']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('lastname') ? 'show' : 'hide' }}" id="error_msg_lastname_{{$profile->id or 'create'}}" role="alert" align="center">
       
        {{ $errors->first('lastname') }}

    </div>

</div>
{{-- FIN campo lastname --}}

{{-- INI campo email --}}
<div class="form-group div-form-input {{ $errors->has('email') ? ' has-error' : '' }}" id="div_input_email_{{ $profile->id or 'create' }}">

    <label for="email">Email</label>

    {!! Form::email('email', old('email'), ['class' => 'form-control','required','autofocus']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('email') ? 'show' : 'hide' }}" id="error_msg_email_{{$profile->id or 'create'}}" role="alert" align="center">
       
        {{ $errors->first('email') }}

    </div>

</div>
{{-- FIN campo email --}}