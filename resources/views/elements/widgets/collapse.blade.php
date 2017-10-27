<div class="panel-group" id="accordion">
    <div class="panel panel-{{ $class or 'default' }}">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion"
                   href="#collapse{{ $id or 'id1' }}">
                    {{ $header or 'header' }}
                </a>
            </h4>
        </div>
        <div id="collapse{{ $id or 'id1' }}" class="panel-collapse collapse {{ isset($collapseIn) ? 'in' : ''}}">
            <div class="panel-body">
                {{ $body or 'body' }}
            </div>
        </div>
    </div>
</div>