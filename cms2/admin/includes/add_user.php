<?php 
if (isset($_POST['create_user'])) {
     $user_firstname = $_POST['user_firstname'];
     $user_lastname = $_POST['user_lastname'];
     $user_role = $_POST['user_role'];
     $user_name = $_POST['user_name'];
     $user_email = $_POST['user_email'];
     $user_password = $_POST['user_password'];
     // $user_image = $_FILES['image']['name'];
     // $user_image_temp = $_FILES['image']['tmp_name'];
    $query = "INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_image`, `user_email`, `user_role`, `randsalt`) VALUES (NULL, '$user_name', '$user_password', '$user_firstname', '$user_lastname', '', '$user_email', '$user_role', '')";
    $create_user = mysqli_query($con, $query);
    confirmQuery($create_user);
    if ($create_user) {
       header("Location: users.php");
    }
}

 ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" placeholder="First Name here" name="user_firstname">
  </div>


  <div class="form-group">
    <label>Lastt Name</label>
    <input type="text" class="form-control" placeholder="Last Name here" name="user_lastname">
  </div>

   <div class="form-group">
    <select name="user_role" id="">
      <option value="subscriber">Select option</option>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
    </select>
  </div>

 
  <div class="form-group">
    <label>User Name</label>
    <input type="text" class="form-control" placeholder="User Name here" name="user_name">
  </div>

 

  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Email" name="user_email">
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Password" name="user_password">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user">
  </div>

</form>