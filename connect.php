<?php
$Name = $_POST["name"];
$email = $_POST["email"];
$num_tickets = $_POST["num_tickets"];
$payment_method = $_POST["payment_method"];

// Database connection
$conn = new mysqli("localhost", "root", "", "bookingtickets");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO booking (name, email, num_tickets, payment_method) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $Name, $email, $num_tickets, $payment_method);
    $stmt->execute();
    echo "Booking successful!";
    $stmt->close();
    $conn->close();
}
?>