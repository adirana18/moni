<?php
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
include 'aksi/koneksi.php';

// Ambil tanggal hari ini dalam format MySQL (YYYY-MM-DD)
$tanggalIni = date('Y-m-d');

// Query untuk mengambil jumlah total kunjungan
$sqlTotal = "SELECT COUNT(id) AS total_kunjungan FROM kunjungan";
$resultTotal = $conn->query($sqlTotal);
$rowTotal = $resultTotal->fetch_assoc();
$totalKunjungan = $rowTotal['total_kunjungan'];

// Query untuk mengambil jumlah kunjungan bulan ini
$bulanIni = date('m');
$tahunIni = date('Y');
$sqlTotalBulanIni = "SELECT COUNT(id) AS total_kunjungan_bulan_ini FROM kunjungan WHERE MONTH(tgl_kunjungan) = $bulanIni AND YEAR(tgl_kunjungan) = $tahunIni";
$resultTotalBulanIni = $conn->query($sqlTotalBulanIni);
$rowTotalBulanIni = $resultTotalBulanIni->fetch_assoc();
$totalKunjunganBulanIni = $rowTotalBulanIni['total_kunjungan_bulan_ini'];

// Query untuk mengambil jumlah kunjungan hari ini
$sqlTotalHariIni = "SELECT COUNT(id) AS total_kunjungan_hari_ini FROM kunjungan WHERE DATE(tgl_kunjungan) = '$tanggalIni'";
$resultTotalHariIni = $conn->query($sqlTotalHariIni);
$rowTotalHariIni = $resultTotalHariIni->fetch_assoc();
$totalKunjunganHariIni = $rowTotalHariIni['total_kunjungan_hari_ini'];

// Query untuk mengambil data kunjungan berdasarkan bulan
$sqlMonthly = "SELECT MONTH(tgl_kunjungan) AS bulan, COUNT(id) AS total_per_bulan FROM kunjungan WHERE YEAR(tgl_kunjungan) = $tahunIni GROUP BY MONTH(tgl_kunjungan)";
$resultMonthly = $conn->query($sqlMonthly);

// Menginisialisasi array bulan dengan nilai awal 0
$monthlyData = array_fill(1, 12, 0);

// Memasukkan data bulanan ke dalam array
while ($rowMonthly = $resultMonthly->fetch_assoc()) {
    $bulan = $rowMonthly['bulan'];
    $totalPerBulan = $rowMonthly['total_per_bulan'];
    $monthlyData[$bulan] = $totalPerBulan;
}

// Query untuk tabel rekap kunjungan (contoh)
$sqlRekap = "SELECT nama, COUNT(id) AS total_kunjungan FROM kunjungan GROUP BY nama";
$resultRekap = $conn->query($sqlRekap);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
<div class="content-wrapper">
    <h1 class="text-center mb-4"></h1>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $totalKunjunganHariIni; ?></h3>
                            <p> Kunjungan <b>Hari ini</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $totalKunjunganBulanIni; ?></h3>
                            <p><b>Kunjungan Bulan ini</b></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center">Rekap Kunjungan</h3>
                        </div>

                        <div class="tambah-data">
                        <a href="add-kunjungan" class="btn btn-primary">Tambah Data</a>
                        <a href="report-kunjungan" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan</a>
                    </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Total Kunjungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($rowRekap = $resultRekap->fetch_assoc()) {
                                        $nama = $rowRekap['nama'];
                                        $totalKunjungan = $rowRekap['total_kunjungan'];
                                        echo "<tr>
                                                <td>$nama</td>
                                                <td>$totalKunjungan</td>
                                              </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <canvas id="chartMonthly" height="200%"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
    // Data untuk chart kunjungan bulanan
    var monthlyData = <?php echo json_encode(array_values($monthlyData)); ?>;
    var months = ["", "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

    // Konfigurasi Chart.js
    var ctx = document.getElementById('chartMonthly').getContext('2d');
    var chartMonthly = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months.slice(1),
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: monthlyData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
</script>

<?php include '_footer.php'; ?>
</body>
</html>

<?php
$conn->close();
?>
