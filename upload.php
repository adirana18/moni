<?php 
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SQL Query to Database</title>
</head>
<body>

<?php
// Konfigurasi koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "moni";

// Buat koneksi
$koneksi = mysqli_connect($server, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses form jika ada input query SQL
if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<div style="color: green;">Query berhasil dijalankan.</div>';

        // Jika query adalah SELECT, tampilkan hasilnya
        if (mysqli_field_count($koneksi) > 0) {
            echo '<h2>Hasil Query:</h2>';
            echo '<table border="1" cellpadding="5" cellspacing="0">';
            echo '<tr>';

            // Tampilkan nama kolom
            while ($field = mysqli_fetch_field($result)) {
                echo '<th>' . $field->name . '</th>';
            }
            echo '</tr>';

            // Tampilkan baris data
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td>' . $value . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
    } else {
        echo '<div style="color: red;">Query gagal dijalankan.</div>';
    }
}
?>

<div style="width: 60%; margin: 0 auto; text-align: left;">
    <h2>Execute SQL Query</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="query">Masukkan Query SQL:</label><br>
        <textarea name="query" id="query" cols="60" rows="8"></textarea><br><br>
        <input type="submit" value="Jalankan Query">
    </form>
</div>


</body>
</html>

<?php include '_footer.php'; ?>