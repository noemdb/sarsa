<ul class="list-group">
	@foreach($messeges as $messege)
	    <li class="list-group-item text-overflow" title="{{ $messege->mensaje or 'default' }}">
	        <span class="text-{{ $messege->tipo or 'default' }}">
	            <b><i class="fa fa-comment fa-fw"></i> {{ $messege->user->username or 'default' }}</b>
	            <span class="pull-right text-muted small"> <em>{{ $messege->created_at->diffForHumans() }}</em></span>
	        </span>
	        <div class="text-{{ $messege->tipo or 'default' }} text-overflow" >
	        	{{ (isset($show_messeges)) ? $messege->mensaje : '' }}
	        </div>
	    </li>
	@endforeach
</ul>
<a href="#">Mas...</a>
