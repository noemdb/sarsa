{{-- <ul class="list-group"> --}}
    @php ($n=1)
    @foreach($messeges_unread as $messege)
            <a href="#" class="list-group-item">
                <span class="text-{{ $messege->tipo or 'default' }}">
                    {{-- <span>{{ $n++ }}</span> --}}
                    <i class="fa fa-comment fa-fw"></i> {{ $messege->user->username or 'default' }}
                    <span class="pull-right text-muted small"><em>{{ $messege->created_at->diffForHumans() }}</em></span>
                    
                </span>
                {{-- <p>
                    {{$messege->mensaje}}
                </p> --}}
            </a>
    @endforeach