<?php 
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
include 'aksi/koneksi.php';

// Pastikan koneksi berhasil
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil daftar KODE_TOKO untuk dropdown filter
$sql_kode_toko = "SELECT DISTINCT KODE_TOKO FROM report_penjualan";
$result_kode_toko = $conn->query($sql_kode_toko);

$kode_toko_list = [];
if ($result_kode_toko->num_rows > 0) {
    while($row = $result_kode_toko->fetch_assoc()) {
        $kode_toko_list[] = $row['KODE_TOKO'];
    }
}

// Inisialisasi variabel filter
$filter_kode_toko = isset($_GET['kode_toko']) ? $_GET['kode_toko'] : 'ALL';

// Query untuk data utama
$sql = "SELECT * FROM report_penjualan";

// Persiapkan statement
if ($filter_kode_toko !== 'ALL') {
    $sql .= " WHERE KODE_TOKO = ?";
}

$sql .= " ORDER BY date DESC";

// Persiapkan statement dan bind parameter jika perlu
if ($stmt = $conn->prepare($sql)) {
    if ($filter_kode_toko !== 'ALL') {
        $stmt->bind_param("s", $filter_kode_toko);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    // Inisialisasi variabel dengan nilai default jika tidak ada data
    $kode_toko = '';
    $nama_store = '';
    $jenis = '';
    $area = '';
    $ac = 0;
    $am = 0;
    $spd = 0;
    $std = 0;
    $apc = 0;
    $gm = 0;
    $gmper = 0;
    $inv = 0;
    $oos_o = 0;
    $oos_f = 0;
    $oos_m = 0;
    $oos_b = 0;
    $rp_musnah = 0;
    $date = '';

    // Hitung total GM, INV, APC, STD
    $total_gm = 0;
    $total_inv = 0;
    $total_apc = 0;
    $total_std = 0;

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        // Menghitung total GM, INV, APC, STD
        $total_gm = array_sum(array_column($rows, 'GM'));
        $total_inv = array_sum(array_column($rows, 'INV'));
        $total_apc = array_sum(array_column($rows, 'APC'));
        $total_std = array_sum(array_column($rows, 'STD'));

        // Ambil data pertama untuk variabel lainnya
        $first_row = $rows[0];
        $kode_toko = isset($first_row['KODE_TOKO']) ? $first_row['KODE_TOKO'] : '';
        $nama_store = isset($first_row['Nama_Store']) ? $first_row['Nama_Store'] : '';
        $jenis = isset($first_row['Jenis']) ? $first_row['Jenis'] : '';
        $area = isset($first_row['Area']) ? $first_row['Area'] : '';
        $ac = isset($first_row['AC']) ? $first_row['AC'] : 0;
        $am = isset($first_row['AM']) ? $first_row['AM'] : 0;
        $spd = isset($first_row['SPD']) ? $first_row['SPD'] : 0;
        $std = isset($first_row['STD']) ? $first_row['STD'] : 0;
        $apc = isset($first_row['APC']) ? $first_row['APC'] : 0;
        $gm = isset($first_row['GM']) ? $first_row['GM'] : 0;
        $gmper = isset($first_row['GMPER']) ? $first_row['GMPER'] : 0;
        $inv = isset($first_row['INV']) ? $first_row['INV'] : 0;
        $oos_o = isset($first_row['OOS_O']) ? $first_row['OOS_O'] : 0;
        $oos_f = isset($first_row['OOS_F']) ? $first_row['OOS_F'] : 0;
        $oos_m = isset($first_row['OOS_M']) ? $first_row['OOS_M'] : 0;
        $oos_b = isset($first_row['OOS_B']) ? $first_row['OOS_B'] : 0;
        $rp_musnah = isset($first_row['RP_MUSNAH']) ? $first_row['RP_MUSNAH'] : 0;
        $date = isset($first_row['date']) ? $first_row['date'] : '';
    }

} else {
    die("Prepare failed: " . $conn->error);
}

// Query untuk data chart harian
$sql_chart = "SELECT date, SPD FROM report_penjualan WHERE KODE_TOKO = ? ORDER BY date DESC";

// Persiapkan statement dan bind parameter untuk chart
if ($stmt_chart = $conn->prepare($sql_chart)) {
    $stmt_chart->bind_param("s", $filter_kode_toko);
    $stmt_chart->execute();
    $result_chart = $stmt_chart->get_result();
    $raw_chart_data = [];
    while ($row_chart = $result_chart->fetch_assoc()) {
        $raw_chart_data[] = $row_chart;
    }
    $stmt_chart->close(); // Tutup statement setelah digunakan

    // Kelompokkan data berdasarkan tanggal
    $chart_data = [];
    foreach ($raw_chart_data as $data) {
        $date = $data['date'];
        if (!isset($chart_data[$date])) {
            $chart_data[$date] = 0;
        }
        $chart_data[$date] += $data['SPD'];
    }

    // Format data untuk chart
    $formatted_chart_data = [];
    foreach ($chart_data as $date => $spd) {
        $formatted_chart_data[] = ['date' => $date, 'SPD' => $spd];
    }
} else {
    die("Prepare failed: " . $conn->error);
}

