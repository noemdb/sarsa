<div class="thumbnail">
    {{-- <p> --}}
        {{-- <strong>Detalles del Usuario</strong> --}}
    {{-- </p> --}}

    <div class="row">

        <div class="col-md-4">
            <img src="{{$user->profile->url_img or ''}}" alt="{{$user->username}}" class="img-thumbnail img-rounded">
        </div>

        <div class="col-md-8">
        
            <div align="left">
                {{-- <h4></h4> --}}

                <ul class="list-group" style="margin: 0px;">
                    <li class="list-group-item list-group-item-{{$user->is_active}}">
                        <div class="row">
                            <div class="col-md-4">Usuario:</div>
                            <div class="col-md-8">
                                <strong>{{$user->username}}</strong>
                                <span class="label label-{{$user->is_active}} pull-right">{{$user->is_active}}</span>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        Roles:
                        
                        {{-- <ul class="list-group" style="margin: 0px;"> --}}
                            @php($n=1)
                        @foreach($user->rols as $rol)
                            {{-- <li class="list-group-item"> --}}
                                <table width="100%" class="table table-striped table-hover">
                                    <tr>
                                        <td rowspan="5" valign="middle" style="vertical-align: middle;">{{ $n++ }}</td>
                                        <td>Rol</td><td>{{ $rol->rol }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rango</td>
                                        <td class="rango-{{ $rol->rango or '' }}">
                                            {{ $rol->rango }}
                                        </td>
                                    </tr>
                                    <tr><td>F.Inicial</td> <td>{{ $rol->finicial }}</td></tr>
                                    <tr><td>F.Final</td> <td>{{ $rol->ffinal }}</td></tr>
                                </table>
                            {{-- </li> --}}
                        @endforeach
                        {{-- </ul> --}}
                    </li>
                    
                </ul>

            </div>

        </div>

    </div>
</div>