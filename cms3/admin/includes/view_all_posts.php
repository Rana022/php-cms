<br>
            <div class="all-posts-table">
              <h3>All Posts</h3>
              <hr>
              <table class="table table-hover table-bordered table-striped">
               <tr>
                    <th>id</th>
                    <th>Title</th>
                     <th>Date</th>
                    <th>Category</th>
                    <th>image</th>
                    <th>content</th>
                    <th>Tags</th>
                    <th>status</th>
                    <th>delete</th>
                    <th>update</th>
                </tr>
                 <?php
                  $query = "SELECT * FROM posts";
                  $posts_query = mysqli_query($con, $query);
                  while ($posts_query_row = mysqli_fetch_assoc($posts_query)) {
                       $post_id = $posts_query_row['post_id'];
                       $post_title = $posts_query_row['post_title'];
                       $post_date = $posts_query_row['post_date'];
                       $post_category = $posts_query_row['post_category'];
                       $post_image = $posts_query_row['post_image'];
                       $post_content = $posts_query_row['post_content'];
                       $post_tags = $posts_query_row['post_tags'];
                       $post_status = $posts_query_row['post_status'];
                 ?>
                 <?php 
                     $query = "SELECT * FROM nav_items WHERE nav_item_id = $post_category ";
                     $show_cat = mysqli_query($con, $query);
                     while ($cat_fetch = mysqli_fetch_assoc($show_cat)) {
                      $show_cat_title = $cat_fetch['nav_item_title'];
                    }
                      ?>
                <tr>
                    <td><?php echo $post_id; ?></td>
                    <td><?php echo $post_title; ?></td>
                    <td><?php echo $post_date; ?></td>
                    <td><?php echo $show_cat_title; ?></td>
                    <td><img width="100px" src="../img/<?php echo $post_image; ?>" alt=""></td>
                    <td><?php echo $post_content; ?></td>
                    <td><?php echo $post_tags; ?></td>
                    <td><?php echo $post_status; ?></td>
                    <td>
                        <a href="posts.php?delete=<?php echo $post_id; ?>" class="btn btn-danger">DELETE</a>
                    </td>
                     <td>
                        <a href="posts.php?source=update&up_id=<?php echo $post_id; ?>" class="btn btn-success">UPDATE</a>
                    </td>
                </tr>
            <?php } ?>
              </table>
            </div>
            <?php
            if (isset($_GET['delete'])) {
             $delete_id = $_GET['delete'];
             $del_query = "DELETE FROM posts WHERE post_id = $delete_id";
             $delete_post = mysqli_query($con, $del_query);
             confirmQuery($delete_post);
             if ($delete_post) {
               header("Location: posts.php");
             }
            }
             ?>