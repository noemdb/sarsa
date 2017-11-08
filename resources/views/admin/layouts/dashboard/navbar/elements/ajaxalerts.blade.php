{{-- INI dropdown-alerts --}}
<a class="dropdown-toggle alert-warning btn" data-toggle="dropdown" href="#">
    <i class="fa fa-bell fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
    <span class="label label-warning" id="span_count_alerts"></span>        
</a>

<ul class="dropdown-menu dropdown-alerts">
    <li>
        <ul class="list-group" id="ulresults-alerts"></ul>
    </li>
</ul>

@section('scripts')
    @parent

    {{-- INI funciones para generar el badge en la navbar superior --}}
    <script>
 
        $( document ).ready(function() {
            // console.log( "ready!" );
            var count_alerts = $('#span_count_alerts'); //console.log( count_alerts.text() );

            var url = "{{route('getalerts')}}"; //alert(url);
            $.ajax({
              type: "GET",
              url: url, // This is the URL to the API
              data: { model: 'alerts' } // rango dias meses o años para la data a mostrar
            })
            .done(function( data ) { //console.log(data);
                apidata = JSON.parse(data); //console.log(apidata);
                var num_task = apidata.length; //console.log(num_task);
                count_alerts.text(num_task);

                ul = $("#ulresults-alerts");
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
                                        $('<i>').attr('class', 'fa fa-bell fa-fw')
                                )
                            ).append(
                                $('<span>').attr('class', 'text-'+apidata[i].tipo).
                                    append(
                                        ' <b>' + apidata[i].user.username + '</b><br>' + apidata[i].mensaje+'<br>'
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