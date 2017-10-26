@extends('admin.layouts.app')

@section('body')
    <div id="wrapper">

        {{-- INI navbar --}}
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            @include('admin.layouts.dashboard.navbar.app')
            
        </nav>
        {{-- FIN navbar --}}

        {{-- INI sidebar --}}
        <nav class="navbar-default sidebar" role="navigation" id="sidebar">

            @include('admin.layouts.dashboard.sidebar.app')

        </nav>
        {{-- FIN sidebar --}}

        {{-- INI page-wrappe --}}
        <div id="page-wrapper" class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @yield('page_heading')
                    </h1>
                </div>
            </div>
            <div class="row">
                @yield('section')
            </div>
        </div>
        {{-- FIN page-wrappe --}}
    </div>
@endsection

@section('scripts')

     <script type="text/javascript">
         $(document).ready(function () {
             $('#sidebarCollapse').on('click', function () {
                 $('#sidebar').toggleClass('active');
                 $("#page-wrapper").toggleClass("active");
             });
         });
     </script>

@endsection