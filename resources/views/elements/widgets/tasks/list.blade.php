@foreach($tasks as $task)
    <a href="#" class="list-group-item" title="{{ $task->user->username or 'default' }}">
        <span class="text-{{ $task->tipo or 'default' }}">
            <i class="fa fa-tasks fa-fw"></i> {{ $task->codigo or 'default' }}
            <span class="pull-right text-muted small"> <em>{{ $task->created_at->diffForHumans() }}</em></span>
            
        </span>
    </a>
@endforeach