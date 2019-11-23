
<?php include("includes/admin_header.php"); ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include("includes/admin_navigation.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome to Admin Panel
                            <small><?php echo $_SESSION['user_name']; ?></small>
                        </h1>

                        <?php
if (isset($_SESSION['user_name'])) {
 $profile_name = $_SESSION['user_name'];
 $query = "SELECT * FROM users WHERE user_name = '$profile_name' ";
  $profile_select_query = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($profile_select_query)) {
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $user_name = $row['user_name'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
}}?>

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
    <input type="submit" class="btn btn-primary" name="edit_profile">
  </div>

</form>

<?php 
if (isset($_POST['edit_profile'])) {
     $user_firstname = $_POST['user_firstname'];
     $user_lastname = $_POST['user_lastname'];
     $user_role = $_POST['user_role'];
     $user_name = $_POST['user_name'];
     $user_email = $_POST['user_email'];
     $user_password = $_POST['user_password'];
     // $user_image = $_FILES['image']['name'];
     // $user_image_temp = $_FILES['image']['tmp_name'];
    $query = "UPDATE `users` SET `user_name` = '$user_name', `user_password` = '$user_password', `user_firstname` = '$user_firstname', `user_lastname` = '$user_lastname', `user_email` = '$user_email', `user_role` = '$user_role', `randsalt` = '' WHERE `users`.`user_name` = '$profile_name' ";
    $edit_user = mysqli_query($con, $query);
    confirmQuery($edit_user);
    if ($edit_user) {
       header("Location: users.php");
    }}?>
                        
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
