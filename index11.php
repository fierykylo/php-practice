<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country</title>
</head>
<body>
    <form action = "index11.php" method = "post">
        <label>Enter a country</label>
        <input type = "text" name = "country">
        <input type = "submit">


    </form>
</body>
</html>





<?php 
// assosciative array = An array made of key value pairs

$capitals = array("USA" => "Washington Dc",
                   "India" => "New Delhi",
                   "South Korea" => "Seoul",
                   "Japan" => "Tokyo");

$capital = $capitals[$_POST["country"]];
echo $capital;


// foreach($capitals as $key => $value)
//     {
//         echo"{$key} =  {$value} <br>"; 
//     }
//     $capitals["China"] = "Beijing";
    // $keys = array_keys($capitals) => returns all the keys
    // array_flip => flips all the keys and values
    //array_reverse => reverse and makes new array
    // count there as well

?>