<?php

	$resource_ID = "";
	$resource_type = "";

	$em_rid = $em_rtype = "";

	$f = 1;

	
	if(isset($_POST['submit'])){

		if(empty($_POST['rid'])){
			$em_rid = 'Enter Resource_ID';
			$f = 0;
		} else{
			$resource_ID = $_POST['rid'];
		}

		if(empty($_POST['rtype'])){
			$em_rtype = 'Enter Resource Type';
			$f = 0;
		} else{
			$resource_type = $_POST['rtype'];
			//validating name
			if(!preg_match('/[a-zA-Z\s]+$/', $resource_type)){
				$em_rtype = 'Name must be letters and spaces only';
				$f = 0;
			}
		}

		if($f == 1){

			// echo $resource_ID,$resource_type;
			$conn = mysqli_connect("localhost", "root", "","dbmsproject");
	
			$result = mysqli_query($conn, "insert into resource values ('$resource_ID','$resource_type')");
			if($result == True){
				echo '<script>alert("Insertion into table successful")</script>';
			}
		}
	
	}
	
?>

<!DOCTYPE html>
<html>
	
	<?php include('../../templates/header1.php') ?>
				<ul id="nav-mobile" class="right hide-on-small-and-down">
					<li id="back"><a href="../manageresource.php" class="btn brand z-depth-0">Click to Return</a></li>
				</ul>
			</div>
		</nav>

	<h4 class="center grey-text">Enter Resource Details to be added</h4>
	<section class="container grey-text">
		<form class="white" action="addresource.php" method="POST">

			<label style="font-weight: bold;" class="ftext">Resource_ID:</label>
			<input type="text" name="rid" value="<?php echo $resource_ID?>">
			<div class="right" id="errormessage">
				<?php
					echo $em_rid;
				?>
			</div>

			<label style="font-weight: bold;" class="ftext">Resource Type:</label>
			<input type="text" name="rtype" value="<?php echo $resource_type ?>">
			<div class="right" id="errormessage">
				<?php
					echo $em_rtype;
				?>
			</div>

			<div class="center" style="margin-top: 30px;">
				<span class="ftext1">
					<input type="submit" name="submit" value="CONFIRM & ADD RESOURCE" class="btn brand z-depth-0">
				</span>
			</div>

		</form>
	</section>
	
	<?php include('../../templates/footer.php') ?>

</html>