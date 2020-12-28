<?php	
	$USN = [];
	$SName = [];
	$AtState = [];
	$CourseID = [];
	$FacultyID = [];
	$FName = [];
	$ResourceID = [];
	$ts = [];

	$conn = mysqli_connect("localhost", "root", "","dbmsproject");
	
	// $query = "select A.USN, S.First_name as Student_name, A.attendance_state, A.Course_ID,
	// 			A1.Faculty_ID, F.First_name as Faculty_name, R.Resource_ID, R.time_stamp
	// 			from attendancedetails A, resourceutilization R, association A1, faculty F, student S
	// 			where 
	// 			A.USN = R.USN and A.time_stamp = R.time_stamp
	// 			and
	// 			A.USN = A1.USN and A.Course_ID = A1.Course_ID
	// 			and
	// 			A1.Faculty_ID = F.Faculty_ID
	// 			and
	// 			A.USN = S.USN"
	$result = mysqli_query($conn, "select A.USN, S.First_name as Student_name, A.attendance_state, A.Course_ID,
				A1.Faculty_ID, F.First_name as Faculty_name, R.Resource_ID, R.time_stamp
				from attendancedetails A, resourceutilization R, association A1, faculty F, student S
				where 
				A.USN = R.USN and A.time_stamp = R.time_stamp
				and
				A.USN = A1.USN and A.Course_ID = A1.Course_ID
				and
				A1.Faculty_ID = F.Faculty_ID
				and
				A.USN = S.USN
				order by A.USN")
				or die("Failed to query database");

	$n = mysqli_num_rows($result);

	$i = 0;
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$USN[$i] = $row['USN'];
		$SName[$i] = $row['Student_name'];
		$AtState[$i] = $row['attendance_state'];
		$CourseID[$i] = $row['Course_ID'];
		$FacultyID[$i] = $row['Faculty_ID'];
		$FName[$i] = $row['Faculty_name'];
		$ResourceID[$i] = $row['Resource_ID'];
		$ts[$i] = $row['time_stamp'];
		$i++;
	}

?>


<!DOCTYPE html>
<html>

	<style>
		.table{
		border: 2px solid darkgray;
		color: grey;
		background-color: lightblue;
		}
		.movecenter{
		margin-left:160px !important;
		}
	</style>
	
	<?php include('../templates/header1.php') ?>
	<ul id="nav-mobile" class="right hide-on-small-and-down">
					<li><a href="./mainpage.php" class="btn brand z-depth-0" style="margin-right: -45px;">Back to Home Page</a></li>
				</ul>
			</div>
		</nav>
	<h4 class="center grey-text">General Report</h4>
	<section class="white container grey-text" style="width: 730px">
		<form class="white grey-text" action="generatereport.php" method="POST" style="margin-left:3px">
            <?php
            	echo "<table>";
			    echo '<tr style="font-weight: bold; font-size: 17px">';
			    echo '<td class="table">USN</td>';
			    echo '<td class="table">Student Name</td>';
			    echo '<td class="table">Attendance State</td>';
			    echo '<td class="table">Course ID</td>';
			    echo '<td class="table">Faculty ID</td>';
			    echo '<td class="table">Faculty Name</td>';
			    echo '<td class="table">Resource ID</td>';
			    echo '<td class="table">Time Stamp</td>';
			    echo "</tr>";
			    $i = 0;
			    while($i < $n){
			    	echo '<tr>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $USN[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $SName[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $AtState[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $CourseID[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $FacultyID[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $FName[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $ResourceID[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $ts[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '</tr>';
			    	$i++;
			    }			  
			    echo '</table>';
			?>
        </form>
	</section>
</html>