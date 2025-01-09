<?php
include 'config.php';

if (isset($_GET['kode_supplier'])) {
    $kode_supplier = $_GET['kode_supplier'];
    $stmt = $conn->prepare("SELECT * FROM supplier WHERE Kode_Supplier = ?");
    $stmt->bind_param("s", $kode_supplier);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($data);

    } else {
        echo json_encode([]);
    }

    $stmt->close();
}

$conn->close();
?>