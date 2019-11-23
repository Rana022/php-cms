<br>
            <div class="all-posts-table">
              <h3>All comments</h3>
              <hr>
              <table class="table table-hover table-bordered table-striped">
               <tr>
                    <th>id</th>
                    <th>Author</th>
                     <th>Comment</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>In response to</th>
                    <th>date</th>
                    <th>Approved</th>
                    <th>Unapproved</th>
                    <th>Delete</th>
                </tr>
                 <?php
                  $query = "SELECT * FROM comments";
                  $view_comments = mysqli_query($con, $query);
                  while ($comment_row = mysqli_fetch_assoc($view_comments)) {
                       $comment_id = $comment_row['comment_id'];
                       $comment_post_id = $comment_row['comment_post_id'];
                       $comment_author = $comment_row['comment_author'];
                       $comment_content = $comment_row['comment_content'];
                       $comment_email = $comment_row['comment_email'];
                       $comment_date = $comment_row['comment_date'];
                       $comment_status = $comment_row['comment_status'];
                       
                 ?>
                 <?php
                   $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                   $comments_post = mysqli_query($con, $query);
                   confirmQuery($comments_post);
                   while ($post_row = mysqli_fetch_assoc($comments_post)) {
                            $cp_id = $post_row['post_id'];
                            $cp_title = $post_row['post_title'];
                   }?>
                <tr>
                    <td><?php echo $comment_id; ?></td>
                    <td><?php echo $comment_author; ?></td>
                    <td><?php echo $comment_content; ?></td>
                    <td><?php echo $comment_email; ?></td>
                    <td><?php echo $comment_status; ?></td>

                    <td><a href="../post.php?single_p_id=<?php echo $cp_id; ?>"><?php echo $cp_title; ?></a></td>

                    <td><?php echo $comment_date; ?></td>
                    <td><a href="comments.php?approved=<?php echo $comment_id; ?>" class="btn btn-success">Approved</a></td>
                    <td><a href="comments.php?unapproved=<?php echo $comment_id; ?>" class="btn btn-primary">Unaproved</a></td>
                    <td><a href="comments.php?c_delete=<?php echo $comment_id; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php } ?>
              </table>
            </div>
            <?php
            
             if (isset($_GET['approved'])) {
             $c_approved_id = $_GET['approved'];
             $query = "UPDATE `comments` SET `comment_status` = 'approved' WHERE `comments`.`comment_id` = $c_approved_id";
             $c_approve_query = mysqli_query($con, $query);
             header("Location: comments.php");
             confirmQuery($c_approve_query);
            }

             if (isset($_GET['unapproved'])) {
             $c_unapproved_id = $_GET['unapproved'];
             $query = "UPDATE `comments` SET `comment_status` = 'unapproved' WHERE `comments`.`comment_id` = $c_unapproved_id";
             $c_unapprove_query = mysqli_query($con, $query);
             header("Location: comments.php");
             confirmQuery($c_unapprove_query);
            }


             if (isset($_GET['c_delete'])) {
             $c_delete_id = $_GET['c_delete'];
             $query = "DELETE FROM `comments` WHERE `comments`.`comment_id` = $c_delete_id";
             $c_delete_query = mysqli_query($con, $query);
             header("Location: comments.php");
             confirmQuery($c_delete_query);
            }
             ?>