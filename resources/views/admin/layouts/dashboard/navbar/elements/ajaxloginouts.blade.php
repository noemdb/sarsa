{{-- INI dropdown-loginouts --}}
<a class="dropdown-toggle alert-info btn" data-toggle="dropdown" href="#" title="Últimas 24 Horas">
    <i class="fa fa-key fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
    <span class="label label-info" id="span_count_loginouts"></span>        
</a>

<ul class="dropdown-menu dropdown-loginouts">
    <li>
        <ul class="list-group" id="ulresults-loginouts"></ul>
    </li>
</ul>

@section('scripts')
    @parent

    {{-- INI funciones para generar el badge en la navbar superior --}}
    <script>
 
        $( document ).ready(function() {
            // console.log( "ready!" );
            var count_loginouts = $('#span_count_loginouts'); //console.log( count_loginouts.text() );

            var url = "{{route('getloginouts')}}"; //alert(url);
            $.ajax({
              type: "GET",
              url: url, // This is the URL to the API
              data: { model: 'loginouts' } // rango dias meses o años para la data a mostrar
            })
            .done(function( data ) { //console.log(data);
                apidata = JSON.parse(data); //console.log(apidata);
                var num_task = apidata.length; //console.log(num_task);
                count_loginouts.text(num_task);

                ul = $("#ulresults-loginouts");
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
                                        $('<i>').attr('class', 'fa fa-key fa-fw')
                                )
                            ).append(
                                $('<span>').attr('class', 'text-'+apidata[i].tipo).
                                    append(
                                        '<b>'+apidata[i].user.username + '</b><br><b>Action:</b> ' +apidata[i].action+'<br><b>Message:</b> '+apidata[i].message+'<br>'
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