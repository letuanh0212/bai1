<?php
include "connectDB.php";

$conn = connectDB();

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$image = $_POST['image'];

$SQL = "UPDATE user SET name = '$name', price ='$price' , emaiquantityl = '$quantity', image ='$image' where id = $id";

if($conn->query($SQL) === true){
    header("location: index.php");
}else{
    header("location: updateProducts.php? id=$id");
}

?>