<?php
    // cookie = Information about a user stored in a user's web browser
    //          targeted advertisements , browsing preferences and
    //          other non sensitive data
    setcookie("favfood", "pizza", time() + 86400 + "/");
    setcookie("favdrink", "coffee", time() + 86400 + "/");
    setcookie("favdessert", "chocolavacake", time() + 86400 + "/");

    foreach($_COOKIE as $key => $value)
        {
            echo"{$key} = {$value} <br>";
        }
    if(isset($_COOKIE["$favfood"]))
        {
            echo "BUY SOME {$_COOKIE["favfood"]}!!!";
        }
?>