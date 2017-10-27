@foreach($messeges as $messege)
    <a href="#" class="list-group-item" title="{{ $messege->user->username or 'default' }}">
        <span class="text-{{ $messege->tipo or 'default' }}">
            <i class="fa fa-comment fa-fw"></i> {{ $messege->user->username or 'default' }}
            <span class="pull-right text-muted small"> <em>{{ $messege->created_at->diffForHumans() }}</em></span>
            {{-- {{ (isset($show_messeges)) ? $messege->mensaje : '' }} --}}
        </span>
    </a>
@endforeach