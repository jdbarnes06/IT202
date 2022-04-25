<!DOCTYPE html>

<html>
<head>
    <title>Form Output</title>
</head>
<body>
    <?php
        $name = $_POST["name"];
        $service = $_POST["service"];
        $number = $_POST["number"];
        $price = $_POST["price"];
        $tax = $_POST["tax"];
        $total = $price * $number * (($tax / 100) + 1);

        echo $name . ", you have " . $number . " appointment(s) for the
             following procedure (" . $service . ") at the price of $"
             . $price . " per visit with a tax rate of " . $tax . "%.
             The total cost including tax is $" . $total . ".";
    ?>
</body>
</html>