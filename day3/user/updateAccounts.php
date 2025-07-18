<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
</head>
<body>

    <h1> Update Account</h1>
    <?php 
        include 'connectDB.php';
        $conn = connectDB();
        $id = $_GET['id'];
        $SQL = "SELECT id , username ,password, email  from user where id = $id";
        $result = $conn->query($SQL);
        if($result->num_rows > 0 ){
            if($row = $result->fetch_array(MYSQLI_NUM)){
        
    ?>

    <form action="processUpdate.php" method='Post'>
        <input type="hidden" name="id" value="<?php echo $row[0] ; ?>" >
        <div>
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" value="<?php echo $row[1] ; ?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" value="<?php echo $row[2] ; ?>">
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $row[3] ; ?>">
        </div>
       
        <div>
            <input type="submit" value="Update"/>
        </div>
    </form>

    <?php 
        } else {
        header("location: updateAccounts.php? id = $id");
        } 
    }else {
        header("location: updateAccounts.php? id = $id");
    }

    $conn->close()
    ?>
</body>
</html>