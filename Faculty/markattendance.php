<?php
	//connect to database
	//$conn = mysqli_connect()
	session_start();
	$email = $_SESSION['varname'];
	$facultyname = "";
	$facultyid = "";
	$courseid = [];
	$facultyname = "";

	$conn = mysqli_connect("localhost", "root", "","dbmsproject");
	
			//query the database for users
	$result = mysqli_query($conn, "select Faculty_ID,First_name,Last_name from faculty where Email = '$email'")
				or die("Failed to query database");

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$facultyid = $row['Faculty_ID'];
		$facultyname = $row['First_name']." ".$row['Last_name'];
	}

	$result = mysqli_query($conn, "select Course_ID from association where Faculty_ID = '$facultyid'")
				or die("Failed to query database");

	$rowcount = 0;
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$temp = $row['Course_ID'];
		if(!in_array($temp,$courseid)){
			array_push($courseid,$temp);
			$rowcount++;
		}
	}
	// echo '<pre>'; print_r($courseid); echo '</pre>';
	// print_r($courseid);
	$i = 0;
	while($i < $rowcount){
		// echo $courseid[$i];
		$i++;
	}

	if(isset($_POST['submit'])){
	}

?>

<!DOCTYPE html>
<html>

	<style>
	table,tr{
		border: 2px solid darkgray;
	}
	.table{
		border: 2px solid darkgray;
	}
	</style>
	
	<?php include('../templates/header1.php') ?>
				<ul id="nav-mobile" class="right hide-on-small-and-down">
					<li id="back"><a href="./mainpage.php" class="btn brand z-depth-0">Back to Home Page</a></li>
				</ul>
			</div>
		</nav>

	<h4 class="center grey-text">Attendance Registry</h4>
	<br/>
	<head action="markattendance.php" method="POST">
	<section class="white container grey-text" style="width: 1225px">
		<!-- <form class="white" action="markattendance.php" method="POST"> -->
			<!-- <label class="ftext">Faculty_ID:</label>
			<input type="text" value="<?php echo $facultyid ?>" readonly>
			<label class="ftext">Faculty Name:</label>
			<input type="text" value="<?php echo $facultyname ?>" readonly> -->
			<table>
				<tr style="font-weight: bold; font-size: 17px">
				    <td class="table">Faculty_ID</td>
				    <td class="table">Faculty_Name</td>
				    <td class="table">Faculty_Email</td>
				    <td class="table">Semester</td>
				    <td class="table">Course_ID</td>
				    <td class="table">Batch_ID</td>
				    <td class="table">Date</td>
				    <td class="table">Time</td>
				</tr>
				<tr>
				    <td style="border: 2px solid darkgray"><input type="text" value="<?php echo $facultyid ?>" readonly></td>
				    <td class="table"><input type="text" value="<?php echo $facultyname ?>" readonly></td>
				    <td class="table"><input type="text" value="<?php echo $email ?>" readonly></td>
				    <td class="table">
				    	<select>
						<option value="select1">Select1</option>
						<option value="select2">Select2</option>
						<option value="select3">Select3</option>
						</select>
					</td>
					<td class="table">
				    	<select>
						<option value="select1">Select1</option>
						<option value="select2">Select2</option>
						<option value="select3">Select3</option>
						</select>
					</td>
					<td class="table">
				    	<select>
						<option value="select1">Select1</option>
						<option value="select2">Select2</option>
						<option value="select3">Select3</option>
						</select>
					</td>
					<td class="table"><input type="date" name="date"></td>
				    <td class="table"><input type="time" name="time"></td>
				</tr>
			</table>
		<!-- </form> -->
	</section>
	<br/>
	<div class="center">
		<span class="ftext1">
			<input type="submit" name="submit" value="Confirm" class="btn brand z-depth-0">
		</span>
	</div>
	</head>
	<?php include('../templates/footer.php') ?>

</html>