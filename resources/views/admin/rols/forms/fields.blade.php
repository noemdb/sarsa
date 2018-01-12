{{-- INI campo rol --}}
<div class="form-group div-form-input {{ $errors->has('rol') ? ' has-error' : '' }}" id="div_input_rol_{{ $rol->id or 'create' }}">

    <label for="rol">Rol</label>

    {!! Form::select('rol',$opt_list_rol,old('rol'),['class' => 'form-control']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('rol') ? 'show' : 'hide' }}" id="error_msg_rol_{{$Rol->id or 'create'}}" role="alert" align="center">
        
        {{ $errors->first('rol') }}

    </div>

</div>
{{-- FIN campo rol --}}

{{-- INI campo rango --}}
<div class="form-group div-form-input {{ $errors->has('rol') ? ' has-error' : '' }}" id="div_input_rango_{{ $rol->id or 'create' }}">

    <label for="rango">Rango</label>

    {!! Form::select('rango',$opt_list_rango,old('rango'),['class' => 'form-control']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('rol') ? 'show' : 'hide' }}" id="error_msg_rango_{{$rol->id or 'create'}}" role="alert" align="center">
        
        {{ $errors->first('rango') }}

    </div>

</div>
{{-- FIN campo rango --}}


{{-- INI campo descripcion --}}
<div class="form-group div-form-input {{ $errors->has('descripcion') ? ' has-error' : '' }}" id="div_input_descripcion_{{ $rol->id or 'create' }}">

    <label for="descripcion">Descripción</label>

    {!! Form::textarea('descripcion', old('descripcion'), ['class' => 'form-control','required', 'size' => '40x2']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('descripcion') ? 'show' : 'hide' }}" id="error_msg_descripcion_{{$rol->id or 'create'}}" role="alert" align="center">
       
        {{ $errors->first('descripcion') }}

    </div>

</div>
{{-- FIN campo descripcion --}}

{{-- INI campo finicial --}}
<div class="form-group div-form-input {{ $errors->has('finicial') ? ' has-error' : '' }}" id="div_input_finicial_{{ $rol->id or 'create' }}">

    <label for="finicial">Fecha Inicial</label>

    <div class="input-group date">
        {!! Form::text('finicial', old('finicial'), ['class' => 'form-control date','required']); !!}
        <div class="input-group-addon">
            <span class="fa fa-calendar"></span>
        </div>
    </div>

    <div class="div-alert-error alert alert-danger {{ $errors->has('finicial') ? 'show' : 'hide' }}" id="error_msg_finicial_{{$rol->id or 'create'}}" role="alert" align="center">
       
        {{ $errors->first('finicial') }}

    </div>

</div>
{{-- FIN campo finicial --}}

{{-- INI campo ffinal --}}
<div class="form-group div-form-input {{ $errors->has('ffinal') ? ' has-error' : '' }}" id="div_input_ffinal_{{ $rol->id or 'create' }}">

    <label for="ffinal">Fecha Final</label>

    <div class="input-group date">
        {!! Form::text('ffinal', old('ffinal'), ['class' => 'form-control','required']); !!}
        <div class="input-group-addon">
            <span class="fa fa-calendar"></span>
        </div>
    </div>

    <div class="div-alert-error alert alert-danger {{ $errors->has('ffinal') ? 'show' : 'hide' }}" id="error_msg_ffinal_{{$rol->id or 'create'}}" role="alert" align="center">
       
        {{ $errors->first('ffinal') }}

    </div>

</div>
{{-- FIN campo ffinal --}}

@section('stylesheet')

    @parent

    <script src="{{ asset("vendor/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css") }}"></script>

@endsection

@section('scripts')

    @parent

    <script src="{{ asset("vendor/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js") }}"></script>
    <script src="{{ asset("vendor/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js") }}"></script>

    <script type="text/javascript">

        $('.date').datepicker({  

           format: 'yyyy-mm-dd',
           autoclose: true,
           language: 'es'

         });  

    </script>  

@endsection