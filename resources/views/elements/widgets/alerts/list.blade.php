<ul class="dropdown-menu dropdown-alerts">
	@foreach($alerts as $alert)
	    <li>
		    <a href="#" class="list-group-item" title="{{ $alert->user->username or 'default' }}">
		        <span class="text-{{ $alert->tipo or 'default' }}">
		            <i class="fa fa-warning fa-fw"></i> {{ $alert->mensaje or 'default' }}
		            <span class="pull-right text-muted small"> <em>{{ $alert->created_at->diffForHumans() }}</em></span>
		        </span>
		        <div class="text-{{ $alert->tipo or 'default' }} text-overflow">
		        	{{ (isset($show_alert)) ? $alert->mensaje : '' }}
		        </div>
		    </a>
		</li>
	@endforeach
</ul>