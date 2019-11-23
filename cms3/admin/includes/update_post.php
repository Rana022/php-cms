<?php
if (isset($_GET['up_id'])) {
  $up_id = $_GET['up_id'];
  $query = "SELECT * FROM posts WHERE post_id = $up_id";
  $up_select = mysqli_query($con, $query);
  confirmQuery($up_select);
  while ($up_select_row = mysqli_fetch_assoc($up_select)) {
   $post_title = $up_select_row['post_title'];
   $post_category = $up_select_row['post_category'];
   $post_tags = $up_select_row['post_tags'];
   $post_status = $up_select_row['post_status'];
   $post_content = $up_select_row['post_content'];
   $post_image = $up_select_row['post_image'];
  }}?>
  <?php
if (isset($_POST['update_post'])) {
   $post_title = $_POST['title'];
   $post_category = $_POST['category'];
   $post_image = $_FILES['image']['name'];
   $post_image_temp = $_FILES['image']['tmp_name'];
   $post_tags = $_POST['tags'];
   $post_status = $_POST['post_status'];
   $post_content = $_POST['content'];
   $post_date = date("d.m.y");
   move_uploaded_file($post_image_temp, "../img/$post_image");
   if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $up_id";
        $image_catch = mysqli_query($con, $query);
        while ($image_fetch = mysqli_fetch_assoc($image_catch)) {
         $post_image = $image_fetch['post_image'];
    }
   }
   $query = "UPDATE `posts` SET `post_title` = '$post_title', `post_date` = '$post_date', `post_image` = '$post_image', `post_category` = '$post_category', `post_content` = '$post_content', `post_tags` = '$post_tags', `post_status` = '$post_status' WHERE `posts`.`post_id` = $up_id;";
   $update_post = mysqli_query($con, $query);
   confirmQuery($update_post);
   if ($update_post) {
    echo "<p class='bg-success p-2'>Post Updated. 
    <a href='../post.php?single_p_id=$up_id;'> View Posts</a> or <a href=''>Edit more</a></p>";
   }}?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>post title</label>
    <input type="text" class="form-control" placeholder="post title here" name="title" value="<?php echo $post_title; ?>">
  </div>

  <div class="form-group">
    <select name="category" id="" value="<?php echo $post_category; ?>">
      <?php
          $query = "SELECT * FROM nav_items";
          $nav_drop = mysqli_query($con, $query);
          confirmQuery($nav_drop);
          while ($query_row = mysqli_fetch_assoc($nav_drop)) {
          $nav_id = $query_row['nav_item_id'];
          $nav_title = $query_row['nav_item_title'];
          echo "<option value='$nav_id'>$nav_title</option>";
        }
          ?>
    </select>
  </div>
  <img width="100" src="../img/<?php echo $post_image; ?>"  alt="">
  <div class="form-group">
    
    <label>post image</label>
    <input type="file" placeholder="post image" name="image" >
  </div>
  
  <div class="form-group">
    <label>post tags</label>
    <input type="text" class="form-control" placeholder="post tags" name="tags" value="<?php echo $post_tags; ?>">
  </div>

  <div class="form-group">
    <select name="post_status" id="">
      <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
      <?php 
      if ($post_status == 'published') {
      echo "<option value='draft'>Draft</option>";
      }else{
      echo "<option value='published'>Publish</option>";
      }

       ?>
    </select>
  </div>

  <div class="form-group">
    <label>post content</label>
    <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="post content here">
      <?php echo $post_content; ?>
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post">
  </div>
</form>










