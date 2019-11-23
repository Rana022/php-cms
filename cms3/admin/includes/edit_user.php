<?php
if (isset($_GET['update_user'])) {
  $edit_id = $_GET['update_user'];
  $query = "SELECT * FROM users WHERE user_id = $edit_id";
  $edit_select = mysqli_query($con, $query);
  confirmQuery($edit_select);
  while ($row = mysqli_fetch_assoc($edit_select)) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_fname = $row['user_fname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_password = $row['user_password'];
        $user_role = $row['user_role'];
        
  }
}
 ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>User Full Name</label>
    <input type="text" class="form-control" placeholder="User Full Name" name="user_fname" value="<?php echo $user_fname;?>">
  </div>

  <div class="form-group">
    <label>User Name</label>
    <input type="text" class="form-control" placeholder="User Full Name" name="user_name" value="<?php echo $user_name;?>">
  </div>

  <div class="form-group">
    
    <select name="user_role" id="">
      <?php 
    if ($user_role =='admin') {
      echo "<option value='admin'>admin</option>";
    }else{
      echo "<option value='subscriber'>subscriber</option>";
    }?>
    <option value="admin">admin</option>
    <option value="subscriber">subscriber</option>
    </select>
  </div>

  <div class="form-group">
    <label>User_email</label>
    <input type="email" class="form-control" placeholder="user_email" name="user_email" value="<?php echo $user_email;?>">
  </div>

  <div class="form-group">
    <label>User_password </label>
    <input type="password" class="form-control" placeholder="User_password" name="user_password" value="<?php echo $user_password;?>">
  </div>
  <div class="form-group">
    <label>user_image</label>
    <input type="file" placeholder="user_image" name="user_image">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update">
  </div>

</form>
<?php 
if (isset($_POST['update'])) {
   $user_fname = $_POST['user_fname'];
   $user_name = $_POST['user_name'];
   $user_role = $_POST['user_role'];
   $user_email = $_POST['user_email'];
   $user_password = $_POST['user_password'];
   $query = "UPDATE `users` SET `user_name` = '$user_name', `user_fname` = '$user_fname', `user_date` = now(), `user_email` = '$user_email', `user_password` = '$user_password', `user_role` = '$user_role' WHERE `users`.`user_id` = $edit_id";
   $update_user = mysqli_query($con, $query);
   confirmQuery($update_user);
   if ($update_user) {
        echo "User Updated:" . " " . "<a href='users.php'>View Update</a>";
   }}?>