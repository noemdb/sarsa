@extends('webmaster.layouts.dashboard.app')

@section('page_heading','Dashboard')

@section('section')

    {{-- /.row INI card--}}
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                {{-- INI card-collapse mensajes --}}
                @component('elements.widgets.card_collapse')
                    @slot('class', 'primary')
                    @slot('class_icon', 'fa fa-comments fa-5x')
                    @slot('total', $messeges->where('estado','No Visto')->count())
                    @slot('text', 'Nuevos Mensajes')
                    @slot('headercollapse', 'Mas detalles')
                    @slot('idcollapse', 'idnotificaciones1')
                    @slot('bodycollapse')
                        {{-- INI messeges-list panel --}}
                        @component('elements.widgets.panel')
                            @slot('badge',$messeges->where('estado','No Visto')->count())
                            @slot('class','info')
                            @slot('panelTitle', 'Nuevos')
                            @slot('panelBody')
                                @include('elements.widgets.messeges.list',['messeges'=>$messeges->where('estado','No Visto')])
                            @endslot
                        @endcomponent
                        {{-- FIN messeges-list panel --}}
                    @endslot
                @endcomponent
                {{-- FIN card-collapse mensajes --}}
            </div>
            <div class="col-lg-3 col-md-6">
                {{-- INI card-collapse tasks --}}
                @component('elements.widgets.card_collapse')
                    @slot('class', 'green')
                    @slot('class_icon', 'fa fa-tasks fa-5x')
                    @slot('total', $tasks->where('estado','iniciada')->count())
                    @slot('text', 'Tareas Pendientes')
                    @slot('headercollapse', 'Mas detalles')
                    @slot('idcollapse', 'idtareas1')
                    @slot('bodycollapse')
                        {{-- INI tasks-list --}}
                        @component('elements.widgets.panel')
                            @slot('badge',$tasks->where('estado','iniciada')->count())
                            @slot('class','success')
                            @slot('panelTitle', 'Pendientes')
                            @slot('panelBody')
                                @include('elements.widgets.tasks.list',['tasks'=>$tasks->where('estado','iniciada')])
                            @endslot
                        @endcomponent
                        {{-- FIN tasks-list --}}
                    @endslot
                @endcomponent
                {{-- INI card-collapse tasks --}}
            </div>
            <div class="col-lg-3 col-md-6">
                {{-- @component('elements.widgets.card')
                    @slot('class', 'yellow')
                    @slot('class_icon', 'fa fa-warning fa-5x')
                    @slot('total', $alerts->where('estado','No Visto')->count())
                    @slot('text', 'Nuevas Alertas')
                @endcomponent --}}

                {{-- INI card-collapse alert --}}
                @component('elements.widgets.card_collapse')
                    @slot('class', 'yellow')
                    @slot('class_icon', 'fa fa-warning fa-5x')
                    @slot('total', $alerts->where('estado','No Visto')->count())
                    @slot('text', 'Alertas Pendientes')
                    @slot('headercollapse', 'Mas detalles')
                    @slot('idcollapse', 'idalertas1')
                    @slot('bodycollapse')
                        {{-- INI alert-list --}}
                        @component('elements.widgets.panel')
                            @slot('badge',$alerts->where('estado','No Visto')->count())
                            @slot('class','warning')
                            @slot('panelTitle', 'Pendientes')
                            @slot('panelBody')
                                @include('elements.widgets.alerts-list',['alerts'=>$alerts->where('estado','No Visto')])
                            @endslot
                        @endcomponent
                        {{-- FIN alert-list --}}
                    @endslot
                @endcomponent
                {{-- INI card-collapse alert --}}
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
