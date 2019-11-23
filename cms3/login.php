<?php include("includes/db.php"); ?>
<?php session_start(); ?>
<?php include("admin/function.php"); ?>
<?php 
if (isset($_POST['submit_login'])) {
	$user_name = $_POST['username'];
	$user_password = $_POST['password'];

	$user_name = mysqli_real_escape_string($con, $user_name);
	$user_password = mysqli_real_escape_string($con, $user_password);

	$query ="SELECT * FROM users WHERE user_name = '$user_name' ";
	$select_login = mysqli_query($con, $query);
	confirmQuery($select_login);
	while ($row = mysqli_fetch_array($select_login)) {
		           $db_user_id = $row['user_id'];
                   $db_user_name = $row['user_name'];
                   $db_user_fname = $row['user_fname'];
                   $db_user_password = $row['user_password'];
                   $db_user_role = $row['user_role'];
		
	}if ($user_name !== $db_user_name && $user_password !== $db_user_password) {
		header("Location: index.php");
	}
	else if ($user_name == $db_user_name && $user_password == $db_user_password) {
					$_SESSION['user_name'] = $db_user_name;
					$_SESSION['user_fname'] = $db_user_fname;
					$_SESSION['user_email'] = $db_user_email;
					$_SESSION['user_password'] = $db_user_password;
					$_SESSION['user_role'] = $db_user_role;
					$_SESSION['user_date'] = $db_user_date;
		        header("Location: admin/index.php");
	}else{
		        header("Location: index.php");
	}
}

 ?>