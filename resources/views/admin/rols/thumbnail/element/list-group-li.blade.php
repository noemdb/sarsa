<li class="list-group-item">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">{{$title or ''}}:</div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <span class="{{$class_color or ''}} {{ (isset($text_strong))? 'text-weight': '' }}">
                <span class="{{ $class_text  or ''}}">
                    {{$text or ''}}
                </span>
            </span>
        </div>
    </div>
</li>