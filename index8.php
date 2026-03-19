<?php
    //if statement = if some condition is true do it 
    //               otherwise dont do it 

    $age = 21;
    if ($age >= 18)
        {
            echo "You may eneter this site";
        }
    else if($age == 0)
        {
            echo "You were just born";
        }
    else
        {
            echo "You must be 18+ to enter";
        }

?>