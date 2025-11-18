<?php
// Check if the required data is available in the URL parameters
if (isset($_GET['total']) && isset($_GET['paid'])) {
    $total_price = (float)$_GET['total'];
    $you_paid = (float)$_GET['paid'];
    $change = $you_paid - $total_price;
    $current_date_time = date("m/d/Y h:i:s a"); // Format the current date/time
} else {
    // Redirect back to the menu if accessed directly without transaction data
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            display: flex;
            justify-content: center;
        }
        .receipt-box {
            width: 400px;
            padding: 20px;
            border: 2px dotted black;
            text-align: left;
        }
        h2 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 30px;
        }
        .line-item {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .date-time {
            font-size: 22px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="receipt-box">
    <h2>RECEIPT</h2>

    <div class="line-item">
        Total Price: <?php echo number_format($total_price, 2); ?>
    </div>
    
    <div class="line-item">
        You Paid: <?php echo number_format($you_paid, 2); ?>
    </div>
    
    <div class="line-item">
        CHANGE: <?php echo number_format($change, 2); ?>
    </div>

    <div class="date-time">
        <?php echo $current_date_time; ?>
    </div>
</div>

</body>
</html>