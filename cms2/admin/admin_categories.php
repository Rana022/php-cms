<?php include("includes/admin_header.php"); ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include("includes/admin_navigation.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome to Admin Panel
                            <small>keep observing</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php 
                            if (isset($_POST['submit'])) {
                                $cat_title = $_POST['cat-title'];
                                 if ($cat_title == "" || empty($cat_title)) {
                                    echo "this should not be empty";
                                }else{
                                   $cat_query = "INSERT INTO `categories` (`cat_title`) VALUES ('$cat_title')";
                                   $cat_query_run = mysqli_query($con, $cat_query);
                                   if (!$cat_query_run) {
                                   die('QUERY ERROR' . mysqli_error($con));
                                }}}?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="" class="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat-title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Category">
                                </div>
                            </form>
                            <?php include("update_categories.php"); ?>









                          



                        </div>
                        <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>option</th>
                                </tr>
                                <?php 
                                $query = "SELECT * FROM categories";
                                $query_run = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                 ?>
                                <tr>
                                    <td><?php echo $cat_id; ?></td>
                                    <td><?php echo $cat_title; ?></td>
                                    <td>
                                        <a href="admin_categories.php?delet=<?php echo $cat_id;?>" class="btn btn-danger">DELET</a>
                                        <a href="admin_categories.php?edit=<?php echo $cat_id;?>" class="btn btn-primary">UPDATE</a>
                                    </td>
                                </tr>
                            <?php } //delete queries
                            if (isset($_GET['delet'])) {
                               $delet_id = $_GET['delet'];
                               $delet_query = "DELETE FROM categories WHERE cat_id = $delet_id";
                               $delet_query_run = mysqli_query($con, $delet_query);
                               header("Location: admin_categories.php");
                            }









                            ?>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
