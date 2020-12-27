<?php	
	$Log = [];
	$USN = [];
	$RID = [];
	$TS = [];
	
	$conn = mysqli_connect("localhost", "root", "","dbmsproject");
	
			//query the database for users
	$result = mysqli_query($conn, "select * from resourceutilization")
				or die("Failed to query database");

	$n = mysqli_num_rows($result);

	$i = 0;
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$Log[$i] = $row['Log_number'];
		$USN[$i] = $row['USN'];
		$RID[$i] = $row['Resource_ID'];
		$TS[$i] = $row['time_stamp'];
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
	
	<?php include('../../templates/header1.php') ?>
	<ul id="nav-mobile" class="right hide-on-small-and-down">
					<li><a href="../manageresource.php" class="btn brand z-depth-0" style="margin-right: -45px;">Click to Return</a></li>
				</ul>
			</div>
		</nav>
	<h4 class="center grey-text">Resource Usage Summary</h4>
	<section class="white container grey-text" style="width: 400px">
		<form class="white grey-text" action="resourceusage.php" method="POST" style="margin-left:-10px">
            <?php
            	echo "<table>";
			    echo '<tr style="font-weight: bold; font-size: 17px">';
			    echo '<td class="table">Log Number</td>';
			    echo '<td class="table">Student USN</td>';
			    echo '<td class="table">Resource ID</td>';
			    echo '<td class="table">Time Stamp</td>';
			    echo "</tr>";
			    $i = 0;
			    while($i < $n){
			    	echo '<tr>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $Log[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $USN[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $RID[$i];
			    	echo '</span>';
			    	echo '</td>';
			    	echo '<td style="border: 2px solid darkgray">';
			    	echo '<span class="ftext" style="color:gray">';
			    	echo $TS[$i];
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