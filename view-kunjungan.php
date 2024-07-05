<?php 
ob_start(); // Mulai buffer output
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
include 'aksi/koneksi.php'; 

// Mendapatkan data dari database untuk ditampilkan di form edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kunjungan WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan!";
        exit();
    }
}

// Jika form edit dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $kode_toko = $_POST["kode_toko"];
    $nama_store = $_POST["nama_store"];
    $tgl_kunjungan = $_POST["tgl_kunjungan"];
    $catatan = $_POST['catatan'];

    // Mengelola upload file foto_before
    if ($_FILES['foto_before']['name']) {
        $foto_before = 'uploads/' . basename($_FILES['foto_before']['name']);
        move_uploaded_file($_FILES['foto_before']['tmp_name'], $foto_before);
    } else {
        $foto_before = $_POST['existing_foto_before'];
    }

    // Mengelola upload file foto_after
    if ($_FILES['foto_after']['name']) {
        $foto_after = 'uploads/' . basename($_FILES['foto_after']['name']);
        move_uploaded_file($_FILES['foto_after']['tmp_name'], $foto_after);
    } else {
        $foto_after = $_POST['existing_foto_after'];
    }

    $sql = "UPDATE kunjungan SET 
            nama='$nama', 
            kode_toko='$kode_toko', 
            nama_store='$nama_store', 
            tgl_kunjungan='$tgl_kunjungan', 
            foto_before='$foto_before', 
            foto_after='$foto_after', 
            catatan='$catatan'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: kunjungan.php"); // Kembali ke halaman utama setelah update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Data Kunjungan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="kunjungan">Kunjungan</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Kunjungan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php 
                  if (isset($success_message)) echo $success_message;
                  if (isset($error_message)) echo $error_message;
                  ?>
                  <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">  
                        <label for="nama">Nama PIC</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row['nama']; ?>" readonly required>
                        </div>
                        <div class="form-group">
                          <label for="kode_toko">Kode Toko:</label>
                          <input type="text" id="kode_toko" name="kode_toko" class="form-control" value="<?php echo $row['kode_toko']; ?>" readonly required>
                        </div>
                        <div class="form-group">
                          <label for="nama_store">Nama Store:</label>
                          <input type="text" id="nama_store" name="nama_store" class="form-control" value="<?php echo $row['nama_store']; ?>" readonly required>
                        </div> 
                        <div class="form-group">
                          <label for="tgl_kunjungan">Tanggal Kunjungan:</label>
                          <input type="date" id="tgl_kunjungan" name="tgl_kunjungan" class="form-control" value="<?php echo $row['tgl_kunjungan']; ?>" readonly required>
                        </div>
                        <div class="form-group">
                          <label for="catatan">Catatan:</label>
                          <textarea id="catatan" name="catatan"  readonly class="form-control" rows="3" placeholder="Masukkan catatan jika diperlukan"><?php echo $row['catatan']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="foto_before">Foto Before:</label>
                         
                          <?php if (!empty($row['foto_before'])): ?>
                              <img src="<?php echo $row['foto_before']; ?>" alt="Foto Before" width="100">
                              <input type="hidden" name="existing_foto_before" value="<?php echo $row['foto_before']; ?>">
                          <?php endif; ?>
                        </div>
                        <div class="form-group">
                          <label for="foto_after">Foto After:</label>
                         
                          <?php if (!empty($row['foto_after'])): ?>
                              <img src="<?php echo $row['foto_after']; ?>" alt="Foto After" width="100">
                              <input type="hidden" name="existing_foto_after" value="<?php echo $row['foto_after']; ?>">
                          <?php endif; ?>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                <a href="kunjungan" class="btn btn-primary">kembali</a>
               
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

<?php 
include '_footer.php'; 
ob_end_flush(); // Mengakhiri buffer output dan mengirim output ke browser
?>
