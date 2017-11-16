<div class="panel-group" id="accordion" align="left">

    @php($n=1)
    @foreach($user->rols as $rol)

        <div class="panel panel-default rol-{{ $rol->rol or '' }}">
            <div class="panel-heading">
              
                {{ $n++ }} 
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-rols-{{$rol['id']}}">
                    {{ $rol->rol }}
                </a>

            </div>

            <div id="collapse-rols-{{$rol['id']}}" class="panel-collapse collapse">
              <div class="panel-body" style="background-color: #fff !important;">
                <table width="100%" class="table" bgcolor="#fff">
                    <tr class="rol-{{ $rol->rol or '' }}">
                        <td rowspan="5" align="center" style="vertical-align: middle;"><strong>{{ $n }}</strong></td>
                        <td>Rol</td><td><strong>{{ $rol->rol }}</strong></td>
                    </tr>
                    <tr class="rango-{{ $rol->rango or '' }}">
                        <td>Rango</td>
                        <td>
                            <strong>{{ $rol->rango }}</strong>
                        </td>
                    </tr>
                    <tr><td>Fecha Inicial</td> <td>{{ $rol->finicial }}</td></tr>
                    <tr><td>Fecha Final</td> <td>{{ $rol->ffinal }}</td></tr>
                </table>                                 
              </div>
            </div>
        </div>                            
        
    @endforeach

</div>
