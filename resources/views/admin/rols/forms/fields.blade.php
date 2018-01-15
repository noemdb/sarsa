{{-- INI campo rol --}}
<div class="form-group div-form-input {{ $errors->has('rol') ? ' has-error' : '' }}" id="div_input_rol_{{ $rol->id or 'create' }}">

    <label for="rol">Rol</label>

    {!! Form::select('rol',$rol_list,old('rol'),['class' => 'form-control']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('rol') ? 'show' : 'hide' }}" id="error_msg_rol_{{$rol->id or 'create'}}" role="alert" align="center">
        
        {{ $errors->first('rol') }}

    </div>

</div>
{{-- FIN campo rol --}}

{{-- INI campo rango --}}
<div class="form-group div-form-input {{ $errors->has('rango') ? ' has-error' : '' }}" id="div_input_rango_{{ $rol->id or 'create' }}">

    <label for="rango">Rango</label>

    {!! Form::select('rango',$rango_list,old('rango'),['class' => 'form-control']); !!}

    <div class="div-alert-error alert alert-danger {{ $errors->has('rango') ? 'show' : 'hide' }}" id="error_msg_rango_{{$rol->id or 'create'}}" role="alert" align="center">
        
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

{{-- INI campo rango --}}
<div class="form-group div-form-input {{ $errors->has('finicial') ? ' has-error' : '' }} {{ $errors->has('ffinal') ? ' has-error' : '' }}">

    <label for="rage">Rango de Fechas</label>
    <div class="input-group input-daterange-{{ $rol->id or 'create' }}">

        <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
        {!! Form::text('finicial', old('finicial'), ['class' => 'form-control','placeholder'=>'Fecha Inicial','required','id'=>'div_input_finicial_'.(isset($rol->id)?$rol->id : 'create')]); !!}

        {{-- <div class="input-group-addon">Hasta</div> --}}

        <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
        {!! Form::text('ffinal', old('ffinal'), ['class' => 'form-control','placeholder'=>'Fecha Final','required', 'id'=>'div_input_ffinal_'.(isset($rol->id)?$rol->id : 'create')]); !!}

    </div>

    <div class="div-alert-error alert alert-danger {{ $errors->has('finicial') ? 'show' : 'hide' }}" id="error_msg_finicial_{{$rol->id or 'create'}}" role="alert" align="center">
   
        {{ $errors->first('finicial') }}

    </div>

    <div class="div-alert-error alert alert-danger {{ $errors->has('ffinal') ? 'show' : 'hide' }}" id="error_msg_ffinal_{{$rol->id or 'create'}}" role="alert" align="center">
   
        {{ $errors->first('ffinal') }}

    </div>

</div>
{{-- FIN campo rango --}}

@section('stylesheet')
    @parent
    <link href="{{ asset('vendor/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset("vendor/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js") }}"></script>
    <script src="{{ asset("vendor/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js") }}"></script>

    <script type="text/javascript">

        // $('.date').datepicker({  
        //    format: 'yyyy-mm-dd',
        //    autoclose: true,
        //    language: 'es'
        //  });

        $('.input-daterange-{{ $rol->id or 'create' }} input').each(function() {
            $(this).datepicker({
                format: 'yyyy-mm-dd',
                clearDates: true,
                language: 'es',
                autoclose:true
            });
        }); 

    </script>  
@endsection