<div class="thumbnail">
    {{-- <p> --}}
        {{-- <strong>Detalles del Usuario</strong> --}}
    {{-- </p> --}}

    <div class="row">
            
        <div class="col-sm-4" align="center">

            <img alt="{{$user->username}}" class="img-thumbnail img-rounded" src="{{ (isset($profile->url_img)) ? asset($profile->url_img) : asset('images/avatar/user_default.png') }}">
        
        </div>

        <div class="col-sm-8">

            <div align="left">
                {{-- <h4></h4> --}}

                <ul class="list-group" style="margin: 0px;">

                    @component('admin.rols.thumbnail.element.list-group-li')
                        @slot('title', 'Usuario')
                        @slot('class_color', 'text-'.$user->is_active)
                        @slot('class_text', 'text-users-username-'.$user->id)
                        @slot('text_strong', true)
                        @slot('text', $user->username)
                    @endcomponent

                    @component('admin.rols.thumbnail.element.list-group-li')
                        @slot('title', 'Rol')
                        @slot('class_color', 'rol-'.$rol->rol)
                        @slot('class_text', 'text-rols-rol-'.$rol->id)
                        @slot('text', $rol->rol)
                    @endcomponent

                    @component('admin.rols.thumbnail.element.list-group-li')
                        @slot('title', 'Rango')
                        @slot('class_color', 'rango-'.$rol->rango)
                        @slot('class_text', 'text-rols-rango-'.$rol->id)
                        @slot('text', $rol->rango)
                    @endcomponent

                    @php ($finicial = Carbon\Carbon::parse($rol->finicial)->format('d-m-Y'))
                    @component('admin.rols.thumbnail.element.list-group-li')
                        @slot('title', 'Fecha Inicial')
                        @slot('class_text', 'text-rols-finicial-'.$rol->id)
                        @slot('text', $finicial)
                    @endcomponent

                    @php ($ffinal = Carbon\Carbon::parse($rol->ffinal)->format('d-m-Y'))
                    @component('admin.rols.thumbnail.element.list-group-li')
                        @slot('title', 'Fecha Final')
                        @slot('class_text', 'text-rols-ffinal-'.$rol->id)
                        @slot('text', $ffinal)
                    @endcomponent

                    <li class="list-group-item">

                        <div align="center">
                            @if (isset($rol->id))
                                <a title="Actualizar" class="btn btn-warning btn-ms btn-block" href="{{ route('rols.edit',$rol->id) }}" role="button">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    Actualizar
                                </a>
                            @else
                                <a title="Crear" class="btn btn-primary btn-ms" href="{{ route('rols.create') }}" role="button">
                                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                    Crear
                                </a>
                            @endif
                        </div>  

                    </li>

                </ul>
            </div>

        </div>

    </div>



</div>