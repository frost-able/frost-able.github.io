<?php
include 'config.php';

$result = $conn->query("SELECT * FROM stock");
$stocks = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $stocks[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($stocks);

$conn->close();
?>