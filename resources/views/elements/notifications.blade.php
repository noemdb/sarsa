@extends('admin.layouts.dashboard.app')

@section ('page_heading','Alerts')

@section('section')

    @component('admin.elements.widgets.panel')
        @slot ('panelTitle','Regular Alerts')
        @slot ('panelBody')
            @include('admin.elements.widgets.alert', array('class'=>'success', 'message'=> 'You have an alert', 'icon'=> 'user'))
            @include('admin.elements.widgets.alert', array('class'=>'info', 'message'=> 'My message'))
            @include('admin.elements.widgets.alert', array('class'=>'warning', 'message'=> 'My message'))
            @include('admin.elements.widgets.alert', array('class'=>'danger', 'message'=> 'My message', 'icon'=> 'remove'))
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-sm-6">
            @component('admin.elements.widgets.panel')
                @slot ('panelTitle','Dismissable Alerts')
                @slot ('panelBody')
                    @include('admin.elements.widgets.alert', array('class'=>'success', 'dismissable'=>true, 'message'=> 'My message', 'icon'=> 'check'))
                    @include('admin.elements.widgets.alert', array('class'=>'info', 'dismissable'=>true, 'message'=> 'My message'))
                    @include('admin.elements.widgets.alert', array('class'=>'warning', 'dismissable'=>true, 'message'=> 'My message'))
                    @include('admin.elements.widgets.alert', array('class'=>'danger', 'dismissable'=>true, 'message'=> 'My message', 'icon'=> 'remove'))
                @endslot
            @endcomponent
        </div>
        <div class="col-sm-6">
            @component('admin.elements.widgets.panel')
                @slot ('panelTitle', 'Links in Alerts')
                @slot ('panelBody')

                    @include('admin.elements.widgets.alert', array('class'=>'success', 'link'=> 'link', 'message'=> 'My message', 'icon'=> 'check'))
                    @include('admin.elements.widgets.alert', array('class'=>'info', 'link'=> 'link', 'message'=> 'My message'))
                    @include('admin.elements.widgets.alert', array('class'=>'warning', 'link'=> 'link', 'message'=> 'My message'))
                    @include('admin.elements.widgets.alert', array('class'=>'danger', 'link'=> 'link', 'message'=> 'My message', 'icon'=> 'remove'))
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
