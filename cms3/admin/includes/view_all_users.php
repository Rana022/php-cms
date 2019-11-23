
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
 <!-- navbar-section -->
 <div id="wrapper">
    <?php include("includes/navigation.php");?>

 <!--  sidebar /main section -->
     <div class="sbar">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-9">
             <div class="dboard">
               <h1><i class="fa fa-users fa-2x" aria-hidden="true"></i>Users <small>View All Users</small></h1>
               <ol class="breadcrumb">
                 <li><a href=""><i class="fa fa-tachometer"></i>Dashboard</a></li>
                  <li class="active"><i class="fa fa-users"></i>Users</li>
               </ol>
             </div> 
             <div class="row">
               <div class="col-sm-8">
                 <form action="">
                   <div class="row">
                     <div class="col-sm-4">
                       <div class="form-group">
                         <select name="" id="" class="form-control">
                           <option value="delet">Delet</option>
                           <option value="author">Change to Aurhor</option>
                           <option value="admin">Change to Admin</option>
                         </select>
                       </div>
                     </div>
                     <div class="col-sm-8">
                       <input type="submit" class="btn btn-success" value="Apply">
                       <a href="" class="btn btn-primary">Add New</a>
                     </div>
                   </div>
                 </form>
               </div>
             </div> 
            <table class="table table-hover table-striped table-bordered">
              <tr>
                <th><input type="checkbox"></th>
                <th>sr</th>
                <th>Date</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Image</th>
                <th>Password</th>
                <th>Role</th>
                <th>Posts</th>
                <th>Edit</th>
                <th>Delet</th>
              </tr>
              <?php 
              $query = "SELECT * FROM users";
              $all_user = mysqli_query($con, $query);
              while ($row = mysqli_fetch_assoc($all_user)) {
                   $user_id = $row['user_id'];
                   $user_name = $row['user_name'];
                   $user_fname = $row['user_fname'];
                   $user_email = $row['user_email'];
                   $user_image = $row['user_image'];
                   $user_password = $row['user_password'];
                   $user_role = $row['user_role'];
                   $user_date = $row['user_date'];
                   $user_id = $row['user_id'];
               ?>
              <tr>
                <td><input type="checkbox"></td>
                <td>1</td>
                <td><?php echo $user_date; ?></td>
                <td><?php echo $user_fname; ?></td>
                <td><?php echo $user_name; ?></td>
                <td><?php echo $user_email; ?></td>
                <td><img src="" alt=""></td>
                <td><?php echo $user_password; ?></td>
                <td><?php echo $user_role; ?></td>
                <td>11</td>
                <td><a href="users.php?source=edit_user&update_user=<?php echo $user_id; ?>"><i class="fa fa-pencil"></i></a></td>
                <td><a href="users.php?delete=<?php echo $user_id; ?>"><i class="fa fa-times"></i></a></td>
              </tr>
            <?php } ?>
            </table>  
           </div>
         </div>
       </div>
     </div>
          <!-- footer-section -->
           <?php
            if (isset($_GET['delete'])) {
             $delete_id = $_GET['delete'];
             $query = "DELETE FROM users WHERE user_id = $delete_id";
             $delete_post = mysqli_query($con, $query);
             header("Location: users.php");
             confirmQuery($delete_post);
            }
             ?>
    