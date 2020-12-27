<?php

	$resource_ID = "";

	$em_rid = "";

	$f = 1;

	
	if(isset($_POST['submit'])){

		if(empty($_POST['rid'])){
			$em_rid = 'Enter Resource_ID';
			$f = 0;
		} else{
			$resource_ID = $_POST['rid'];
		}

		if($f == 1){

			// echo $resource_ID;
			$conn = mysqli_connect("localhost", "root", "","dbmsproject");
	
			$result = mysqli_query($conn, "DELETE from resource WHERE Resource_ID = '$resource_ID'");
			if($result == True){
				echo '<script>alert("Deletion from table successful")</script>';
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

	<h4 class="center grey-text">Enter Resource Details to be deleted</h4>
	<section class="container grey-text">
		<form class="white" action="removeresource.php" method="POST">

			<label style="font-weight: bold;" class="ftext">Resource_ID:</label>
			<input type="text" name="rid" value="<?php echo $resource_ID?>">
			<div class="right" id="errormessage">
				<?php
					echo $em_rid;
				?>
			</div>

			<div class="center" style="margin-top: 30px;">
				<span class="ftext1">
					<input type="submit" name="submit" value="CONFIRM & REMOVE RESOURCE" class="btn brand z-depth-0">
				</span>
			</div>

		</form>
	</section>
	
	<?php include('../../templates/footer.php') ?>

</html>