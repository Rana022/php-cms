<?php include("includes/header.php"); ?>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <!-- top bar section -->
  <?php include("includes/navbar.php"); ?>
  <!-- intro -->
  <div id="intro">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto">
          <h1 class="text-center">killer video tuitorial</h1>
        </div>
      </div>
    </div>
    </div>
  </div>
  <!-- post-section -->
  <div id="post-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <?php
          if(isset($_GET['single_p_id'])){
            $get_id = $_GET['single_p_id'];
          $post_query = "SELECT * FROM posts WHERE post_id = $get_id";
          $post_query_run = mysqli_query($con, $post_query);
          while ($post_query_row = mysqli_fetch_assoc($post_query_run)) {
                $post_id = $post_query_row['post_id'];
                $post_title = $post_query_row['post_title'];
                $post_date = $post_query_row['post_date'];
                $post_category = $post_query_row['post_category'];
                $post_image = $post_query_row['post_image'];
                $post_content = $post_query_row['post_content'];
                $post_tags = $post_query_row['post_tags'];
           ?>
          <div class="post">
            <h1><a href="#"><?php echo $post_title; ?></a></h1>                <p><?php echo $post_date; ?> <span>posted in:</span> <a href=""><?php echo $post_category; ?></a></p> 
                <div class="link-image">
                  <a href="post.php?single_p_id=<?php echo $post_id; ?>"><img width="100%"  src="img/<?php echo $post_image; ?>" alt=""></a>
                </div>
            <div class="post-details">
              <p><?php echo $post_content; ?></p>
            </div>
            <hr>
          </div>
        <?php }} ?>
          <!-- button -->
           <!-- comment-here -->
           <div class="well"> 
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">

            <?php 
            if (isset($_POST['create-comment'])) {
            $get_id = $_GET['single_p_id'];
            $author = $_POST['comment_author'];
            $email = $_POST['comment_email'];
            $content = $_POST['comment_content'];
           
            $qquery= "INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES (NULL, '$get_id ', '$author', '$email ', '$content', 'unapproved', now())";
            $insert_comments = mysqli_query($con, $qquery);
            if ($insert_comments) {
              echo "Your Comments Added to Admin Panel.";
            }
           }?>

                         <div class="form-group">
                         <label for="author">Author</label>
                         <input type="text" class="form-control" name="comment_author">
                         </div>

                         <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                        <label for="comment">Comment Here</label>
                        <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>

                       <input type="submit" class="btn btn-primary" name="create-comment" value="Submit">
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php 
                $query = "SELECT * FROM comments WHERE comment_post_id = $get_id AND comment_status = 'approved' ORDER BY comment_id DESC ";
                $show_comment = mysqli_query($con, $query);
                while ($show_comment_row = mysqli_fetch_assoc($show_comment)) {
                      $cmt_author = $show_comment_row['comment_author'];
                      $cmt_date = $show_comment_row['comment_date'];
                      $cmt_content = $show_comment_row['comment_content'];
            
                 ?>

              <!-- Comment -->
              <div class="media">
                <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                <h4 class="media-heading"><?php echo $cmt_author; ?>
                <small><?php echo $cmt_date; ?></small>
                </h4>
               <?php echo $cmt_content; ?>
                </div>
              </div>
            <?php } ?>
                <!-- Comment -->
        </div>
        <!-- sidebar -->
        <?php include("includes/sidebar.php"); ?>
      </div>
    </div>
  </div>
<!-- footer-section -->
<?php include("includes/footer.php"); ?>