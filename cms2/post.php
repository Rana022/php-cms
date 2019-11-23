<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                if (isset($_GET['p_id'])) {
                   $the_p_id = $_GET['p_id'];
                $query = "SELECT * FROM posts WHERE post_id = $the_p_id";
                $select_post_query = mysqli_query($con, $query);
                confirmQuery($select_post_query);
                while ($post_query_row = mysqli_fetch_assoc($select_post_query)) {
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
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            <?php }}?>
            <!-- Blog Comments -->
            <?php
            if (isset($_POST['create-comment'])) {
                $the_p_id = $_GET['p_id'];

                 $comment_author = $_POST['comment_author'];
                 $comment_email = $_POST['comment_email'];
                 $comment_content = $_POST['comment_content'];

                 $query = "INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES (NULL, '$the_p_id', '$comment_author', '$comment_email', '$comment_email', 'unaproved', now())";
                 $create_comment = mysqli_query($con, $query);
                 confirmQuery($create_comment);
            }
             ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">

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

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php"); ?>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <?php include("includes/footer.php"); ?>
