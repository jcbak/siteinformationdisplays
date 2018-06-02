$(document).ready(function(){
	$.ajax({
		url: "http://localhost/chart/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var sales = [];
			var revenue = [];

			for(var i in data) {
				sales.push("Sales ID " + data[i].salesID);
				revenue.push(data[i].revenue);
			}

			var chartdata = {
				labels: sales,
				datasets : [
					{
						label: 'sales',
						backgroundColor: 'rgba(255, 255, 255, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						
						
					
						data: revenue
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
				
				
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});