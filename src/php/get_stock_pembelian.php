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
} else {

    // If no specific kode_barang is provided, fetch all stock items
    $result = $conn->query("SELECT * FROM stock");
    $stocks = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $stocks[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($stocks);

    } else {
        echo json_encode([]);
    }
}

$conn->close();
?>