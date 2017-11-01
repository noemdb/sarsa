{{-- ulpanel: panel de pestañas para manejar opciones en el chart (usuarios, roles, rangos de fechas, etc) --}}
{{ $ulpanel or '' }}
<div id="div{{ $id or 'default' }}">
	<canvas id="{{ $id or 'default' }}" width="{{ $width or '350' }}" height="{{ $height or '220' }}"></canvas>
</div>
{{-- 
ejemplo de ulpanel: diferentes rangos (Ultimos 7 días, 30 día, etc)
<ul class="nav nav-tabs ranges" data-canvas="clinesqldashboard" data-api="uservrstask">
    <li class="active"><a href="#">7 Días</a></li>
    <li><a href="#" data-range='30'>30 Días</a></li>
    <li><a href="#" data-range='60'>60 Días</a></li>
    <li><a href="#" data-range='90'>90 Días</a></li>
    <li><a href="#" data-range='360'>360 Días</a></li>
</ul>
--}}