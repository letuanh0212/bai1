<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> the Fibonacci sequence up to n terms. </title>
</head>
<body>
    <h1> the Fibonacci sequence up to n terms. </h1>
    <form action="" method='post'>
        <div>
            <label for='number'>input N </label>
            <input type='text' name='number'>
            <input type='submit' name='btnSend' value='send'>
        </div>
    </form>
    <?php
    if(isset($_POST['btnSend'])){
        $n = $_POST['number'];
        $a = 0;
        $b = 1;

        echo "Fibonacci sequence up to $n terms:<br>";

        for ($i = 0; $i < $n; $i++) {
            echo $a . " ";
            $next = $a + $b;
            $a = $b;
            $b = $next;
        }

        echo "</p>";
    }
    ?>
</body>
</html>
