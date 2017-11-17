<div class="thumbnail">

    <div class="row">

        <div class="col-sm-4" align="center">
            
            <img alt="{{$user->username}}" class="img-thumbnail img-rounded" src="{{ (isset($user->profile->url_img)) ? asset($user->profile->url_img) : asset('images/avatar/user_default.png') }}">
        
        </div>

        <div class="col-sm-8">
        
            <div align="left">

            <ul class="list-group" style="margin: 0px;">
                <li class="list-group-item list-group-item-{{$user->is_active}}">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">Usuario</div>
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <strong>{{$user->username}}</strong>
                            <span class="label label-{{$user->is_active}} pull-right">{{$user->is_active}}</span>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">Email</div>
                        <div class="col-xs-8 col-sm-8 col-md-8"><strong>{{$user->profile->email or ''}}</strong></div>
                    </div>
                </li>

                <li class="list-group-item status-{{$user->is_active or ''}}">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">Estado</div>
                        <div class="col-xs-8 col-sm-8 col-md-8"><strong>{{$user->is_active or ''}}</strong></div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-4 col-xs-4 col-sm-4 col-md-4">
                            Nombre
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            {{$user->profile->firstname or ''}} {{$user->profile->lastname or ''}}
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">Último Ingreso</div>
                        <div class="col-xs-8 col-sm-8 col-md-8">

                            @if(!empty($user->last_login_at) && $user->last_login_at !='')
                                {{ date_format(new DateTime($user->last_login_at), 'd-m-Y  h:i:s') }}
                            @endif

                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">Última Salída</div>
                        <div class="col-xs-8 col-sm-8 col-md-8">

                            @if(!empty($user->last_loginout_at) && $user->last_loginout_at !='')
                                {{ date_format(new DateTime($user->last_loginout_at), 'd-m-Y  h:i:s') }}
                            @endif

                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">Última IP</div>
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            {{$user->last_login_ip or ''}}
                        </div>
                    </div>
                </li>
                
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">Creado</div>
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            @if(isset($user->created_at))
                                {{$user->created_at->format('d-m-Y h:m:s')}}
                            @endif
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">Actualizado</div>
                        <div class="col-xs-8 col-sm-8 col-md-8">
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