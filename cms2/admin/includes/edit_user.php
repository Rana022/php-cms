<?php
if (isset($_GET['edit'])) {
 $edit_id = $_GET['edit'];
 $query = "SELECT * FROM users WHERE user_id = $edit_id";
  $edit_select_query = mysqli_query($con, $query);
  while ($edit_query_row = mysqli_fetch_assoc($edit_select_query)) {
    $user_firstname = $edit_query_row['user_firstname'];
    $user_lastname = $edit_query_row['user_lastname'];
    $user_role = $edit_query_row['user_role'];
    $user_name = $edit_query_row['user_name'];
    $user_email = $edit_query_row['user_email'];
    $user_password = $edit_query_row['user_password'];
}
}                       
 ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" placeholder="First Name here" name="user_firstname" value="<?php echo $user_firstname; ?>">
  </div>


  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" placeholder="Last Name here" name="user_lastname" value="<?php echo $user_lastname; ?>">
  </div>

   <div class="form-group">
    <select name="user_role" id="">
      <option value="subscriber"><?php echo $user_role; ?></option>
      <?php 
      if ($user_role == 'admin') {
        echo " <option value='subscriber'>subscriber</option>";
      }else{
        echo " <option value='admin'>admin</option>";
      }?>
    </select>
  </div>

 
  <div class="form-group">
    <label>User Name</label>
    <input type="text" class="form-control" placeholder="User Name here" name="user_name" value="<?php echo $user_name; ?>">
  </div>

 

  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Email" name="user_email" value="<?php echo $user_email; ?>">
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Password" name="user_password" value="<?php echo $user_password; ?>">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user">
  </div>

</form>
<?php 
if (isset($_POST['edit_user'])) {
     $user_firstname = $_POST['user_firstname'];
     $user_lastname = $_POST['user_lastname'];
     $user_role = $_POST['user_role'];
     $user_name = $_POST['user_name'];
     $user_email = $_POST['user_email'];
     $user_password = $_POST['user_password'];
     // $user_image = $_FILES['image']['name'];
     // $user_image_temp = $_FILES['image']['tmp_name'];
    $query = "UPDATE `users` SET `user_name` = '$user_name', `user_password` = '$user_password', `user_firstname` = '$user_firstname', `user_lastname` = '$user_lastname', `user_email` = '$user_email', `user_role` = '$user_role', `randsalt` = '' WHERE `users`.`user_id` = $edit_id ";
    $edit_user = mysqli_query($con, $query);
    confirmQuery($edit_user);
    if ($edit_user) {
       header("Location: users.php");
    }
}

 ?>