<?php
		
	// if(isset($_GET['submit'])){
	// 	echo $_GET['email'];
	// 	echo $_GET['password'];
	// }

	$em_usn = "";
	$em_resourceid = "";

	$usn = $resourceid = "";
	
	if(isset($_POST['submit'])){
		// echo htmlspecialchars($_POST['email']);
		// echo htmlspecialchars($_POST['password']);

		//check name
		if(empty($_POST['usn'])){
			$em_usn = 'A USN is required <br />';
		} else{
			$usn = $_POST['usn'];
			//validating usn
			if(!preg_match('/[a-zA-Z0-9\s]+$/', $usn)){
				$em_usn = 'USN must be alphanumeric only';
			}
		}

		//check email
		if(empty($_POST['resourceid'])){
			$em_resourceid = 'A resourceid is required <br/>';
		} else {
			$resourceid = $_POST['resourceid'];
			//validating rid
			if(!preg_match('/[a-zA-Z0-9\s]+$/', $resourceid)){
				$em_resourceid = 'Resourceid must be alphanumeric only';
			}
		}

		if($em_usn == "" && $em_resourceid == ""){
			// echo $usn,$resourceid;
			$ts = date("Y-m-d h:i:s");
			$conn = mysqli_connect("localhost", "root", "","dbmsproject");
			$result1 = mysqli_query($conn, "select * from student where USN = '$usn'")
						or die("Failed to query database");
			$m = mysqli_num_rows($result1);
			if($m != 0){
				$result = mysqli_query($conn, "insert into resourceutilization values ('NULL','$usn',
					'$resourceid','$ts')");
				if($result == True){
					echo '<script>
					alert("Successfully Updated Resource!");
					window.location.href="./index.php";
					</script>';
				}
			}
			else{
				echo '<script>
					alert("USN not found in records!");
					window.location.href="./updateresource.php";
					</script>';
			}
		}
	} //end of post check

?>

<!DOCTYPE html>
<html>

	<style>
	body {
	  background-image: url('./bg1.jpg');
	  background-repeat: no-repeat;
	  background-attachment: fixed;
  	  background-size: 100% 100%;
	}
	</style>
	
	<?php include('templates/header.php') ?>

	<section class="container grey-text">
		<h4 class="center">Enter Resource Details</h4>
		<form class="white" action="updateresource.php" method="POST">
			<label class="ftext">USN:</label>
			<input type="text" name="usn" value="<?php echo $usn?>">
			<div class="right" id="errormessage">
				<?php
					echo $em_usn;
				?>
			</div>
			<label class="ftext">Resource ID:</label>
			<input type="text" name="resourceid" value="<?php echo $resourceid?>">
			<div class="right" id="errormessage">
				<?php
					echo $em_resourceid;
				?>
			</div>
			<!-- <label class="ftext">Your Password:</label>
			<input type="text" name="password"> -->
			<div class="center" style="margin-top: 25px">
				<span class="ftext1">
					<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
				</span>
			</div>
		</form>
	</section>

	<?php include('templates/footer.php') ?>

</html>