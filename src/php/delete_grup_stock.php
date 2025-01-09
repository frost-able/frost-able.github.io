<?php
include 'config.php';

if (isset($_GET['kode_grup'])) {
    $kode_grup = $_GET['kode_grup'];
    $stmt = $conn->prepare("DELETE FROM grup_stock WHERE Kode_Grup = ?");
    $stmt->bind_param("s", $kode_grup);

    if ($stmt->execute()) {
        header("Location: ../../public/html/grup_stock.html?message=Data berhasil dihapus.");
        exit();

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>