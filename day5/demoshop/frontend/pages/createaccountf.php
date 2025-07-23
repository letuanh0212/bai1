<?php
   include_once(__DIR__ . '/../../dbconnect.php');
            $con = connectDB();
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];  
            $confirm = $_POST['confirm'];
            $address = $_POST['address'];
            $sql="INSERT INTO user ( username,email, password, address) VALUES ('$username','$email', '$password', '$address' )";
            if($con->query($sql) === TRUE) { 
               header("Location: login.php");
            } 
             else {
                 header("Location: createaccountf.php" );
            }     
            $con->close(); 
?>
            