/*!
 * ChartFunction.js
 * http://noemdb.org/
 * Version: 1.0.0
 *
 * Copyright 2017 Noe Dominguez
 * Released under the MIT license
 * https://github.com/noemdb/ChartFunction.js/blob/master/LICENSE.md
 * Funciones para la realizacion de chart usando la libreria Chart.js
 */

// Create a function that will handle AJAX requests
function requestData(range,canvas,api,tipo,limit){
    var url = "admin/api/charts/"+api+"?limit="+limit; //alert(url);
    $.ajax({
      type: "GET",
      url: url, // This is the URL to the API
      data: { range: range } // rango dias meses o años para la data a mostrar
    })
    .done(function( data ) {

        //INI asegurar dibujar en un canvas nuevo para evitar solapamiento de chart
        $('#'+canvas).remove(); // elimina el canvas antiguo                   
        var newcanvas = document.createElement('canvas'); //console.log(newcanvas); //crea
        newcanvas.id  = canvas; //console.log(newcanvas); // 
        div = document.getElementById('div'+canvas); //console.log(div); //este div contiene el canvas para el chart
        div.appendChild(newcanvas); // asignando el canvas al div
        //FIN asegurar dibujar en un canvas nuevo para evitar solapamiento de chart

        var apidata = JSON.parse(data);  //console.log('apidata',apidata); /creando el objeto
        var context = document.getElementById(canvas).getContext("2d"); // creando el contexto canvas

        var options = {
            responsive: true,
            scaleShowValues: true,
        }
        
        var scale;
        if (tipo == 'line' || tipo == 'bar') {
            options = {
                options,
                scales:{
                        yAxes: [{ ticks: { beginAtZero: true } }],
                        xAxes: [{ ticks: { autoSkip: false } }]
                    }
                    
                }
        }
        
        var myChart = new Chart(context, {
            type: tipo,
            data: apidata,
            options: options
        });

    })
    .fail(function() {
        console.log( "error occured" );
    });
}