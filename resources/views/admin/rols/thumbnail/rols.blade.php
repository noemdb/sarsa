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

                @include('admin.rols.thumbnail.rol')   

              </div>
              
            </div>
        </div>                            
        
    @endforeach

</div>
