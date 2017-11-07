{{-- INI dropdown-messages --}}
<a class="dropdown-toggle alert-primary btn" data-toggle="dropdown" href="#">
        <i class="fa fa-comments fa-fw fa-2x"></i> <i class="fa fa-caret-down"></i>
        <span class="label label-primary" id="span_count_msn">{{ $messeges->where('estado','No Visto')->count() }}</span>        
</a>
<ul class="dropdown-menu dropdown-messages">
    <li>
        {{-- INI messeges-list panel --}}
        @component('elements.widgets.panel')
            @slot('badge',$messeges->where('estado','No Visto')->count())
            @slot('class','info')
            @slot('panelTitle', 'Nuevos')
            @slot('panelBody')
                @include('elements.widgets.messeges.list',[
                    'messeges'=>$messeges->where('estado','No Visto')->take(5),
                    'show_messeges'=>'true'
                    ])
            @endslot
        @endcomponent
        {{-- FIN messeges-list panel --}}
    </li>
</ul>

@section('scripts')
    @parent

    {{-- INI funciones para generar el badge en la navbar superior --}}
    <script>
 

        $( document ).ready(function() {
            // console.log( "ready!" );
            var count_msn = $('#span_count_msn'); console.log( count_msn.text() );//alert(count_msn);

            var url = "admin/api/navbar/messenges"; //alert(url);
            $.ajax({
              type: "GET",
              url: url, // This is the URL to the API
              data: { model: 'messeges' } // rango dias meses o años para la data a mostrar
            })
            .done(function( data ) {

                console.log(data);


                // var apidata = JSON.parse(data);  //console.log('apidata',apidata); /creando el objeto
                // var context = document.getElementById(canvas).getContext("2d"); // creando el contexto canvas

                // var options = {
                //     responsive: true,
                //     scaleShowValues: true,
                // }
                
                // var scale;
                // if (tipo == 'line' || tipo == 'bar') {
                //     options = {
                //         options,
                //         scales:{
                //                 yAxes: [{ ticks: { beginAtZero: true } }],
                //                 xAxes: [{ ticks: { autoSkip: false } }]
                //             }
                            
                //         }
                // }
                
                // var myChart = new Chart(context, {
                //     type: tipo,
                //     data: apidata,
                //     options: options
                // });

            })
            .fail(function() {
                console.log( "error occured" );
            });       


            // //Evento clic para el panel de tab nav-tabs (menu con las opciones)
            // $('ul.ranges a').click(function(e){
            //     e.preventDefault();
            //     // Get the number of range from the data attribute
            //     var el = $(this);
            //     var range = $(this).data('range'); //alert(range);
            //     var ul = $(this).parents('ul');
            //     var canvas = ul.data('canvas'); //alert(canvas);
            //     var api = ul.data('api'); //alert(api);
            //     var tipo = ul.data('tipo'); //alert(api);
            //     var limit = ul.data('limit'); //alert(limit);

            //     // Request the data and render the chart using our handy function
            //     requestData(range,canvas,api,tipo,limit);
            //     // Make things pretty to show which button/tab the user clicked
            //     el.parent().addClass('active');
            //     el.parent().siblings().removeClass('active');

            // });

        });

    </script>
    {{-- FIN funciones para generar los Chart --}}

@endsection