<a href="#"> <i class="fa fa-database text-navy"></i> Modelos<span class="fa arrow"></span></a>

<ul class="nav nav-second-level">

    {{-- INI user --}}
    @component('admin.layouts.dashboard.sidebar.elements.partials.models')
        @slot('models', 'users')
        @slot('titulo', 'Usuarios')
        @slot('icon', 'user')
        @slot('class', 'navy')
    @endcomponent
    {{-- FIN user --}}

    {{-- INI profile --}}
    @component('admin.layouts.dashboard.sidebar.elements.partials.models')
        @slot('models', 'profiles')
        @slot('titulo', 'Perfiles')
        @slot('icon', 'id-card')
        @slot('class', 'info')
    @endcomponent
    {{-- FIN profile --}}

    {{-- INI messenges --}}
    @component('admin.layouts.dashboard.sidebar.elements.partials.models')
        @slot('models', 'messenges')
        @slot('titulo', 'Mensajes')
        @slot('icon', 'comments')
        @slot('class', 'primary')
    @endcomponent
    {{-- FIN messenges --}}

    {{-- INI task --}}
    @component('admin.layouts.dashboard.sidebar.elements.partials.models')
        @slot('models', 'tasks')
        @slot('titulo', 'Tareas')
        @slot('icon', 'tasks')
        @slot('class', 'success')
    @endcomponent
    {{-- FIN task --}}

    {{-- INI alerts --}}
    @component('admin.layouts.dashboard.sidebar.elements.partials.models')
        @slot('models', 'alerts')
        @slot('titulo', 'Alertas')
        @slot('icon', 'bell')
        @slot('class', 'warning')
    @endcomponent
    {{-- FIN alerts --}}

    {{-- INI logdbs --}}
    @component('admin.layouts.dashboard.sidebar.elements.partials.models')
        @slot('models', 'logdbs')
        @slot('titulo', 'LogDB')
        @slot('icon', 'database')
        @slot('class', 'grey')
    @endcomponent
    {{-- FIN logdbs --}}

    {{-- INI loginouts --}}
    @component('admin.layouts.dashboard.sidebar.elements.partials.models')
        @slot('models', 'loginouts')
        @slot('titulo', 'LogInOut')
        @slot('icon', 'key')
        @slot('class', 'maroon')
    @endcomponent
    {{-- FIN loginouts --}}


</ul>