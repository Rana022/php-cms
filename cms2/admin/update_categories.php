<?php  ?>

<form action="" method="post">
    <?php 
    if (isset($_GET['edit'])) {
       $edit_id = $_GET['edit'];
       $edit_query = "SELECT * FROM categories WHERE cat_id = $edit_id";
       $edit_query_run = mysqli_query($con, $edit_query);
       while ($edit_query_row = mysqli_fetch_assoc($edit_query_run)) {
            $edit_title = $edit_query_row['cat_title'];
            $edit_id = $edit_query_row['cat_id'];
            ?>
            <div class="form-group">
            <label for="" class="cat-title">Add Category</label>
            <input type="text" class="form-control" name="update-title" value="<?php if(isset($_GET['edit'])){echo $edit_title;} ?>">
            </div>
            <?php }}?>
            <?php
            if (isset($_POST['edit_submit'])) {
              global $con;
               $update_title = $_POST['update_title'];
               $update_query = "UPDATE `categories` SET `cat_title` = '$update_title' WHERE `categories`.`cat_id` = $edit_id";
               $update_query_run = mysqli_query($con, $update_query);
               if (!$update_query_run) {
                  die("QUERY FAILED" . mysqli_error($con));
               }
            }


             ?>
<div class="form-group">
<input type="submit" class="btn btn-primary" name="edit_submit" value="Category">
</div>
</form>                            
                            