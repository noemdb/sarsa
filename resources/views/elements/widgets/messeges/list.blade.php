@foreach($messeges as $messege)
    <a href="#" class="list-group-item" title="{{ $messege->user->username or 'default' }}">
        <span class="text-{{ $messege->tipo or 'default' }}">
            <b><i class="fa fa-comment fa-fw"></i> {{ $messege->user->username or 'default' }}</b>
            <span class="pull-right text-muted small"> <em>{{ $messege->created_at->diffForHumans() }}</em></span>
        </span>
        <div class="text-{{ $messege->tipo or 'default' }} text-overflow" >
        	{{ (isset($show_messeges)) ? $messege->mensaje : '' }}
        </div>
    </a>
@endforeach