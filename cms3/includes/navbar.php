<div id="tbar">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <?php
          $nav_item_query = "SELECT * FROM nav_items";
          $nav_item_query_run = mysqli_query($con, $nav_item_query);
         
           ?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-toggle-on" aria-hidden="true"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                  </li>
                    <?php 
                       while ($nav_item_query_row = mysqli_fetch_assoc($nav_item_query_run)) {
                       $nav_title = $nav_item_query_row['nav_item_title'];
                       $nav_id = $nav_item_query_row['nav_item_id'];
                     ?>
                  <li class="nav-item">
                    <a class="nav-link" href="nav_posts.php?n_posts=<?php echo $nav_id; ?>"><?php echo $nav_title; ?></a>
                  </li>
                 <?php } ?> 
                 <li class="nav-item">
                    <a class="nav-link" href="admin/index.php">Admin</a>
                  </li>
                  <?php 
                  if (isset($_SESSION['user_role'])) {
                    if (isset($_GET['single_p_id'])) {
                     $select_edit = $_GET['single_p_id'];
                     echo "<li><a href='admin/posts.php?source=update&up_id=$select_edit;'>Edit Post</a> </li>";
                    }}?>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>