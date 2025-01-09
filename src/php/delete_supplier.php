<?php
include 'config.php';

if (isset($_GET['kode_supplier'])) {
    $kode_supplier = $_GET['kode_supplier'];
    $stmt = $conn->prepare("DELETE FROM supplier WHERE Kode_Supplier = ?");
    $stmt->bind_param("s", $kode_supplier);

    if ($stmt->execute()) {
        header("Location: ../../public/html/supplier.html?message=Data berhasil dihapus.");
        exit();

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>