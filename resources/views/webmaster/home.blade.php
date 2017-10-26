@extends('webmaster.layouts.dashboard.app')

@section('page_heading','Dashboard')

@section('section')

    {{-- /.row INI card--}}
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                @component('elements.widgets.card')
                    @slot('class', 'primary')
                    @slot('class_icon', 'fa fa-comments fa-5x')
                    @slot('total', '105')
                    @slot('text', 'Nuevos Comentarios')
                @endcomponent
            </div>
            <div class="col-lg-3 col-md-6">
                @component('elements.widgets.card')
                    @slot('class', 'green')
                    @slot('class_icon', 'fa fa-tasks fa-5x')
                    @slot('total', $users)
                    @slot('text', 'Nuevas Tareas')
                @endcomponent
            </div>
            <div class="col-lg-3 col-md-6">
                @component('elements.widgets.card')
                    @slot('class', 'yellow')
                    @slot('class_icon', 'fa fa-shopping fa-5x')
                    @slot('total', '15')
                    @slot('text', 'Nuevas Ventas')
                @endcomponent
            </div>
            <div class="col-lg-3 col-md-6">
                @component('elements.widgets.card')
                    @slot('class', 'red')
                    @slot('class_icon', 'fa fa-support fa-5x')
                    @slot('total', '158')
                    @slot('text', 'Nuevas Tickets!')
                @endcomponent
            </div>
        </div>
         {{-- /.row FIN card --}}

        <div class="row">
            <div class="col-lg-8">
                {{-- INI timeline --}}
                @component('elements.widgets.panel')
                    @slot('panelTitle', 'Responsive Timeline')
                    @slot('panelControls', 'true')
                    @slot('id', 'timeline')
                    @slot('panelBody')
                         @include('elements.timeline')
                    @endslot
                @endcomponent
                {{-- FIN timeline --}}
            </div>
            <!-- /.col-lg-8 -->

            <div class="col-lg-4">
                {{-- INI Line Chart panel --}}
                @component('elements.widgets.panel')
                    @slot('panelTitle', 'Line Chart')
                    @slot('panelControls', 'true')
                    @slot('id', 'clinechart')
                    @slot('panelBody')
                        {{-- @include('elements.charts.widgets.clinechart') --}}
                        @component('elements.charts.widgets.canvas')
                            @slot('id', 'cline')
                        @endcomponent
                    @endslot
                @endcomponent
                {{-- INI Line Chart panel --}}

                {{-- INI Notification panel --}}
                @component('elements.widgets.panel')
                    @slot('class','info')
                    @slot('panelTitle', 'Notification Panel')
                    @slot('panelBody')
                        {{-- @include('elements.notifications') --}}
                        @include('elements.notificationspanel')
                    @endslot
                @endcomponent
                {{-- FIN Notification panel --}}

                {{-- INI chat panel --}}
                @component('elements.widgets.panel')
                    @slot('class','success')
                    {{-- @slot('panelControls', 'true') --}}
                    @slot('id', 'chats')
                    @slot('badge', '24')
                    @slot('panelTitle')
                        @include('elements.chats.header')
                    @endslot
                    @slot('panelBody')
                        @include('elements.chats.panel')
                    @endslot
                    @slot('panelFooter')
                        @include('elements.chats.footer')
                    @endslot
                @endcomponent
                {{-- FIN chat panel --}}
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection

@section('stylesheet')

    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">

@endsection

@section('scripts')
    @parent
    <script src="{{ asset("js/Chart.js") }}"></script>
    {{-- <script src="{{ asset("vendor/raphael/raphael.min.js") }}"></script> --}}
    {{-- <script src="{{ asset("vendor/morrisjs/morris.min.js") }}"></script> --}}
    {{-- <script src="{{ asset("data/morris-data.js") }}"></script> --}}
@endsection
