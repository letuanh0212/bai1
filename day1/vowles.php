<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TThe number of vowels in the string</h1>
    <form action="" method='post'>
        <div>
            <label for='str'>input string </label>
            <input type='text' name='text'>
            <input type='submit' name='btnSend' value='send'>
        </div>
    </form>
    <?php
        if (isset($_POST['btnSend'])) {
            $input = $_POST['text'];
            $lowerStr = strtolower($input); 

            $vowels = ['a', 'e', 'i', 'o', 'u'];
            $count = 0;

            for ($i = 0; $i < strlen($lowerStr); $i++) {
                if (in_array($lowerStr[$i], $vowels)) {
                    $count++;
                }
            }

            echo "Input:$input";
            echo "<br/>";
            echo "Output: Number of vowels = $count";
        }
    ?>
    
</body>
</html>