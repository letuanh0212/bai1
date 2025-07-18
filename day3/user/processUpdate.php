<?php
include "connectDB.php";

$conn = connectDB();

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


$SQL = "UPDATE user SET username = '$username', password ='$password' , email = '$email' where id = $id";

if($conn->query($SQL) === true){
    header("location: accounts.php");
}else{
    header("location: updateAccounts.php? id=$id");
}

?>