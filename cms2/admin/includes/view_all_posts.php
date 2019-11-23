<table class="table table-borderd table-hover">
                            <tr>
                                <th>id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>option</th>
                            </tr>
                            
                            <?php 
                            $query = "SELECT * FROM posts";
                            $query_run = mysqli_query($con, $query);
                            while ($query_row = mysqli_fetch_assoc($query_run)) {
                                $post_id = $query_row['post_id'];
                                $post_author = $query_row['post_author'];
                                $post_title = $query_row['post_title'];
                                $post_category_id = $query_row['post_category_id'];
                                $post_status = $query_row['post_status'];
                                $post_image = $query_row['post_image'];
                                $post_tags = $query_row['post_tags'];
                                $post_comment_count = $query_row['post_comment_count'];
                                $post_date = $query_row['post_date'];
                                ?>
                               
                            <tr>
                               <td><?php echo $post_id; ?></td>
                                <td><?php echo $post_author; ?></td>
                                <td><?php echo $post_title; ?></td>
                                  <?php 
                                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                                $show_cat = mysqli_query($con, $query);
                                confirmQuery($show_cat);
                                while ($cat_fetch = mysqli_fetch_assoc($show_cat)) {
                                    $c_title = $cat_fetch['cat_title'];
                                      }?>
                                <td><?php echo $c_title; ?></td>
                                <td><?php echo $post_status; ?></td>
                                <td><img width="50px" src="../images/<?php echo $post_image; ?>" alt=""></td>
                                <td><?php echo $post_tags; ?></td>
                                <td><?php echo $post_comment_count; ?></td>
                                <td><?php echo $post_date; ?></td>
                                <td>
                                    <a href="posts.php?delete=<?php echo $post_id; ?>" class="btn btn-danger">DELETE</a>
                                    <a href="posts.php?source=edit_post&update=<?php echo $post_id; ?>" class="btn btn-success">UPDATE</a>
                                </td>
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