// Data untuk total pendapatan bulanan
$sql_total_bulanan = "SELECT YEAR(date) AS tahun, MONTH(date) AS bulan, SUM(SPD) AS total_spd 
                     FROM report_penjualan 
                     WHERE KODE_TOKO = ? 
                     GROUP BY YEAR(date), MONTH(date) 
                     ORDER BY tahun DESC, bulan DESC";

$total_bulanan = [];

// Persiapkan statement dan bind parameter untuk total bulanan
if ($stmt_total_bulanan = $conn->prepare($sql_total_bulanan)) {
    $stmt_total_bulanan->bind_param("s", $filter_kode_toko);
    $stmt_total_bulanan->execute();
    $result_total_bulanan = $stmt_total_bulanan->get_result();
    while ($row_total_bulanan = $result_total_bulanan->fetch_assoc()) {
        $total_bulanan[] = $row_total_bulanan;
    }
    $stmt_total_bulanan->close(); // Tutup statement setelah digunakan
} else {
    die("Prepare failed: " . $conn->error);
}

// Query untuk data current SPD pada tanggal saat ini
$current_date = date('Y-m-d');
$sql_current_spd = "SELECT SUM(SPD) AS current_spd 
                   FROM report_penjualan 
                   WHERE date = ?";

if ($filter_kode_toko !== 'ALL') {
    $sql_current_spd .= " AND KODE_TOKO = ?";
}

if ($stmt_current_spd = $conn->prepare($sql_current_spd)) {
    if ($filter_kode_toko !== 'ALL') {
        $stmt_current_spd->bind_param("ss", $current_date, $filter_kode_toko);
    } else {
        $stmt_current_spd->bind_param("s", $current_date);
    }
    $stmt_current_spd->execute();
    $result_current_spd = $stmt_current_spd->get_result();
    $current_spd = 0;
    if ($row_current_spd = $result_current_spd->fetch_assoc()) {
        $current_spd = $row_current_spd['current_spd'];
    }
    $stmt_current_spd->close(); // Tutup statement setelah digunakan
} else {
    die("Prepare failed: " . $conn->error);
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .container { display: flex; flex-direction: column; align-items: center; }
        .card { display: flex; flex-direction: row; margin: 10px; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .card div { margin: 0 10px; }
        .card .green { background-color: #28a745; color: white; padding: 10px; border-radius: 5px; }
        .card .red { background-color: #dc3545; color: white; padding: 10px; border-radius: 5px; }
        .filter-container { display: flex; justify-content: center; margin-bottom: 50px; }
        .filter-container form { display: flex; align-items: center; }
        .filter-container label { margin-right: 50px; }
        .filter-container select { width: 20px; margin-right: 10px; }
        .filter-container button { padding: 5px 5px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .filter-container button:hover { background-color: #0056b3; }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="filter-container">
                    <form method="GET" action="">
                        <label for="kode_toko">Pilih Kode Toko:</label>
                        <select name="kode_toko" id="kode_toko" style="width: 200px;">
                            <option value="ALL" <?= $filter_kode_toko === 'ALL' ? 'selected' : '' ?>>ALL</option>
                            <?php foreach ($kode_toko_list as $kode_toko_item): ?>
                                <option value="<?= $kode_toko_item ?>" <?= $filter_kode_toko === $kode_toko_item ? 'selected' : '' ?>>
                                    <?= $kode_toko_item ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit">Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kode_toko').select2({
                placeholder: "Cari atau pilih kode toko",
                allowClear: true
            });
        });
    </script>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Rp <?= number_format($current_spd, 0, ',', '.'); ?></h3>
                                    <p>Pendapatan <b>Hari ini</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>Rp <?= number_format($total_gm, 0, ',', '.'); ?></h3>
                                    <p><b>GM</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="small-box" style="background: #fff;">
                                <div class="inner">
                                    <h3><?= $total_inv; ?></h3>
                                    <p><b>INV</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-shopping-cart" style="color: #17a2b8;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="small-box" style="background: #fff;">
                                <div class="inner">
                                    <h3>Rp <?= number_format($total_apc, 0, ',', '.'); ?></h3>
                                    <p><b>APC</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-shopping-bag" style="color: #28a745;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="small-box" style="background: #fff;">
                                <div class="inner">
                                    <h3><?= $total_std; ?></h3>
                                    <p><b>Total</b> Customer Toko</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-table" style="color: #dc3545;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <canvas id="salesChart" height="200%"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <canvas id="totalSalesChart" height="200%"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>
</div>

<script>
    // Data untuk chart harian
    const chartData = <?= json_encode($formatted_chart_data); ?>;
    const labels = chartData.map(data => data.date);
    const data = chartData.map(data => data.SPD);

    // Data untuk chart total pendapatan bulanan
    const totalData = <?= json_encode(array_column($total_bulanan, 'total_spd')); ?>;
    const totalLabels = <?= json_encode(array_map(function($item) {
        return "{$item['bulan']}/{$item['tahun']}";
    }, $total_bulanan)); ?>;

    // Menggambar chart harian
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan Harian (SPD)',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Menggambar chart total pendapatan bulanan
    const ctxTotal = document.getElementById('totalSalesChart').getContext('2d');
    const totalSalesChart = new Chart(ctxTotal, {
        type: 'bar',
        data: {
            labels: totalLabels,
            datasets: [{
                label: 'Total Pendapatan (SPD) per Bulan',
                data: totalData,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
<?php include '_footer.php'; ?>