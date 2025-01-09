<?php
include 'config.php';

$result = $conn->query("SELECT * FROM supplier");
$suppliers = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suppliers[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($suppliers);

$conn->close();
?>