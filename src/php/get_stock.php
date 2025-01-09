<?php
include 'config.php';

if (isset($_GET['kode_barang'])) {
    $kode_barang = $_GET['kode_barang'];
    $stmt = $conn->prepare("SELECT * FROM stock WHERE Kode_Barang = ?");
    $stmt->bind_param("s", $kode_barang);
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