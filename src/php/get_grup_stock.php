<?php
include 'config.php';

if (isset($_GET['kode_grup'])) {
    $kode_grup = $_GET['kode_grup'];
    $stmt = $conn->prepare("SELECT * FROM grup_stock WHERE Kode_Grup = ?");
    $stmt->bind_param("s", $kode_grup);
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