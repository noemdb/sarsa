<ul class="list-group">
	@foreach($logdbs as $logdb)
	    <li class="list-group-item text-overflow" title="{{ $logdb->pathInfo or 'default' }}">
	        <span class="text-{{ $logdb->tipo or 'default' }}">
	            <b><i class="fa fa-database fa-fw"></i> {{ $logdb->action or 'default' }}</b>
	            <span class="pull-right text-muted small"> <em>{{ $logdb->created_at->diffForHumans() }}</em></span>
	        </span>
	        <div class="text-{{ $logdb->tipo or 'default' }} text-overflow">
	        	{{ (isset($show_task)) ? $logdb->pathInfo : '' }}
	        </div>
	    </li>
	@endforeach
</ul>
<a href="#">Mas...</a>