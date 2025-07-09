<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Area of the circle</title>
</head>
<body>
    <h1> Area of the circle</h1>
    <form action="" method="post">
        <label for="number">Enter R number:</label>
        <input type="text" name="number1" id="number" >
        
        <input type="submit" name="btnCheck" value="Calculate">
    </form>

    <?php
    if (isset($_POST['btnCheck'])) {
        $r = intval($_POST['number1']);
        $area = M_PI *($r * $r);
        echo " Area of the circle: $area";
    }
    ?>
</body>
</html>
