@extends('admin.layouts.dashboard.app')

@section ('page_heading', 'Collapse')

@section('section')

@include('admin.elements.widgets.collapse', array('id'=>'1', 'class'=>'primary', 'header'=> 'This is a header', 'body'=>'Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.','collapseIn'=>true))
@include('admin.elements.widgets.collapse', array('id'=>'2', 'header'=> 'This is a header', 'body'=>'Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.'))
@include('admin.elements.widgets.collapse', array('id'=>'3', 'class'=>'success', 'header'=> 'This is a header', 'body'=>'Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.'))

@endsection



