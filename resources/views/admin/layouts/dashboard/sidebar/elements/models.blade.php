<a href="#"> <i class="fa fa-database"></i> Modelos<span class="fa arrow"></span></a>

<ul class="nav nav-second-level">
    {{-- @php ($models = [['name'=>'tasks', 'title'=>'Tareas'],['name'=>'messenges', 'title'=>'Mensajes'],['name'=>'alerts', 'title'=>'Alertas']] ) --}}
    @php ($models[] = ['name'=>'tasks', 'title'=>'Tareas', 'icon'=>'tasks'] )
    @php ($models[] = ['name'=>'messenges', 'title'=>'Mensajes', 'icon'=>'comments'] )
    @php ($models[] = ['name'=>'alerts', 'title'=>'Alertas', 'icon'=>'warning'] )
    @php ($models[] = ['name'=>'loginouts', 'title'=>'LogIn/LogOut', 'icon'=>'key'] )
    @php ($models[] = ['name'=>'logdbs', 'title'=>'LogDB', 'icon'=>'database'] )
    @foreach ($models as $model)
        <li>
            <a href="#" class="text-primary">
                <i class="fa fa-{{ $model['icon'] }}" aria-hidden="true"> </i>
                {{ $model['title'] }}<span class="fa arrow"></span>
            </a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="{{ url ('admin/models/'.$model['name'].'/crub') }}" class="text-warning">
                        <i class="fa fa-list" aria-hidden="true"> </i>
                        CRUD
                    </a>
                </li>
                <li>
                    <a href="{{ url ('admin/models/'.$model['name'].'/charts') }}" class="text-danger">
                        <i class="fa fa-pie-chart" aria-hidden="true"> </i>
                        Gráficas
                    </a>
                </li>
            </ul>
            <!-- /.nav-third-level -->
        </li>
    @endforeach
</ul>