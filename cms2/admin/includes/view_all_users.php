<table class="table table-borderd table-hover table-striped">
                            <tr>
                                <th>id</th>
                                <th>username</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>aprove</th>
                                <th>unaprove</th>
                                <th>delete</th>
                                <th>Edit</th>
                            </tr>

                            <?php 
                            $query = "SELECT * FROM users";
                            $pick_user = mysqli_query($con, $query);
                            while ($user_fetch = mysqli_fetch_assoc($pick_user)) {
                                $user_id = $user_fetch['user_id'];
                                $user_name = $user_fetch['user_name'];
                                $user_firstname = $user_fetch['user_firstname'];
                                $user_lastname = $user_fetch['user_lastname'];
                                $user_email = $user_fetch['user_email'];
                                $user_role = $user_fetch['user_role'];
                                ?>  
                            <tr>
                                <td><?php echo $user_id; ?></td>
                                <td><?php echo $user_name; ?></td>
                                <td><?php echo $user_firstname; ?></td>
                                <td><?php echo $user_lastname; ?></td>
                                <td><?php echo $user_email; ?></td>
                                <td><?php echo $user_role; ?></td>
                                <td><a href="users.php?change_to_admin=<?php echo $user_id; ?>" class="btn btn-success">Admin</a></td>
                                <td><a href="users.php?change_to_subscriber=<?php echo $user_id; ?>" class="btn btn-warning">Subscriber</a></td>
                                <td><a href="users.php?delete=<?php echo $user_id; ?>" class="btn btn-danger">delete</a></td>
                                <td><a href="users.php?source=edit_user&edit=<?php echo $user_id; ?>" class="btn btn-primary">Edit</a></td>
                            </tr>

                        <?php } ?>
                        </table>
                        <?php

                        if (isset($_GET['change_to_admin'])) {
                           $user_admin_id = $_GET['change_to_admin'];
                           $query = "UPDATE users SET user_role ='admin' WHERE user_id = $user_admin_id ";
                           $to_admin = mysqli_query($con, $query);
                           header("Location: users.php");
                           confirmQuery($to_admin);
                        }

                        if (isset($_GET['change_to_subscriber'])) {
                           $user_subscriber_id = $_GET['change_to_subscriber'];
                           $query = "UPDATE users SET user_role ='subscriber' WHERE user_id = $user_subscriber_id ";
                           $to_subscriber = mysqli_query($con, $query);
                           header("Location: users.php");
                           confirmQuery($to_subscriber);
                        }
                        
                        if (isset($_GET['delete'])) {
                           $user_delete_id = $_GET['delete'];
                           $query = "DELETE FROM users WHERE user_id = $user_delete_id";
                           $user_delete_query = mysqli_query($con, $query);
                           header("Location: users.php");
                           confirmQuery($user_delete_query);
                        }
                         ?>

