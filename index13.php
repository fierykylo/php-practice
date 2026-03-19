<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using radio buttons</title>
</head>
<body>

    <form action="index13.php" method="post">

        <label>
            <input type="radio" name="credit_card" value="visa"> Visa
        </label><br>

        <label>
            <input type="radio" name="credit_card" value="Mastercard"> Mastercard
        </label><br>

        <label>
            <input type="radio" name="credit_card" value="Amex"> Amex
        </label><br>

        <input type="submit" name="confirm" value="Confirm">

    </form>

</body>
</html>

<?php 
if(isset($_POST["confirm"]))
{ 
    if(isset($_POST["credit_card"]))
    {
        $credit_card = $_POST["credit_card"];

        switch($credit_card)
        {
            case "visa":
                echo "You selected Visa";
                break;

            case "Mastercard":
                echo "You selected Mastercard";
                break;

            case "Amex":
                echo "You selected Amex";
                break;
        }
    }
    else
    {
        echo "Please select a card";
    }
}
?>