<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Temperature in Fahrenheit</h1>
    <form action="" method='post'>
        <div>
            <label for='number'>input C/label>
            <input type='text' name='number'>
            <input type='submit' name='btnSend' value='send'>
        </div>
    </form>
    <?php
    if(isset($_POST['btnSend'])){
        $C =$_POST['number'];
        $a= ($C * 1.8) + 32 ;
        echo " Temperature in Fahrenheit C $C to F $a " ;
        
    }
    ?>
</body>
</html>