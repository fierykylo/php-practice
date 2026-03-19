<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area of a circle</title>
</head>
<body>
    <form action = "index7.php" method = "post">
        <label>Radius : </label>
        <input type = "text" name = "radius"><br>
        <input type = "submit" value = "calculate">
        <hr>
    </form>
</body>
</html>

<?php 
$radius = $_POST["radius"];
$cirucmference = null;
$cirucmference = 2 * pi()* $radius;
$area = pi() * pow($radius, 2);
$area = round($area, 2);
$cirucmference = round($cirucmference, 2);
echo "Circumference = {$cirucmference} cm <br>";
echo "Area = {$area} cm<sup>2</sup><br>";

 ?>