<?php
include 'config.php';

$result = $conn->query("SELECT * FROM grup_stock");
$grup_stocks = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $grup_stocks[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($grup_stocks);

$conn->close();
?>