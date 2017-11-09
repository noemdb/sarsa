<a href="#"><i class="fa fa-database"></i> Modelos<span class="fa arrow"></span></a>

<ul class="nav nav-second-level">
    {{-- @php ($models = [['name'=>'tasks', 'title'=>'Tareas'],['name'=>'messenges', 'title'=>'Mensajes'],['name'=>'alerts', 'title'=>'Alertas']] ) --}}
    @php ($models[] = ['name'=>'tasks', 'title'=>'Tareas'] )
    @php ($models[] = ['name'=>'messenges', 'title'=>'Mensajes'] )
    @php ($models[] = ['name'=>'alerts', 'title'=>'Alertas'] )
    @php ($models[] = ['name'=>'loginouts', 'title'=>'LogIn/LogOut'] )
    @php ($models[] = ['name'=>'logdbs', 'title'=>'LogDB'] )
    @foreach ($models as $model)
        <li>
            <a href="#">{{ $model['title'] }}<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="{{ url ('admin/models/'.$model['name'].'/crub') }}">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        CRUB
                    </a>
                </li>
                <li>
                    <a href="{{ url ('admin/models/'.$model['name'].'/charts') }}">
                        <i class="fa fa-pie-chart" aria-hidden="true"></i>
                        Gráficas
                    </a>
                </li>
            </ul>
            <!-- /.nav-third-level -->
        </li>
    @endforeach
</ul>