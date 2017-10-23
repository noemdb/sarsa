<div class="panel panel-{{ $class or 'default' }}">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="{{ $class_icon or 'default' }}"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge">{{ $total or '' }}</div>
                <div>{{ $text or 'default' }}</div>
            </div>
        </div>
    </div>
    <a href="#">
        <div class="panel-footer">
            <span class="pull-left">{{ $text_footer or 'Mas detalles' }}</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
</div>

