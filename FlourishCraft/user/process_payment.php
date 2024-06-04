<?php
session_start();

include_once "../db.php"; // Assuming db.php contains your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['customers_username'])) {
    // Retrieve form data and sanitize
    $accountNumber = $_POST['accountNumber'];
    $accountName = $_POST['accountName'];
    $referenceNumber = $_POST['referenceNumber'];

    // Assuming you have the order details stored in session variables
    $setName = $_SESSION['setName'];
    $totalCost = $_SESSION['totalCost'];
    $customerName = $_SESSION['customerName'];
    // etc. Add more session variables as needed

    // Insert payment details into the database
    $stmt = $conn->prepare("INSERT INTO payment (Account_Number, Account_Name, Reference_Number) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $accountNumber, $accountName, $referenceNumber);
    $stmt->execute();

    // Check if the payment was successfully submitted
    if ($stmt->affected_rows > 0) {
        // Payment submitted successfully
        // Here you can update the order status or any other necessary actions
        // For example, you can mark the order as paid in your database

        // Redirect to a payment confirmation page
        header("Location: payment_confirmation.php");
        exit();
    } else {
        // Payment submission failed
        // You might want to display an error message or redirect to a failure page
        echo "Error: Payment submission failed.";
    }

    // Close the statement
    $stmt->close();
} else {
    // Redirect to the login page if the user is not logged in or if the form was not submitted via POST
    header("Location: login.php");
    exit();
}
?>
