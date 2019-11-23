<?php 
if (isset($_POST['create_post'])) {
     $post_author = $_POST['author'];
     $post_title = $_POST['title'];
     $post_category_id = $_POST['post_category'];
     $post_status = $_POST['status'];
     $post_image = $_FILES['image']['name'];
     $post_image_temp = $_FILES['image']['tmp_name'];
     $post_tags = $_POST['tags'];
     $post_content = $_POST['content'];
     $post_comment_count = 4;
     $post_date = date('d.m.y');

     move_uploaded_file($post_image_temp, "../images/$post_image");
    $query = "INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_user`, `post_veiw_count`) VALUES (NULL, '$post_category_id', '$post_title', '$post_author', '$post_date', '$post_image', '$post_content', '$post_tags', '$post_comment_count', '$post_status', '', '')";
    $post_query = mysqli_query($con, $query);
    confirmQuery($post_query);
    if ($post_query) {
       header("Location: posts.php");
    }
}

 ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>post title</label>
    <input type="text" class="form-control" placeholder="post title here" name="title">
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
    <input type="text" class="form-control" placeholder="post author" name="author">
  </div>

  <div class="form-group">
    <label>post status</label>
    <input type="text" class="form-control" placeholder="post status" name="status">
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
    <label>post content</label>
    <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="post content here"></textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post">
  </div>

</form>