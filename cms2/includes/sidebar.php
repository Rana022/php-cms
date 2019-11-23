<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                     <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <div class="well">
                    <h4>LOG IN</h4>
                     <form action="includes/login.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="User name here">
                    </div>

                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="User password here">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary" name="submit_login">Submit</button>
                        </span>
                    </div>



                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                         <?php 
                        $query = "SELECT * FROM categories WHERE mod(cat_id,2) = 0";
                        $query_run = mysqli_query($con, $query);
                       ?>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                                  while ($row = mysqli_fetch_assoc($query_run)) {
                            $cat_title = strtoupper($row['cat_title']);
                            $cat_id = $row['cat_id'];
                            echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
                        }?>   
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                         <?php 
                        $query = "SELECT * FROM categories WHERE mod(cat_id,2) = 1";
                        $query_run = mysqli_query($con, $query);
                       ?>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                 <?php 
                                  while ($row = mysqli_fetch_assoc($query_run)) {
                            $cat_title = strtoupper($row['cat_title']);
                            $cat_id = $row['cat_id'];
                            echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
                        }?>   
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>





                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>
            </div>