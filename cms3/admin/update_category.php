<form action="" method="post">
                  <?php //update category
                  if (isset($_GET['edit'])) {
                     $edit_id = $_GET['edit'];
                     $edit_selection_query = "SELECT * FROM nav_items WHERE nav_item_id = $edit_id ";
                     $edit_selection_query_run = mysqli_query($con, $edit_selection_query);
                     while ($edit_selection_query_row = mysqli_fetch_assoc($edit_selection_query_run)) {
                      $edit_title = $edit_selection_query_row['nav_item_title'];
                      ?>
                    <div class="form-group">
                     <label for="category">EDIT Name:</label>
                     <input type="text" class="form-control" value="<?php if(isset($_GET['edit'])){echo $edit_title; } ?>" name="edit_category">
                   </div>
                      <?php }} ?>
                      <?php 
                      if (isset($_POST['edit_submit'])) {
                          $edit_title = $_POST['edit_category'];
                          $update_query = "UPDATE `nav_items` SET `nav_item_title` = '$edit_title' WHERE `nav_items`.`nav_item_id` = $edit_id ";
                          $update_query_run = mysqli_query($con, $update_query);
                          if (!$update_query_run) {
                            die('query failed' . mysqli_query($con));
                          }}?>
                   
                    <input type="submit" class="btn btn-primary" value="edit Category" name="edit_submit">
                 </form>