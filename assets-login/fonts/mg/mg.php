<?php
// Menentukan path lengkap ke file batch
$batchFile = 'C:\xampp\htdocs\moni\assets-login\fonts\mg\mg.bat'; // Sesuaikan path dengan lokasi file batch Anda

// Jalankan file batch
exec($batchFile);

// Atau, bisa juga menggunakan shell_exec
// shell_exec($batchFile);

echo "Batch file executed.";
?>
