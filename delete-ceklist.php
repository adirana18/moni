<?php
include 'aksi/koneksi.php';

// Cek apakah parameter id ada dan valid
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan query delete
    $sql = "DELETE FROM ceklist_perangkat_it_store WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil dihapus, arahkan kembali ke halaman data kunjungan
        header("Location: ceklist");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid ID.";
}

$conn->close();
?>
