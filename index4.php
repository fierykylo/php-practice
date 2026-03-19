
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PRACTICE</title>
</head>
<body>
    <form action = "index4.php" method="post">
        <label for = "user"> username: </label>
        <br>
        <input type = "text" name = "username" id = "user"> <br>
        <label for ="pass"> password: </label><br>
        <input type = "password" name = "password" id = "pass"><br>
        <input type = "submit" value = "login">
    </form>
</body>
</html>

<?php
    echo "{$_POST["username"]} <br>";
    echo "{$_POST["password"]} <br>";
?>