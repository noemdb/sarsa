<canvas id="chart_sold" width="350" height="220"></canvas>

@section('scripts')
@parent

    <script>
        $(document).ready(function() {
			var lineChartData = {
			    labels: ["January", "February", "March", "April", "May", "June", "July"],
			    datasets: [{
			        label: "My First dataset",
			        fillColor: "rgba(220,220,220,0.2)",
			        strokeColor: "rgba(220,220,220,1)",
			        pointColor: "rgba(220,220,220,1)",
			        pointStrokeColor: "#fff",
			        pointHighlightFill: "#fff",
			        pointHighlightStroke: "rgba(6, 197, 172, 1)",
			        data: [65, 59, 80, 209, 56, 55, 305]
			    }, {
			        label: "My Second dataset",
			        fillColor: "rgba(151,187,205,0.2)",
			        strokeColor: "rgba(151,187,205,1)",
			        pointColor: "rgba(151,187,205,1)",
			        pointStrokeColor: "#fff",
			        pointHighlightFill: "#fff",
			        pointHighlightStroke: "rgba(244, 204, 11, 1)",
			        data: [28, 48, 40, 19, 86, 27, 90]
			    }
			    , {
			        label: "My third dataset",
			        fillColor: "rgba(103, 65, 114,0.2)",
			        strokeColor: "rgba(102, 51, 153,1)",
			        pointColor: "rgba(154, 18, 179)",
			        pointStrokeColor: "#fff",
			        pointHighlightFill: "#fff",
			        pointHighlightStroke: "rgba(244, 204, 11, 1)",
			        data: [2, 6, 80, 228, 143, 53, 22]
			    }]

			};

			if (typeof document.getElementById("chart_sold")){
				var cline = document.getElementById("chart_sold").getContext("2d");
				new Chart(cline).Line(lineChartData, {
				    responsive: true
				});
			}
        });
    </script>

@endsection