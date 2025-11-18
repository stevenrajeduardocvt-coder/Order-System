<?php
// Prices
$prices = [
    "Burger" => 50,
    "Fries" => 75,
    "Steak" => 150
];

$error_message = "";

// Process Form
if (isset($_POST['submit'])) {
    $order = $_POST['order'];
    $qty = $_POST['quantity'];
    $cash = $_POST['cash'];

    if ($qty > 0) {
        $total = $prices[$order] * $qty;

        if ($cash >= $total) {
            // Successful transaction - Redirect to receipt page with data
            // We'll pass the data as URL parameters
            header("Location: receipt.php?total=$total&paid=$cash");
            exit(); // Stop execution here
        } else {
            // Insufficient cash - Stay on this page and show an error
            $error_message = "Insufficient cash!";
        }
    } else {
        $error_message = "Quantity must be greater than 0!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <style>
        body {
            font-family: Georgia, serif;
            margin: 40px;
        }
        table {
            border-collapse: collapse;
            width: 300px;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 2px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
            font-size: 18px;
        }
        input[type="text"], input[type="number"], select {
            width: 300px;
            height: 30px;
            margin-bottom: 15px;
            font-size: 18px;
        }
        button, input[type="submit"] {
            padding: 6px 15px;
            font-size: 16px;
        }
        .error {
            color: red;
            font-size: 20px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h1>Menu</h1>

<table>
    <tr>
        <th>Order</th>
        <th>Amount</th>
    </tr>
    <tr>
        <td>Burger</td>
        <td>50</td>
    </tr>
    <tr>
        <td>Fries</td>
        <td>75</td>
    </tr>
    <tr>
        <td>Steak</td>
        <td>150</td>
    </tr>
</table>

<form method="POST">

    <label>Select an order</label><br>
    <select name="order">
        <option value="Burger">Burger</option>
        <option value="Fries">Fries</option>
        <option value="Steak">Steak</option>
    </select><br>

    <label>Quantity</label><br>
    <input type="number" name="quantity" required min="1"><br>

    <label>Cash</label><br>
    <input type="number" name="cash" required min="0"><br>

    <input type="submit" name="submit" value="Submit">
</form>

<br>

<?php 
if ($error_message != "") {
    echo '<div class="error">' . $error_message . '</div>';
}
?>

</body>
</html>