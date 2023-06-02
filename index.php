<?php
    include "inc/header.php";
?>

<section>
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All User'a Data</h2>

                <!-- Table Start -->
                <table class="table table-striped table-bordered" id="usersdata">
                    <thead>
                        <tr>
                            <th scope="col">#Sl.</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            //Read Query
                            $query = "SELECT * FROM users ORDER BY name ASC";
                            //Pass the SQL command to the Database
                            $allUsers = mysqli_query( $connect , $query );

                            // Variable for the Sl.
                            $i = 1;

                            //Receive all the data from 'users' table using loop
                            while( $row = mysqli_fetch_assoc($allUsers) ){
                                $id    = $row['id'];
                                $name  = $row['name'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $name ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $phone ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="updateuser.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm">Update</a>
                                    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUser<?php echo $id; ?>">Delete</a>
                                </div>
                            </td>
                            <!-- Delete User Confirmation Modal -->
                            <div class="modal fade" id="deleteUser<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this user?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <a href="index.php?id=<?php echo $id; ?>" type="submit" class="btn btn-danger">Confirm</a>
                                            <a type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</a>
                                        </div>                          
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <?php
                            $i++;
                            }                           
                        ?>                
                    </tbody>
                </table>
                <!-- Table End -->

                <!-- Delete User SQL Code -->
                <?php
                    if( isset($_GET['id']) )
                    {
                        $userID = $_GET['id'];

                        $query = "DELETE FROM users WHERE id='$userID'";

                        $deleteUser = mysqli_query($connect, $query);

                        if( $deleteUser )
                        {
                            header("Location:index.php");
                        }
                        else{
                            die("Operation Failed." . mysqli_error($connect) );
                        }
                    }
                ?>

                <a href="adduser.php" class="btn btn-primary">Add New User</a>

            </div>
        </div>
    </div>
</section>

<?php
    include "inc/footer.php";
?>