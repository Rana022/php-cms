<table class="table table-borderd table-hover">
                            <tr>
                                <th>id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In response to</th>
                                <th>Date</th>
                                <th>aprove</th>
                                <th>unaprove</th>
                                <th>delete</th>
                            </tr>
                            
                            <?php 
                            $query = "SELECT * FROM comments";
                            $pick_comment = mysqli_query($con, $query);
                            while ($comment_fetch = mysqli_fetch_assoc($pick_comment)) {
                                $comment_id = $comment_fetch['comment_id'];
                                $comment_post_id = $comment_fetch['comment_post_id'];
                                $comment_author = $comment_fetch['comment_author'];
                                $comment_content = $comment_fetch['comment_content'];
                                $comment_email = $comment_fetch['comment_email'];
                                $comment_status = $comment_fetch['comment_status'];
                                $comment_date = $comment_fetch['comment_date'];
                                ?>
                                 <?php
                                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                                $cmt = mysqli_query($con, $query);
                                confirmQuery($cmt);
                                while ($cmt_row = mysqli_fetch_assoc($cmt)) {
                                    $post_id = $cmt_row['post_id'];
                                    $post_title = $cmt_row['post_title'];
                                }
                                 ?>
                               
                            <tr>
                               <td><?php echo $comment_id; ?></td>
                                <td><?php echo $comment_author; ?></td>
                                <td><?php echo $comment_content; ?></td>
                                <td><?php echo $comment_email; ?></td>
                                  <?php 
                                //$query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                               // $show_cat = mysqli_query($con, $query);
                                //confirmQuery($show_cat);
                               // while ($cat_fetch = mysqli_fetch_assoc($show_cat)) {
                                    //$c_title = $cat_fetch['cat_title'];
                                      //}?>
                                <td><?php echo $comment_status; ?></td>

                               
                                <td><a href="../post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></td>
                                <?php  ?>

                                <td><?php echo $comment_date; ?></td>
                                <td><a href="" class="btn btn-success">approve</a></td>
                                <td><a href="" class="btn btn-warning">unaprove</a></td>
                                <td><a href="" class="btn btn-danger">delete</a></td>
                            </tr>
                        <?php } ?>
                        </table>
                        <?php
                        if (isset($_GET['delete'])) {
                           $delete_id = $_GET['delete'];
                           $query = "DELETE FROM posts WHERE post_id = $delete_id";
                           $delete_query = mysqli_query($con, $query);
                           header("Location: posts.php");
                           confirmQuery($delete_query);
                        }
                         ?>

