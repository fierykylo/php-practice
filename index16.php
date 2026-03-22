<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation of user input</title>
</head>
<body>
    <form action ="index16.php" method = "post">
        <!-- <div>
            username:
        <input type = "text" name = "username"><br>
        <input type = "submit" name = "login" value = "login">
        </div> -->
        <div>
            <label for  = "age"> Age : </label>
            <input type = "text" name = "age" id = "age"><br>
            <input type = "submit" name = "login" value = "login">
        </div>
    </form>
</body>
</html>
<?php 

    if(isset($_POST["login"]))
        {
            // $username = filter_input(INPUT_POST, "username", 
            //             FILTER_SANITIZE_SPECIAL_CHARS);
            // echo "Hello {$username}";
            $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
            echo "You are {$age} years old"



        }

?>