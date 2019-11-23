<br>
<h1>CREATE YOUR POST HERE</h1>
<?php
if (isset($_POST['create_post'])) {
   $post_title = $_POST['title'];
   $post_category = $_POST['category'];
   $post_image = $_FILES['image']['name'];
   $post_image_temp = $_FILES['image']['tmp_name'];
   $post_tags = $_POST['tags'];
   $post_status = $_POST['post_status'];
   $post_content = $_POST['content'];
   $post_date = date("d.m.y");
   
   move_uploaded_file($post_image_temp, "../img/$post_image");

   $query ="INSERT INTO `posts` (`post_id`, `post_title`, `post_date`, `post_category`, `post_image`, `post_content`, `post_tags`, `post_status`) VALUES (NULL, '$post_title', '$post_date', '$post_category', '$post_image', '$post_content', '$post_tags', '$post_status')";
   $create_post = mysqli_query($con, $query);
   confirmQuery($create_post);
   if ($create_post) {
    echo "Post Created:" . " " . "<a href='posts.php'>View Post</a>";
   }
}

 ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>post title</label>
    <input type="text" class="form-control" placeholder="post title here" name="title">
  </div>

  <div class="form-group">
    <select name="category" id="">
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
  
  <div class="form-group">
    <label>post image</label>
    <input type="file" placeholder="post image" name="image">
  </div>
  
  <div class="form-group">
    <label>post tags</label>
    <input type="text" class="form-control" placeholder="post tags" name="tags">
  </div>

  <div class="form-group">
    <select name="post_status" id="">
     <option value="pulished">Pulish</option>
     <option value="draft">Draft</option>
    </select>
  </div>

  <div class="form-group">
    <label>post content</label>
    <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="post content here"></textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post">
  </div>
</form>
