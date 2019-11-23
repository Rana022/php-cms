<?php
if (isset($_GET['update'])) {
 $update_id = $_GET['update'];
 $query = "SELECT * FROM posts WHERE post_id = $update_id";
  $update_select_query = mysqli_query($con, $query);
  while ($update_query_row = mysqli_fetch_assoc($update_select_query)) {
    $post_id = $update_query_row['post_id'];
    $post_author = $update_query_row['post_author'];
    $post_title = $update_query_row['post_title'];
    $post_category_id = $update_query_row['post_category_id'];
    $post_status = $update_query_row['post_status'];
    $post_image = $update_query_row['post_image'];
    $post_tags = $update_query_row['post_tags'];
    $post_comment_count = $update_query_row['post_comment_count'];
    $post_date = $update_query_row['post_date'];
    $post_content = $update_query_row['post_content'];
}
}                       
 ?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>post title</label>
    <input type="text" class="form-control" placeholder="post title here" name="title" value="<?php echo $post_title;?>">
  </div>

  <div class="form-group">
    <select name="post_category" id="">
      <?php
      $query = "SELECT * FROM categories";
       $select_category = mysqli_query($con, $query);
       confirmQuery($select_category);
       while ($select_category_row = mysqli_fetch_assoc($select_category)) {
            $category_title = $select_category_row['cat_title'];
            $category_id = $select_category_row['cat_id'];
            echo "<option value='$category_id'>$category_title</option>";
          }
       ?>

    </select>
  </div>

  <div class="form-group">
    <label>post author</label>
    <input type="text" class="form-control" placeholder="post author" name="author" value="<?php echo $post_author;?>">
  </div>

  <div class="form-group">
    <label>post status</label>
    <input type="text" class="form-control" placeholder="post status" name="status" value="<?php echo $post_status;?>">
  </div>

  <div class="form-group">
   <img src="../images/<?php echo $post_image ?>" alt="" width="100">
   <br>
    <label>post image</label>
    <input type="file" placeholder="" name="image">
  </div>

  <div class="form-group">
    <label>post tags</label>
    <input type="text" class="form-control" placeholder="post tags" name="tags" value="<?php echo $post_tags;?>">
  </div>

  <div class="form-group">
    <label>post content</label>
    <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="post content here">
      <?php echo $post_content;?>
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post">
  </div>
</form>
<?php
if (isset($_POST['update_post'])) {

    $post_author = $_POST['author'];
    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");
    $u_query ="UPDATE `posts` SET `post_category_id` = '$post_category_id', `post_title` = '$post_title', `post_author` = '$post_author', `post_date` = 'now()', `post_content` = '$post_content', `post_tags` = '$post_tags', `post_image` = '$post_image', `post_status` = '$post_status' WHERE `posts`.`post_id` = $update_id";
    $update_query = mysqli_query($con, $u_query);
    confirmQuery($update_query);
    if ($update_query) {
       header("Location: posts.php");
    }
  }

 ?>