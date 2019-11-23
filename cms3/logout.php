<?php session_start(); ?>
<?php 
    $_SESSION['user_name'] = null;
	$_SESSION['user_fname'] = null;
	$_SESSION['user_email'] = null;
	$_SESSION['user_password'] = null;
	$_SESSION['user_role'] = null;
	$_SESSION['user_date'] = null;
	header("Location: index.php");
 ?>