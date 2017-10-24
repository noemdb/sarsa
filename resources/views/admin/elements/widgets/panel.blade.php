{{-- variables de entrada class,id,panelTitle,badge,panelBody,panelFooter --}}
<div class="panel panel-{{ $class or 'default' }}" id="panel-{{ $id or '' }}">
    @if (isset($panelTitle))
        <div class="panel-heading">
            <h3 class="panel-title">
                {{ $panelTitle }}
                <div class="panel-control pull-right">
                    <span class="label label-info">{{ $badge or '' }}</span>&nbsp;
                    @if (isset($panelControls))
                        {{-- <a class="panelButton"><i class="fa fa-refresh"></i></a> --}}
                        <a id="minimizer-{{ $id or '1' }}" data-id="collapse-{{ $id or '1' }}" class="panelButton-info"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a id="close-{{ $id or '1' }}" data-id="panel-{{ $id or '1' }}" class="panelButton-danger" ><i class="fa fa-remove"></i></a>
                    @endif
                </div>
            </h3>
        </div>
    @endif

    <div id="collapse-{{ $id or '' }}" class="panel-collapse collapse in">
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
        $('#close-{{ $id or '1' }}').on('click',function(){
                var idpanel = $(this).data('id'); //alert(dismiss);
                $('#'+idpanel).fadeOut();
            })
        })
        $(function(){
        $('#minimizer-{{ $id or '1' }}').on('click',function(){
                var collapse = $(this).data('id'); //alert(collapse);
                $('#'+collapse).collapse('toggle');
                $(this).children('i').toggleClass('glyphicon glyphicon-chevron-up glyphicon glyphicon-chevron-down')
            })
        })
    </script>
@endsection

