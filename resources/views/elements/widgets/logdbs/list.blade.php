<ul class="list-group">
	@foreach($logdbs as $logdb)
	    <li class="list-group-item text-overflow" title="pathInfo: {{ $logdb->pathInfo or 'default' }}">
	        <span class="text-{{ $logdb->tipo or 'default' }}">
	        	<b><i class="fa fa-database fa-fw"></i> {{ $logdb->user->username or 'default' }}</b><br>
	            {{ $logdb->action or 'default' }}
	            <span class="pull-right text-muted small"> <em>{{ $logdb->created_at->diffForHumans() }}</em></span>
	        </span>
	        <div class="text-{{ $logdb->tipo or 'default' }} text-overflow">
	        	pathInfo: {{ (isset($show_logdb)) ? $logdb->pathInfo : '' }}
	        </div>
	    </li>
	@endforeach
</ul>
<a href="#">Mas...</a>