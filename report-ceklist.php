<?php
include 'aksi/koneksi.php';

// Query untuk mengambil semua data dari tabel kunjungan
$sql = "SELECT ID, KD_BRANCH, NAMA_BRANCH, KD_STORE, NIK_IT_STORE, NAMA_IT_STORE, NAMA_STORE, TYPE_TOKO, PDT, KONEKSI, TYPE_KONEKSI, VENDOR_KONEKSI, S_MERK, S_PROCESSOR, S_MEMORI, S_KAPASITAS_STORAGE, S_TYPE_STORAGE, K1_MERK, K1_PROCESSOR, K1_MEMORI, K1_KAPASITAS_STORAGE, K1_TYPE_STORAGE, K2_MERK, K2_PROCESSOR, K2_MEMORI, K2_KAPASITAS_STORAGE, K2_TYPE_STORAGE, K3_MERK, K3_PROCESSOR, K3_MEMORI, K3_KAPASITAS_STORAGE, K3_TYPE_STORAGE, K4_MERK, K4_PROCESSOR, K4_MEMORI, K4_KAPASITAS_STORAGE, K4_TYPE_STORAGE FROM ceklist_perangkat_it_store";
$result = $conn->query($sql);

// Header untuk file Excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=Ceklist_Perangkat_IT_store.xls');

// Output baris header Excel
echo "ID\tKD Branch\tNama Branch\tKD Store\tNIK IT Store\tNama IT Store\tNama Store\tType Toko\tPDT\tKoneksi\tType Koneksi\tVendor Koneksi\tS Merk\tS Processor\tS Memori\tS Kapasitas Storage\tS Type Storage\tK1 Merk\tK1 Processor\tK1 Memori\tK1 Kapasitas Storage\tK1 Type Storage\tK2 Merk\tK2 Processor\tK2 Memori\tK2 Kapasitas Storage\tK2 Type Storage\tK3 Merk\tK3 Processor\tK3 Memori\tK3 Kapasitas Storage\tK3 Type Storage\tK4 Merk\tK4 Processor\tK4 Memori\tK4 Kapasitas Storage\tK4 Type Storage\n";

// Output data setiap baris dari hasil query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['ID'] . "\t";
        echo $row['KD_BRANCH'] . "\t";
        echo $row['NAMA_BRANCH'] . "\t";
        echo $row['KD_STORE'] . "\t";
        echo $row['NIK_IT_STORE'] . "\t";
        echo $row['NAMA_IT_STORE'] . "\t";
        echo $row['NAMA_STORE'] . "\t";
        echo $row['TYPE_TOKO'] . "\t";
        echo $row['PDT'] . "\t";
        echo $row['KONEKSI'] . "\t";
        echo $row['TYPE_KONEKSI'] . "\t";
        echo $row['VENDOR_KONEKSI'] . "\t";
        echo $row['S_MERK'] . "\t";
        echo $row['S_PROCESSOR'] . "\t";
        echo $row['S_MEMORI'] . "\t";
        echo $row['S_KAPASITAS_STORAGE'] . "\t";
        echo $row['S_TYPE_STORAGE'] . "\t";
        echo $row['K1_MERK'] . "\t";
        echo $row['K1_PROCESSOR'] . "\t";
        echo $row['K1_MEMORI'] . "\t";
        echo $row['K1_KAPASITAS_STORAGE'] . "\t";
        echo $row['K1_TYPE_STORAGE'] . "\t";
        echo $row['K2_MERK'] . "\t";
        echo $row['K2_PROCESSOR'] . "\t";
        echo $row['K2_MEMORI'] . "\t";
        echo $row['K2_KAPASITAS_STORAGE'] . "\t";
        echo $row['K2_TYPE_STORAGE'] . "\t";
        echo $row['K3_MERK'] . "\t";
        echo $row['K3_PROCESSOR'] . "\t";
        echo $row['K3_MEMORI'] . "\t";
        echo $row['K3_KAPASITAS_STORAGE'] . "\t";
        echo $row['K3_TYPE_STORAGE'] . "\t";
        echo $row['K4_MERK'] . "\t";
        echo $row['K4_PROCESSOR'] . "\t";
        echo $row['K4_MEMORI'] . "\t";
        echo $row['K4_KAPASITAS_STORAGE'] . "\t";
        echo $row['K4_TYPE_STORAGE'] . "\n";
    }
}

// Tutup koneksi
$conn->close();
?>
