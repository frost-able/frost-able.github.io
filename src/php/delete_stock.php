<?php
include 'config.php';

if (isset($_GET['kode_barang'])) {
    $kode_barang = $_GET['kode_barang'];
    $stmt = $conn->prepare("DELETE FROM stock WHERE Kode_Barang = ?");
    $stmt->bind_param("s", $kode_barang);

    if ($stmt->execute()) {
        header("Location: ../../public/html/stock.html?message=Data berhasil dihapus.");
        exit();

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>