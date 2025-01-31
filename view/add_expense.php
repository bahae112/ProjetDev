<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atelier8";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category = $_POST['category'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$date = $_POST['date'];

$sql = "INSERT INTO expenses (category, amount, description, date) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sdss", $category, $amount, $description, $date);

if ($stmt->execute()) {
    echo "New expense added successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
