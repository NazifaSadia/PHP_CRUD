<?php
    $connect = mysqli_connect("localhost","root","","ssb351");

    if( $connect ){
        //echo '<div class="alert alert-success">Database connection established.</div>';
    }
    else{
        echo 'Database is not connected.';
    }
?>

                