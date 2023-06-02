<?php
    include "inc/header.php";
?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2>Register New User</h2>

                    <!-- Registration Form Start-->
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label>Full Name*</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email*</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Phone No.</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <input type="submit" name="send" value="Submit" class="btn btn-primary" >
                        </div>

                    </form>
                    <!-- Registration Form End-->

                    <?php 
                        if ( isset($_POST['send']) )
                        {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];

                            //Insert new data into the DB
                            $query = "INSERT INTO users (name, email, phone) VALUES ('$name','$email','$phone')";

                            $addUser = mysqli_query($connect, $query);

                            if( $addUser )
                            {
                                header("Location:index.php");
                            }
                            else
                            {
                                die("Operation Failed!!" . mysqli_error($connect));
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