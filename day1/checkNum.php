<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Check Number ODD or EVEN</h1>
    <form action="" method='post'>
        <div>
            <label for='number'> input number</label>
            <input type='text' name='number'>
            <input type='submit' name='btnSend' value='send'>
        </div>
    </form>
    <?php
    if(isset($_POST['btnSend'])){
        $n =$_POST['number'];
        $a=2;
        if($n % $a == 0){
            echo "$n is Even number ";
        }else{
            echo "$n is Odd number:";
        }
    }
    ?>
</body>
</html>