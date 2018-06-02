<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="30" />

<link rel="stylesheet" href="styles.css">

<style>
.slideshow {
	display:none;
	position: fixed;
	top: 55%;
	left: 50%;
	transform: translate(-50%, -50%);
	
	display: flex;
    flex-wrap: nowrap;
	height:75%;
    width:70%;
	background-color: lightgrey;
	border-radius:10px;
}

.item {
	display:flex;
	top: 55%;
	left: 50%;
}

</style>
<title>Dashboard</title>

<div class="header">
		<h1><img src="logo stroke.png" alt="logo" width = "90" height = "90" />AKD Softwoods</h1>
	<div id="clockdate">
	</div>
	</div>
	</div>
</head>

<body>
 <div class="clockdate-wrapper">
    <div id="clock"></div>
    <div id="date"></div>
</div>

<div class="slideshow">
	<?php include 'chart/bargraph2.php';?>
</div>

<div class="slideshow">
	<center><?php include 'chart/linegraph.php';?><center>
   </div> 
   

<div class="slideshow">
    <?php include 'Database.php';?>	
   </div>	

<div class="slideshow">
    <?php include 'EventsDB.php';?>	
   </div>

   <div class="slideshow">
    <?php include 'location.php';?>	
   </div>

<div class="slideshow">
	<h1 style="color:black;"><center><u>Company News</u></center></h1>
	</br>
	
	<h4 style="padding:20px;"> Great work on the sale's guys,
	They have doubled from last year but we still have to keep it up with bunnings warehouse demands.
	we will be changing our methods of sales from this Fiscal year.
	</br>
	</br>
	News from Health and Safety - A new policy is being sent to every department that is to hold rails while using staircase. 
	we know it is a minor Safety issue, but it has been acknowleged by the board and will be applicable from next month.
	</br>
	</br>
	Maintainence - We have faced some issues with lighting in the 3rd floor of notting hill ofiice.
	Our facility manager and his team are working on fixing this issue.
	due to which, the floor will be shut for couple hours. 
	P.S - please wait until further notice. 
	</h4>
</div>



<script>
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("slideshow");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 5000); 
}
</script>
</body>

<body onload="startTime()">

</body> 


<script>
 function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

</script>


</html>