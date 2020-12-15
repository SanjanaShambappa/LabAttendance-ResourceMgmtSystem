<?php
	//connect to database
	//$conn = mysqli_connect()
	$r1 = ['Year', 'Sales', 'Expenses'];
	// $r2 = ['1RV18IS048',0,1];
	// $r3 = ['1RV18IS016',1,1];
	// $r4 = ['1RV18IS049',1,0];
	// $r5 = ['1RV18IS007',0,0];
	// $r6 = ['1RV18IS041',1,1];
	$r2 = ['2004',  1000,      400];
    $r3 = ['2005',  1170,      460];
    $r4 = ['2006',  660,       1120];
    $r5 = ['2007',  1030,      540];
?>

<!DOCTYPE html>
<html>
	
	<?php include('../templates/header1.php') ?>
				<ul id="nav-mobile" class="right hide-on-small-and-down">
					<li id="back"><a href="./mainpage.php" class="btn brand z-depth-0">Back to Home Page</a></li>
				</ul>
			</div>
		</nav>

	<h4 class="center grey-text">Analysing Attendance - Data Trends</h4>

	<section class="container grey-text">
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	    <script type="text/javascript">
	      google.charts.load('current', {'packages':['corechart']});
	      google.charts.setOnLoadCallback(drawChart);

		    $r1 = ['USN', 'Database Design', 'Software Engineering'];
			$r2 = ['1RV18IS048',0,1];
			$r3 = ['1RV18IS016',1,1];
			$r4 = ['1RV18IS049',1,0];
			$r5 = ['1RV18IS007',0,0];
			$r6 = ['1RV18IS041',1,1];

	      function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	          // ['Year', 'Sales', 'Expenses'],
	          // ['2004',  1000,      400],
	          // ['2005',  1170,      460],
	          // ['2006',  660,       1120],
	          // ['2007',  1030,      540]
	          $r1,$r2,$r3,$r4,$r5
	        ]);

	        var options = {
	       	  width: 500,
	  	      height: 260,
	  	      // x="161",
	  	      // y="96"
	  	      // chartArea:{left:0,top:0,width:"50%",height:"50%"}
	          title: 'Student Attendance based on Course',
	          curveType: 'function',
	          legend: { position: 'bottom' }
	        };

	        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
	        chart.draw(data, options);
	      }
	    </script>
	</section>
	<section class="container grey-text">
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	    <script type="text/javascript">
	      google.charts.load('current', {'packages':['corechart']});
	      google.charts.setOnLoadCallback(drawChart);

		    $r1 = ['USN', 'Database Design', 'Software Engineering'];
			$r2 = ['1RV18IS048',0,1];
			$r3 = ['1RV18IS016',1,1];
			$r4 = ['1RV18IS049',1,0];
			$r5 = ['1RV18IS007',0,0];
			$r6 = ['1RV18IS041',1,1];
			$r7 = ['1RV18IS048',0,1];
			$r8 = ['1RV18IS016',1,1];
			$r9 = ['1RV18IS049',1,0];
			$r10 = ['1RV18IS007',0,0];
			$r11 = ['1RV18IS041',1,1];

	      function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	          // ['Year', 'Sales', 'Expenses'],
	          // ['2004',  1000,      400],
	          // ['2005',  1170,      460],
	          // ['2006',  660,       1120],
	          // ['2007',  1030,      540]
	          $r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11
	        ]);

	        var options = {
	       	  width: 500,
	  	      height: 260,
	  	      // x="161",
	  	      // y="96"
	  	      // chartArea:{left:0,top:0,width:"50%",height:"50%"}
	          title: 'Student Attendance based on Course',
	          curveType: 'function',
	          legend: { position: 'bottom' }
	        };

	        var chart = new google.visualization.LineChart(document.getElementById('curve_chart1'));
	        chart.draw(data, options);
	      }
	    </script>
	</section>

    
	  <body>
	  	<div style="position:relative;width:100%">
	    	<div id="curve_chart" style="position:absolute;top:40px;left:160px;"></div>
	    	<div id="curve_chart1" style="position:absolute;top:40px;right:160px;"></div>
	    </div>
	   </body>
	
	<!-- <?php include('../templates/footer.php') ?> -->

</html>