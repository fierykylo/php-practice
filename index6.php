<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Functions</title>
</head>
<body>
    <form action = "index6.php" method="post">
        <label> x: </label>
        <input type = "text" name="x">
        <input type = "submit" value = "total">
    </form>
</body>
</html>
<?php 
    $x = $_POST["x"];
    $total = null;
    $total = abs($x);
    //abs
    //round
    //floor - round down
    // ceil - roudnnd up
    //pow($x, $y)
    //sqrt
    //max gives the maximum value with the given variables
    //min - gives the minimum value
    //pi - prints the pi 
    //rand() gives a competely random number upto 2 billion 
    //rand(1,6) between them you have to give a random number
    echo $total;
?>