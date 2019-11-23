<h1>ADD USER</h1>
<?php
if (isset($_POST['create_user'])) {
   $user_fname = $_POST['user_fname'];
   $user_name = $_POST['user_name'];
   $user_role = $_POST['user_role'];
   $user_email = $_POST['user_email'];
   $user_password = $_POST['user_password'];
   $user_image = $_POST['user_image'];
   
   
   move_uploaded_file($post_image_temp, "../img/$post_image");

   $query ="INSERT INTO `users` (`user_id`, `user_name`, `user_fname`, `user_date`, `user_email`, `user_image`, `user_password`, `user_role`) VALUES (NULL, '$user_name', '$user_fname', now(), '$user_email', '', '$user_password', '$user_role')";
   $create_user = mysqli_query($con, $query);
   confirmQuery($create_user);
   if ($create_user) {
     echo "User Created:" . " " . "<a href='users.php'>View User</a>";
   }
}
 ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>User Full Name</label>
    <input type="text" class="form-control" placeholder="User Full Name" name="user_fname">
  </div>

  <div class="form-group">
    <label>User Name</label>
    <input type="text" class="form-control" placeholder="User Full Name" name="user_name">
  </div>

  <div class="form-group">
    <select name="user_role" id="">
      <option value="subscriber">select options</option>
      <option value="admin">admin</option>
      <option value="subscriber">subscriber</option>
    </select>
  </div>

  <div class="form-group">
    <label>User_email</label>
    <input type="email" class="form-control" placeholder="user_email" name="user_email">
  </div>

  <div class="form-group">
    <label>User_password </label>
    <input type="password" class="form-control" placeholder="User_password" name="user_password">
  </div>

  
  
  <div class="form-group">
    <label>user_image</label>
    <input type="file" placeholder="user_image" name="user_image">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user">
  </div>

</form>