<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Login</h1>
    <div>
        <form action ="index.php" method = "post">
            <label for ="user"> Username:</label>
            <input type = "text"  id = "user" name = "username"><br>
            <label for = "pass"> Password </label>
            <input type = "password" name = "password" id = "pass"><br>
            <input type = "submit" name = "login" value = "login">
        </form>
    </div>

</body>
</html>
<?php 
    if(isset($_POST["login"]))
        {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];

            if(!empty($_POST["username"]) && !empty($_POST(["password"])))
                {
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["password"] = $_POST["password"];
                    header("Location : home.php");
                }
            else
                {
                    echo "Missing username/password";
                }
        }
 ?>