<?php 
function confirmQuery($result){
	global $con;
	if (!$result) {
		die("QUERY FAILED" . mysqli_error($con));
	}
}
 ?>