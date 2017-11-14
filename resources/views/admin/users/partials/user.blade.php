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
                    <div class="row">
                        <div class="col-sm-4">Email:</div>
                        <div class="col-sm-8"><strong>{{$user->profile->email or ''}}</strong></div>
                    </div>
                </li>

                <li class="list-group-item status-{{$user->is_active or ''}}">
                    <div class="row">
                        <div class="col-sm-4">Estado:</div>
                        <div class="col-sm-8"><strong>{{$user->is_active or ''}}</strong></div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">
                            Nombre
                        </div>
                        <div class="col-md-8">
                            {{$user->profile->firstname or ''}} {{$user->profile->lastname or ''}}
                        </div>
                    </div>
                </li>
                
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Creado</div>
                        <div class="col-md-8">
                            @if(isset($user->created_at))
                                {{$user->created_at->format('d-m-Y h:m:s')}}
                            @endif
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Actualizado</div>
                        <div class="col-md-8">
                            @if(isset($user->updated_at))
                                {{$user->updated_at->format('d-m-Y h:m:s')}}
                            @endif
                        </div>
                    </div>
                </li>
                
            </ul>

        </div>
        </div>

    </div>
</div>