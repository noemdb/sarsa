<div class="panel panel-{{ $class or 'default' }}">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="{{ $class_icon or 'default' }}"></i>
            </div>
            <div class="col-xs-9 text-right" style="padding-left: 0px;">
                <div class="huge">{{ $total or '' }}</div>
                <div>{{ $text or 'default' }}</div>
            </div>
        </div>
    </div>
        
        <div class="panel-footer">
            <a href="#{{ $idcollapse or 'idcollapse' }}" data-toggle="collapse">
                {{ $headercollapse or 'headercollapse' }}

                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </a>        

            <div id="{{ $idcollapse or 'idcollapse' }}" class="collapse">
            {{ $bodycollapse or 'bodycollapse' }}
            </div>

        </div>
</div>
