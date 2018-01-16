{{-- ulpanel: panel de pestañas para manejar opciones en el chart (usuarios, roles, rangos de fechas, etc) --}}
{{ $ulpanel or '' }}
<div id="div{{ $id or 'default' }}" class="{{ $class or '' }}">
	<canvas id="{{ $id or 'default' }}" width="{{ $width or '350' }}" height="{{ $height or '220' }}"></canvas>
</div>
