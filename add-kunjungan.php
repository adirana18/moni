<?php 
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
include 'aksi/koneksi.php'; 

// Proses form jika dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $kode_toko = isset($_POST['kode_toko']) ? $_POST['kode_toko'] : '';
    $nama_store = isset($_POST['nama_store']) ? $_POST['nama_store'] : '';
    $tgl_kunjungan = isset($_POST['tgl_kunjungan']) ? $_POST['tgl_kunjungan'] : '';
    $catatan = isset($_POST['catatan']) ? $_POST['catatan'] : '';
    $nama_pejabat = isset($_POST['nama_pejabat']) ? $_POST['nama_pejabat'] : '';
    $nik_pejabat = isset($_POST['nik_pejabat']) ? $_POST['nik_pejabat'] : '';
    
    // Lanjutkan dengan pemrosesan form


    
    // Handle file uploads
    $foto_before = $_FILES['foto_before'];
    $foto_after = $_FILES['foto_after'];

    // Assuming a "uploads" directory exists and is writable
    $upload_dir = 'uploads/';
    $foto_before_path = $upload_dir . basename($foto_before['name']);
    $foto_after_path = $upload_dir . basename($foto_after['name']);

    if (move_uploaded_file($foto_before['tmp_name'], $foto_before_path) && move_uploaded_file($foto_after['tmp_name'], $foto_after_path)) {
        // Insert data into database (use prepared statements or escape inputs if not already sanitized)
        $sql = "INSERT INTO kunjungan (nama, kode_toko, nama_store, tgl_kunjungan, foto_before, foto_after, catatan,nama_pejabat,nik_pejabat)
                VALUES ('$nama', '$kode_toko', '$nama_store', '$tgl_kunjungan', '$foto_before_path', '$foto_after_path', '$catatan','$nama_pejabat','$nik_pejabat')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "
                <div class='alert alert-success'>
                    Data successfully submitted $tgl_kunjungan.<br>
                   
                </div>";
        } else {
            $error_message = "
                <div class='alert alert-danger'>
                    Error: " . $sql . "<br>" . $conn->error . "
                </div>";
        }
    } else {
        $error_message = "
            <div class='alert alert-danger'>
                Error uploading files.
            </div>";
    }
}

$conn->close();
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
              <li class="breadcrumb-item active">Add</li>
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
                          <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter Nama PIC" required>
                        </div>
                        <div class="form-group">
                          <label for="kode_toko">Kode Toko:</label>
                          <input type="text" id="kode_toko" name="kode_toko" class="form-control" placeholder="Kode Toko" required>
                        </div>
                        <div class="form-group">
                          <label for="nama_store">Nama Store:</label>
                          <input type="text" id="nama_store" name="nama_store" class="form-control" placeholder="Nama Store" required>
                        </div> 
                        <div class="form-group">
                          <label for="nama_store">Nama Pejabat:</label>
                          <input type="text" id="nama_pejabat" name="nama_pejabat" class="form-control" placeholder="Nama Pejabat" required>
                        </div> 
                        <div class="form-group">
                          <label for="nama_store">Nik Pejabat:</label>
                          <input type="text" id="nik_pejabat" name="nik_pejabat" class="form-control" placeholder="Nik Pejabat" required>
                        </div> 
                        
                    </div>
                    <div class="col-md-6 col-lg-6">
                      <div class="form-group">
                          <label for="tgl_kunjungan">Tanggal Kunjungan:</label>
                          <input type="date" id="tgl_kunjungan" name="tgl_kunjungan" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="before">Foto Before:</label>
                          <input type="file" id="foto_before" name="foto_before" accept="image/*" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="foto_after">Foto After:</label>
                          <input type="file" id="foto_after" name="foto_after" accept="image/*" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="catatan">Catatan:</label>
                          <textarea id="catatan" name="catatan" class="form-control" rows="3" placeholder="Masukkan catatan jika diperlukan"></textarea>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                <a href="kunjungan" class="btn btn-primary">kembali</a>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include '_footer.php'; ?>