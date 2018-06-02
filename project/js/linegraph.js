$(document).ready(function() {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	$.ajax({
		url : "http://localhost/chart/api/data.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var actual = {
				DeptA : [],
				DeptB : []
			};

			var len = data.length;

			for (var i = 0; i < len; i++) {
				if (data[i].dept == "A") {
					actual.DeptA.push(data[i].actual);
				}
				else if (data[i].dept == "B") {
					actual.DeptB.push(data[i].actual);
				}
			}

			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : ['Jan','Feb','Mar','Apr','May','Jun'],
				datasets : [
					{
						label : "Dept A Actual",
						data : actual.DeptA,
						backgroundColor : "orange",
						borderColor : "yellow",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "Dept B Actual",
						data : actual.DeptB,
						backgroundColor : "green",
						borderColor : "lightgreen",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					}
				]
			};

			var options = {
				title : {
					display : true,
					position : "top",
					text : "Production Target Dept A Vs Dept B",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				}
			};

			var chart = new Chart( ctx, {
				type : "line",
				data : data,
				options : options
			} );

		},
		error : function(data) {
			console.log(data);
		}
	});

});