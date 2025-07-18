<?php
include "connectDB.php";
$conn = connectDB();

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$image = $_POST['image'];   

$SQL = "INSERT INTO products (name,price,quantity, image) value
    ('$name', '$price', '$quantity' , '$image')";
if($conn->query($SQL) === true){
    header("location: index.php");
}else{
    header("location: index.php");
}
$conn -> close();
?>