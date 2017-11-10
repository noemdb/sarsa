{{-- INI dropdown-logdbs --}}
<a class="dropdown-toggle alert-danger btn" data-toggle="dropdown" href="#" title="Últimas 24 Horas">
    <i class="fa fa-database fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
    <span class="label label-danger" id="span_count_logdbs"></span>        
</a>

<ul class="dropdown-menu dropdown-logdbs">
    <li>
        <ul class="list-group" id="ulresults-logdbs"></ul>
    </li>
</ul>

@section('scripts')
    @parent

    {{-- INI funciones para generar el badge en la navbar superior --}}
    <script>
 
        $( document ).ready(function() {
            // console.log( "ready!" );
            var count_logdbs = $('#span_count_logdbs'); //console.log( count_logdbs.text() );

            var url = "{{route('getlogdbs')}}"; //alert(url);
            $.ajax({
              type: "GET",
              url: url, // This is the URL to the API
              data: { model: 'logdbs' } // rango dias meses o años para la data a mostrar
            })
            .done(function( data ) { //console.log(data);
                apidata = JSON.parse(data); //console.log(apidata);
                var num_task = apidata.length; //console.log(num_task);
                count_logdbs.text(num_task);

                ul = $("#ulresults-logdbs");
                var limit = apidata.length;
                if(limit>4)
                    limit = 4;
                //console.log(limit);
                for (var i = 0, l = limit; i < l; ++i) {
                    ul.append(
                        $('<li class="list-group-item text-overflow">').
                            append(
                                $('<span>').attr('class', 'text-'+apidata[i].tipo).
                                    append(
                                        $('<i>').attr('class', 'fa fa-database fa-fw')
                                )
                            ).append(
                                $('<span>').attr('class', 'text-'+apidata[i].tipo).
                                    append(
                                        '<b>'+apidata[i].user.username + '</b><br><b>Modelo:</b> ' +apidata[i].model_class+'<br><b>pathInfo:</b> '+apidata[i].pathInfo+'<br>'
                                    ).
                                    append(
                                        $('<span>').attr('class', 'small').append(
                                                apidata[i].created_at
                                            )
                                    )
                            )
                        ); 
                }
                ul.append("<a href='#'>Mas...</a>")
               
            })
            .fail(function() {
                console.log( "error occured" );
            });

        });

    </script>
    {{-- FIN funciones para generar los Chart --}}

@endsection