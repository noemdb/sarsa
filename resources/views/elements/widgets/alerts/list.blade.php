<ul class="list-group">
	@foreach($alerts as $alert)
	    <li class="list-group-item text-overflow" title="{{ $alert->mensaje or 'default' }}">
	        <span class="text-{{ $alert->tipo or 'default' }}">
	            <i class="fa fa-bell fa-fw"></i> {{ $alert->user->username or 'default' }}
	            <span class="pull-right text-muted small"> <em>{{ $alert->created_at->diffForHumans() }}</em></span>
	        </span>
	        <div class="text-{{ $alert->tipo or 'default' }} text-overflow">
	        	{{ (isset($show_alert)) ? $alert->mensaje : '' }}
	        </div>
		</li>
	@endforeach
</ul>
<a href="#">Mas...</a>