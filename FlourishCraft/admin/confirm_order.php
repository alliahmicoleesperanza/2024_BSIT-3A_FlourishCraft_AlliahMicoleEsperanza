<?php
include 'db_connect.php'; // include your database connection script

$sql = "SELECT Customer_ID, Set_Name, Variation, Quantity, Price, Delivery_Date, mode_of_payment, mode_of_delivery FROM `order`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Order List</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Set Name</th>
                <th>Variation</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Delivery Date</th>
                <th>Mode of Payment</th>
                <th>Mode of Delivery</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Customer_ID"] . "</td>";
                    echo "<td>" . $row["Set_Name"] . "</td>";
                    echo "<td>" . $row["Variation"] . "</td>";
                    echo "<td>" . $row["Quantity"] . "</td>";
                    echo "<td>" . $row["Price"] . "</td>";
                    echo "<td>" . $row["Delivery_Date"] . "</td>";
                    echo "<td>" . $row["mode_of_payment"] . "</td>";
                    echo "<td>" . $row["mode_of_delivery"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No orders found</td></tr>";
            }
            $conn->close();
            ?>

            
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
