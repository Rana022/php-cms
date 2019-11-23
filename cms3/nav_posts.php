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
          if(isset($_GET['n_posts'])){
           $n_posts_id = $_GET['n_posts'];
          
          $post_query = "SELECT * FROM posts WHERE post_category = $n_posts_id";
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
            <h1><a href="post.php?single_p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h1>
                <p><?php echo $post_date; ?><span>posted in:</span> <a href=""><?php echo $post_category; ?></a></p> 
                <div class="link-image">
                  <a href=""><img width="100%"  src="img/<?php echo $post_image; ?>" alt=""></a>
                </div>
            <div class="post-details">
              <p><?php echo $post_content; ?></p>
            </div>
            <hr>
          </div>
        <?php }} ?>
          <!-- button -->
        </div>
        <!-- sidebar -->
        <?php include("includes/sidebar.php"); ?>
      </div>
    </div>
  </div>
<!-- footer-section -->
<?php include("includes/footer.php"); ?>