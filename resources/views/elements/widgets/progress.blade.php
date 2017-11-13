
<div class="progress">
    <div class="progress-bar progress-bar-{{ $class or 'default' }} {{ isset($striped) ? 'progress-bar-striped' : '' }} {{ isset($animated) ? 'progress-bar-striped active' : '' }}"
         role="progressbar" aria-valuenow="{{ $value or '' }}" aria-valuemin="{{ $valuemin or '0' }}" aria-valuemax="{{ $valuemax or '100' }}"
         style="width: {{ $value or '' }}%;">
		<span class="pull-left">&nbsp{{ $label or '' }}</span>
        {{ $value or '' }}
    </div>
</div>