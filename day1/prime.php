<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Number Checker</title>
</head>
<body>
    <h1>Check Prime Number</h1>
    <form action="" method="post">
        <label for="number">Enter a number:</label>
        <input type="number" name="number" id="number" min="0" required>
        <input type="submit" name="btnCheck" value="Check">
    </form>

    <?php
    if (isset($_POST['btnCheck'])) {
        $n = intval($_POST['number']);
        $isPrime = true;

        if ($n <= 1) {
            $isPrime = false;
        } else {
            for ($i = 2; $i <= sqrt($n); $i++) {
                if ($n % $i == 0) {
                    $isPrime = false;
                    break;
                }
            }
        }

        if ($isPrime) {
            echo "$n is a prime number </p>";
        } else {
            echo "$n is not a prime number </p>";
        }
    }
    ?>
</body>
</html>
