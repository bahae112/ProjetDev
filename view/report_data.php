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

$sql = "SELECT category, SUM(amount) as total FROM expenses GROUP BY category";
$result = $conn->query($sql);

$data = array();
$totalAmount = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
        $totalAmount += $row['total'];
    }
}

$conn->close();

echo json_encode(array('data' => $data, 'total' => $totalAmount));
?>
