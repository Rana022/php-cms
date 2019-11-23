<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                 if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $search_query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $search_query_run = mysqli_query($con, $search_query);
                    if (!$search_query_run) {
                       die("query failed". mysqli_error($con));
                    }
                    $search_count = mysqli_num_rows($search_query_run);
                    if ($search_count == 0) {
                       echo "<h1 class='text-center'>no result found</h1>";
                    }else{
                while ($post_query_row = mysqli_fetch_assoc($search_query_run)) {
                    $post_title = $post_query_row['post_title'];
                    $post_author = $post_query_row['post_author'];
                    $post_date = $post_query_row['post_date'];
                    $post_image = $post_query_row['post_image'];
                    $post_content = $post_query_row['post_content'];
                    ?>
               
                <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
                </h1>
                <!-- First Blog Post -->
                <h2>  <a href="#"><?php echo $post_title; ?></a></h2>
                <p class="lead"> by <a href="index.php"><?php echo $post_author; ?></a></p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="img/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            <?php } } }?>












                
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php"); ?>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <?php include("includes/footer.php"); ?>
