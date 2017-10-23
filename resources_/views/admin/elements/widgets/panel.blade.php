<div class="panel panel-{{ $class or 'default' }}" id="panel-{{ $id or '1' }}">
    @if (isset($panelTitle))
        <div class="panel-heading">
            <h3 class="panel-title">
                {{ $panelTitle }}
                @if (isset($panelControls))
                    <div class="panel-control pull-right">
                        {{-- <a class="panelButton"><i class="fa fa-refresh"></i></a> --}}
                        {{-- <a class="panelButton"><i class="fa fa-minus"></i></a> --}}
                        <a data-toggle="collapse" href="#collapse-{{ $id or '1' }}"><i class="fa fa-minus"></i></a>
                        <a class="panelButton" id="close" data-id="panel-{{ $id or '1' }}"><i class="fa fa-remove"></i></a>
                    </div>
                @endif
            </h3>
        </div>
    @endif

    <div id="collapse-{{ $id or '1' }}" class="panel-collapse collapse in">
        @if (isset($panelBody))
            <div class="panel-body">
                {{ $panelBody }}
            </div>
        @endif

        @if (isset($panelFooter))
            <div class="panel-footer">
                {{ $panelFooter }}
            </div>
        @endif
    </div>
</div>

@section('scripts')
    @parent
    <script type="text/javascript">
        $(function(){
        $('#close').on('click',function(){
                var idpanel = $(this).data('id'); //alert(dismiss);
                $('#'+idpanel).fadeOut();
            })
        })
    </script>

@endsection

