<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The perimeter of the triangle</title>
</head>
<body>
    <h1>The perimeter of the triangle</h1>
    <form action="" method="post">
        <label for="number">Enter a number:</label>
        <input type="text" name="number1" id="number" min="0" required>
        <label for="number">Enter b number:</label>
        <input type="text" name="number2" id="number" min="0" required>
        <label for="number">Enter c number:</label>
        <input type="text" name="number3" id="number" min="0" required>

        <input type="submit" name="btnCheck" value="Check">
    </form>

    <?php
    if (isset($_POST['btnCheck'])) {
        $a = intval($_POST['number1']);
        $b = intval($_POST['number2']);
        $c = intval($_POST['number3']);
        if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
            $perimeter = $a + $b + $c;
            echo "Input:a = $a, b = $b, c = $c</p>";
            echo "<br/>";
            echo "Output: Perimeter = $perimeter";
        } else {
            echo "Invalid triangle! The sum of any two sides must be greater than the third.";
        }

    }
    ?>
</body>
</html>
