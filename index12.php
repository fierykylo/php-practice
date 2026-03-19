<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <form action ="index12.php" method = "post">
        <label>Username:</label>
        <input type = "text" name = "username"><br>
        <label>Password:</label>
        <input type = "password" name = "password"><br>
        <input type = "submit" name = "login" value = "login">
    </form>
</body>
</html>

<?php
    //isset() = returns true if a variable is declared and not null
    // empty() = returns true if a variable is not declared and is not fales, null, ""

    $username = "FieryKylo";

    foreach ($_POST as $Key => $value)
        {
            echo "{$key} = {$value}<br>";
        }
    if(isset($_POST["login"]))
        {
            $username = $_POST["username"];
            $password = $_POST["password"];
            if(empty($username))
                {
                    echo "username is missing";
                }
            else if(empty($password))
                {
                    echo "password is missing";
                }
            else
                {
                    echo "Hello, {$username}";
                }
        }
    // echo isset($username); // returns 0 or 1
    // if(isset($username))
    //     {
    //         echo "This varaible is set";
    //     }
    // else
    //     {
    //         echo "This variable is not empty";
    //     }
?>