<?php
    include "inc/header.php";
?>
    <!-- Body Content -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2>Update User Information</h2>

                    <?php
                        if( isset( $_GET['id']) )
                        {
                            $userID = $_GET['id'];

                            $query = "SELECT * FROM users WHERE id = '$userID'";
                            $data = mysqli_query( $connect , $query);

                            while( $row = mysqli_fetch_assoc($data) )
                            {
                                $id     = $row['id'];
                                $name   = $row['name'];
                                $email  = $row['email'];
                                $phone  = $row['phone'];

                            ?>

                                <!-- Form Start-->
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label>Full Name</label>
                                        <input type="text" name="name" value="<?php echo $name;?>" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Phone No.</label>
                                        <input type="text" name="phone" value="<?php echo $phone;?>" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="submit" name="save" value="Save Changes" class="btn btn-primary" >
                                    </div>

                                </form>
                                <!-- Form End-->

                            <?php
                            }
                        }
                    ?>

                    
                    <!-- Update User Data -->
                    <?php
                        if( isset( $_POST['save']) )
                        {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];

                            $query = "UPDATE users SET name='$name' , email='$email', phone='$phone' WHERE id='$userID'";

                            $updateUser = mysqli_query( $connect, $query);

                            if( $updateUser )
                            {
                                header("Location: index.php");
                            }
                            else{
                                die( "Operation Failed." . mysqli_error($connect) );
                            }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>

<?php
    include "inc/footer.php";
?>