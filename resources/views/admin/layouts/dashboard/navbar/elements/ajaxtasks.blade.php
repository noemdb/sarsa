{{-- INI dropdown-tasks --}}
<a class="dropdown-toggle alert-success btn" data-toggle="dropdown" href="#">
    <i class="fa fa-tasks fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
    <span class="label label-success" id="span_count_tasks"></span>        
</a>

<ul class="dropdown-menu dropdown-tasks">
    <li>
        <ul class="list-group" id="ulresults-tasks"></ul>
    </li>
    <li><ul id="ulresultstasks"></ul></li>
</ul>

@section('scripts')
    @parent

    {{-- INI funciones para generar el badge en la navbar superior --}}
    <script>
 
        $( document ).ready(function() {
            // console.log( "ready!" );
            var count_tasks = $('#span_count_tasks'); //console.log( count_tasks.text() );

            var url = "{{route('gettasks')}}"; //alert(url);
            $.ajax({
              type: "GET",
              url: url, // This is the URL to the API
              data: { model: 'tasks' } // rango dias meses o años para la data a mostrar
            })
            .done(function( data ) { //console.log(data);
                apidata = JSON.parse(data); //console.log(apidata);
                var num_task = apidata.length; //console.log(num_task);
                count_tasks.text(num_task);

                ul = $("#ulresults-tasks");
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
                                        $('<i>').attr('class', 'fa fa-tasks fa-fw')
                                )
                            ).append(
                                $('<span>').attr('class', 'text-'+apidata[i].tipo).
                                    append(
                                        ' <b>' + apidata[i].codigo + '</b><br>' + apidata[i].descripcion+'<br>'
                                    ).
                                    append(
                                        $('<span>').attr('class', 'small').append(
                                                apidata[i].created_at
                                            )
                                    )
                            )
                        );

                    // ul.append("<li class='list-group-item text-overflow'><span class='text-" + apidata[i].tipo +"'><i class='fa fa-tasks fa-fw'></i> <b>" + apidata[i].codigo + '</b><br>' + apidata[i].descripcion + "<br><span class='small'>" + apidata[i].created_at + "</span></span></li>");
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