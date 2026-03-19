<?php 
// array = "variable" which can hold more than one value at a time
$foods = array("apple", "orange", "banana", "coconut");

//$foods[0] = "pineapple";
//array_push
//array_pop -> removes the last element
// array_shift -> removes the first element in the array and then shifts the rest of the array
// array_reverse returns a new array
//count() -> returns the number of variables in an array

foreach($foods as $food)
    {
        echo $food. "<br>";
    }



?>