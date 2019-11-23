<?php include("includes/header.php");?>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
 <!-- navbar-section -->
 <div id="wrapper">
    <?php include("includes/navigation.php");?>

 <!--  sidebar /main section -->
 <br><br>
     <div class="sbar">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-3">
             <?php include("includes/sidebar.php");?>
           </div>

           <div class="col-md-9">
             <div class="dboard">
               <h1><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i>Dashboard <small>Stastistic Overview</small></h1>
               <ol class="breadcrumb">
                 <li> <a href="index.html"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                 <li class="active"> <i class="fa fa-folder-open" aria-hidden="true"></i>Categories</li>
               </ol>
             </div>  
             <div class="row">
               <div class="col-md-6">
                <?php 
                   if (isset($_POST['submit'])) {
                    $category_title = $_POST['category'];
                    if ($category_title =="" || empty($category_title)) {
                      echo "this should not be empty";
                    }else{
                      $cat_query = "INSERT INTO `nav_items` (`nav_item_id`, `nav_item_title`) VALUES (NULL, '$category_title')";
                      $cat_query_run = mysqli_query($con, $cat_query);
                      if (!$cat_query_run) {
                        die("query failed" . mysqli_error($con));
                      } }} ?>



                 <form action="" method="post">
                   <div class="form-group">
                     <label for="category">Category Name:</label>
                     <input type="text" class="form-control" placeholder="Enter Category Name" name="category">
                   </div>
                    <input type="submit" class="btn btn-primary" value="Add Category" name="submit">
                 </form>
                
                

           <?php  
           if (isset($_GET["edit"])) {
              $edit_id = $_GET['edit'];
              include("update_category.php");
           }?>
           
               </div>
               <div class="col-md-6">
                 <table class="table table-striped table-bordered table-hover">
                   <tr>
                     <th>Sr</th>
                     <th>Category Name</th>
                     <th>Posts</th>
                     <th>Edit</th>
                     <th>Delete</th>
                   </tr>
                   <?php
                   $select_query = "SELECT * FROM nav_items";
                   $select_query_run = mysqli_query($con, $select_query);
                   while ($select_query_row = mysqli_fetch_assoc($select_query_run)) {
                     $nav_id = $select_query_row['nav_item_id'];
                     $nav_title = $select_query_row['nav_item_title'];
                    ?>
                   <tr>
                     <td><?php echo $nav_id; ?></td>
                     <td><?php echo $nav_title; ?></td>
                     <td>12</td>
                     <td><a href="category.php?edit=<?php echo $nav_id;?>"><i class="fa fa-pencil"></i></a></td>
                     <td><a href="category.php?del=<?php echo $nav_id;?>"><i class="fa fa-times"></i></a></td>
                   </tr>
                 <?php } ?>
                 <?php
                  if (isset($_GET['del'])){
                    $del_id = $_GET['del'];
                    $del_query = "DELETE FROM nav_items WHERE nav_item_id = $del_id ";
                    $del_query_run = mysqli_query($con, $del_query);
                 } ?>

                 </table>
               </div>
             </div>      
           </div>
         </div>
       </div>
     </div>
          <!-- footer-section -->
         <?php include("includes/footer.php");?>