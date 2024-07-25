<?php
include 'aksi/koneksi.php';

// Query untuk mengambil semua data dari tabel kunjungan
$sql = "SELECT id, nama, kode_toko, nama_store, tgl_kunjungan, nama_pejabat, nik_pejabat, created_at FROM kunjungan";
$result = $conn->query($sql);

// Header untuk file Excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=data_kunjungan.xls');

// Output baris header Excel
echo "ID\tNama\tKode Toko\tNama Store\tTanggal Kunjungan\tNama Pejabat\tNIK Pejabat\tCreated At\n";

// Output data setiap baris dari hasil query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['id'] . "\t";
        echo $row['nama'] . "\t";
        echo $row['kode_toko'] . "\t";
        echo $row['nama_store'] . "\t";
        echo $row['tgl_kunjungan'] . "\t";
        echo $row['nama_pejabat'] . "\t";
        echo $row['nik_pejabat'] . "\t";
        echo $row['created_at'] . "\n";
    }
}

// Tutup koneksi
$conn->close();
?>
