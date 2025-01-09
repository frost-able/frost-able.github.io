<?php
include 'config.php';

// Fetch all suppliers from the database
$result = $conn->query("SELECT Kode_Supplier, Nama_Supplier FROM supplier");
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