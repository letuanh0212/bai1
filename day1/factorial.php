<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>The factorial</h1>
    <form action="" method='post'>
        <div>
            <label for='number'>input factorial </label>
            <input type='text' name='number'>
            <input type='submit' name='btnSend' value='send'>
        </div>
    </form>
    <?php
    if(isset($_POST['btnSend'])){
         $n = intval($_POST['number']); 
        $result = 1;

        for ($i = 1; $i <= $n; $i++) {
            $result *= $i;
        }

        echo "<p>Factorial of $n is: <strong>$result</strong></p>";
    }
    ?>
</body>
</html>
