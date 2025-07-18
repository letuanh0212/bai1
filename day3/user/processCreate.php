<?php
include "connectDB.php";

$conn = connectDB();

$username = $_POST['username'];
$password = $_POST['password'];
$comfirm = $_POST['comfirm'];
$email = $_POST['email'];

$SQL = "INSERT INTO user (username,password,email) value
    ('$username', '$password', '$email' )";
if($conn->query($SQL) === true){
    header("location: accounts.php");
}else{
    header("location: create.php");
}
$conn -> close();
?>