<?php 
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
include 'aksi/koneksi.php'; 

// Proses form jika dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $KD_BRANCH = isset($_POST['KD_BRANCH']) ? $_POST['KD_BRANCH'] : '';
    $NAMA_BRANCH = isset($_POST['NAMA_BRANCH']) ? $_POST['NAMA_BRANCH'] : '';
    $KD_STORE = isset($_POST['KD_STORE']) ? $_POST['KD_STORE'] : '';
    $NIK_IT_STORE = isset($_POST['NIK_IT_STORE']) ? $_POST['NIK_IT_STORE'] : '';
    $NAMA_IT_STORE = isset($_POST['NAMA_IT_STORE']) ? $_POST['NAMA_IT_STORE'] : '';
    $NAMA_STORE = isset($_POST['NAMA_STORE']) ? $_POST['NAMA_STORE'] : '';
    $TYPE_TOKO = isset($_POST['TYPE_TOKO']) ? $_POST['TYPE_TOKO'] : '';
    $PDT = isset($_POST['PDT']) ? $_POST['PDT'] : '';
    $KONEKSI = isset($_POST['KONEKSI']) ? $_POST['KONEKSI'] : '';
    $TYPE_KONEKSI = isset($_POST['TYPE_KONEKSI']) ? $_POST['TYPE_KONEKSI'] : '';
    $VENDOR_KONEKSI = isset($_POST['VENDOR_KONEKSI']) ? $_POST['VENDOR_KONEKSI'] : '';
    $S_MERK = isset($_POST['S_MERK']) ? $_POST['S_MERK'] : '';
    $S_PROCESSOR = isset($_POST['S_PROCESSOR']) ? $_POST['S_PROCESSOR'] : '';
    $S_MEMORI = isset($_POST['S_MEMORI']) ? $_POST['S_MEMORI'] : '';
    $S_KAPASITAS_STORAGE = isset($_POST['S_KAPASITAS_STORAGE']) ? $_POST['S_KAPASITAS_STORAGE'] : '';
    $S_TYPE_STORAGE = isset($_POST['S_TYPE_STORAGE']) ? $_POST['S_TYPE_STORAGE'] : '';
    $K1_MERK = isset($_POST['K1_MERK']) ? $_POST['K1_MERK'] : '';
    $K1_PROCESSOR = isset($_POST['K1_PROCESSOR']) ? $_POST['K1_PROCESSOR'] : '';
    $K1_MEMORI = isset($_POST['K1_MEMORI']) ? $_POST['K1_MEMORI'] : '';
    $K1_KAPASITAS_STORAGE = isset($_POST['K1_KAPASITAS_STORAGE']) ? $_POST['K1_KAPASITAS_STORAGE'] : '';
    $K1_TYPE_STORAGE = isset($_POST['K1_TYPE_STORAGE']) ? $_POST['K1_TYPE_STORAGE'] : '';
    $K2_MERK = isset($_POST['K2_MERK']) ? $_POST['K2_MERK'] : '';
    $K2_PROCESSOR = isset($_POST['K2_PROCESSOR']) ? $_POST['K2_PROCESSOR'] : '';
    $K2_MEMORI = isset($_POST['K2_MEMORI']) ? $_POST['K2_MEMORI'] : '';
    $K2_KAPASITAS_STORAGE = isset($_POST['K2_KAPASITAS_STORAGE']) ? $_POST['K2_KAPASITAS_STORAGE'] : '';
    $K2_TYPE_STORAGE = isset($_POST['K2_TYPE_STORAGE']) ? $_POST['K2_TYPE_STORAGE'] : '';
    $K3_MERK = isset($_POST['K3_MERK']) ? $_POST['K3_MERK'] : '';
    $K3_PROCESSOR = isset($_POST['K3_PROCESSOR']) ? $_POST['K3_PROCESSOR'] : '';
    $K3_MEMORI = isset($_POST['K3_MEMORI']) ? $_POST['K3_MEMORI'] : '';
    $K3_KAPASITAS_STORAGE = isset($_POST['K3_KAPASITAS_STORAGE']) ? $_POST['K3_KAPASITAS_STORAGE'] : '';
    $K3_TYPE_STORAGE = isset($_POST['K3_TYPE_STORAGE']) ? $_POST['K3_TYPE_STORAGE'] : '';
    $K4_MERK = isset($_POST['K4_MERK']) ? $_POST['K4_MERK'] : '';
    $K4_PROCESSOR = isset($_POST['K4_PROCESSOR']) ? $_POST['K4_PROCESSOR'] : '';
    $K4_MEMORI = isset($_POST['K4_MEMORI']) ? $_POST['K4_MEMORI'] : '';
    $K4_KAPASITAS_STORAGE = isset($_POST['K4_KAPASITAS_STORAGE']) ? $_POST['K4_KAPASITAS_STORAGE'] : '';
    $K4_TYPE_STORAGE = isset($_POST['K4_TYPE_STORAGE']) ? $_POST['K4_TYPE_STORAGE'] : '';

    // Insert data into database (use prepared statements or escape inputs if not already sanitized)
    $sql = "INSERT INTO ceklist_perangkat_it_store (KD_BRANCH, NAMA_BRANCH, KD_STORE, NIK_IT_STORE, NAMA_IT_STORE, NAMA_STORE, TYPE_TOKO, PDT, KONEKSI, TYPE_KONEKSI, VENDOR_KONEKSI, S_MERK, S_PROCESSOR, S_MEMORI, S_KAPASITAS_STORAGE, S_TYPE_STORAGE, K1_MERK, K1_PROCESSOR, K1_MEMORI, K1_KAPASITAS_STORAGE, K1_TYPE_STORAGE, K2_MERK, K2_PROCESSOR, K2_MEMORI, K2_KAPASITAS_STORAGE, K2_TYPE_STORAGE, K3_MERK, K3_PROCESSOR, K3_MEMORI, K3_KAPASITAS_STORAGE, K3_TYPE_STORAGE, K4_MERK, K4_PROCESSOR, K4_MEMORI, K4_KAPASITAS_STORAGE, K4_TYPE_STORAGE)
            VALUES ('$KD_BRANCH', '$NAMA_BRANCH', '$KD_STORE', '$NIK_IT_STORE', '$NAMA_IT_STORE', '$NAMA_STORE', '$TYPE_TOKO', '$PDT', '$KONEKSI', '$TYPE_KONEKSI', '$VENDOR_KONEKSI', '$S_MERK', '$S_PROCESSOR', '$S_MEMORI', '$S_KAPASITAS_STORAGE', '$S_TYPE_STORAGE', '$K1_MERK', '$K1_PROCESSOR', '$K1_MEMORI', '$K1_KAPASITAS_STORAGE', '$K1_TYPE_STORAGE', '$K2_MERK', '$K2_PROCESSOR', '$K2_MEMORI', '$K2_KAPASITAS_STORAGE', '$K2_TYPE_STORAGE', '$K3_MERK', '$K3_PROCESSOR', '$K3_MEMORI', '$K3_KAPASITAS_STORAGE', '$K3_TYPE_STORAGE', '$K4_MERK', '$K4_PROCESSOR', '$K4_MEMORI', '$K4_KAPASITAS_STORAGE', '$K4_TYPE_STORAGE')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "
            <div class='alert alert-success'>
                Data successfully submitted.
            </div>";
    } else {
        $error_message = "
            <div class='alert alert-danger'>
                Error: " . $sql . "<br>" . $conn->error . "
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
            <h1>Input Data Perangkat IT Store</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="ceklist_perangkat_it_store">Perangkat IT Store</a></li>
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
                <h3 class="card-title">Data Perangkat IT Store</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <?php 
                  if (isset($success_message)) echo $success_message;
                  if (isset($error_message)) echo $error_message;
                  ?>
                  <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="KD_BRANCH">Kode Branch</label>
                          <input type="text" name="KD_BRANCH" class="form-control" id="KD_BRANCH" placeholder="Enter Kode Branch" >
                        </div>
                        <div class="form-group">
                          <label for="NAMA_BRANCH">Nama Branch</label>
                          <input type="text" name="NAMA_BRANCH" class="form-control" id="NAMA_BRANCH" placeholder="Enter Nama Branch" >
                        </div>
                        <div class="form-group">
                          <label for="KD_STORE">Kode Store</label>
                          <input type="text" name="KD_STORE" class="form-control" id="KD_STORE" placeholder="Enter Kode Store" >
                        </div>
                        <div class="form-group">
                          <label for="NIK_IT_STORE">NIK IT Store</label>
                          <input type="text" name="NIK_IT_STORE" class="form-control" id="NIK_IT_STORE" placeholder="Enter NIK IT Store" >
                        </div>
                        <div class="form-group">
                          <label for="NAMA_IT_STORE">Nama IT Store</label>
                          <input type="text" name="NAMA_IT_STORE" class="form-control" id="NAMA_IT_STORE" placeholder="Enter Nama IT Store" >
                        </div>
                        <div class="form-group">
                          <label for="NAMA_STORE">Nama Store</label>
                          <input type="text" name="NAMA_STORE" class="form-control" id="NAMA_STORE" placeholder="Enter Nama Store" >
                        </div>
                        <div class="form-group">
                          <label for="TYPE_TOKO">Type Toko</label>
                          <input type="text" name="TYPE_TOKO" class="form-control" id="TYPE_TOKO" placeholder="Enter Type Toko" >
                        </div>
                        <div class="form-group">
                          <label for="PDT">PDT</label>
                          <input type="text" name="PDT" class="form-control" id="PDT" placeholder="Enter PDT" >
                        </div>
                        <div class="form-group">
                          <label for="KONEKSI">Koneksi</label>
                          <input type="text" name="KONEKSI" class="form-control" id="KONEKSI" placeholder="Enter Koneksi" >
                        </div>
                        <div class="form-group">
                          <label for="TYPE_KONEKSI">Type Koneksi</label>
                          <input type="text" name="TYPE_KONEKSI" class="form-control" id="TYPE_KONEKSI" placeholder="Enter Type Koneksi" >
                        </div>
                        <div class="form-group">
                          <label for="VENDOR_KONEKSI">Vendor Koneksi</label>
                          <input type="text" name="VENDOR_KONEKSI" class="form-control" id="VENDOR_KONEKSI" placeholder="Enter Vendor Koneksi" >
                        </div>
                    </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label for="S_MERK">Server Merk</label>
                            <input type="text" name="S_MERK" class="form-control" id="S_MERK" placeholder="Enter Server Merk" >
                            </div>
                            <div class="form-group">
                            <label for="S_PROCESSOR">Server Processor</label>
                            <input type="text" name="S_PROCESSOR" class="form-control" id="S_PROCESSOR" placeholder="Enter Server Processor" >
                            </div>
                            <div class="form-group">
                            <label for="S_MEMORI">Server Memori</label>
                            <input type="text" name="S_MEMORI" class="form-control" id="S_MEMORI" placeholder="Enter Server Memori" >
                            </div>
                            <div class="form-group">
                            <label for="S_KAPASITAS_STORAGE">Server Kapasitas Storage</label>
                            <input type="text" name="S_KAPASITAS_STORAGE" class="form-control" id="S_KAPASITAS_STORAGE" placeholder="Enter Server Kapasitas Storage" >
                            </div>
                            <div class="form-group">
                            <label for="S_TYPE_STORAGE">Server Type Storage</label>
                            <input type="text" name="S_TYPE_STORAGE" class="form-control" id="S_TYPE_STORAGE" placeholder="Enter Server Type Storage" >
                            </div>
                            <!-- Kasir 2-->
                            <div class="form-group">
                            <label for="K1_MERK">Kasir 1 Merk</label>
                            <input type="text" name="K1_MERK" class="form-control" id="K1_MERK" placeholder="Enter Komputer 1 Merk" >
                            </div>
                            <div class="form-group">
                            <label for="K1_PROCESSOR">Kasir 1 Processor</label>
                            <input type="text" name="K1_PROCESSOR" class="form-control" id="K1_PROCESSOR" placeholder="Enter Komputer 1 Processor" >
                            </div>
                            <div class="form-group">
                            <label for="K1_MEMORI">Kasir 1 Memori</label>
                            <input type="text" name="K1_MEMORI" class="form-control" id="K1_MEMORI" placeholder="Enter Komputer 1 Memori" >
                            </div>
                            <div class="form-group">
                            <label for="K1_KAPASITAS_STORAGE">Kasir 1 Kapasitas Storage</label>
                            <input type="text" name="K1_KAPASITAS_STORAGE" class="form-control" id="K1_KAPASITAS_STORAGE" placeholder="Enter Komputer 1 Kapasitas Storage" >
                            </div>
                            <div class="form-group">
                            <label for="K1_TYPE_STORAGE">Kasir 1 Type Storage</label>
                            <input type="text" name="K1_TYPE_STORAGE" class="form-control" id="K1_TYPE_STORAGE" placeholder="Enter Komputer 1 Type Storage" >
                            </div>
                        

                            <!-- Kasir 2-->
                            <div class="form-group">
                            <label for="K2_MERK">Kasir 2 Merk</label>
                            <input type="text" name="K2_MERK" class="form-control" id="K2_MERK" placeholder="Enter Komputer 2 Merk" >
                            </div>
                            <div class="form-group">
                            <label for="K2_PROCESSOR">Kasir 2 Processor</label>
                            <input type="text" name="K2_PROCESSOR" class="form-control" id="K2_PROCESSOR" placeholder="Enter Komputer 2 Processor" >
                            </div>
                            <div class="form-group">
                            <label for="K2_MEMORI">Kasir 2 Memori</label>
                            <input type="text" name="K2_MEMORI" class="form-control" id="K2_MEMORI" placeholder="Enter Komputer 2 Memori" >
                            </div>
                            <div class="form-group">
                            <label for="K2_KAPASITAS_STORAGE">Kasir 2 Kapasitas Storage</label>
                            <input type="text" name="K2_KAPASITAS_STORAGE" class="form-control" id="K2_KAPASITAS_STORAGE" placeholder="Enter kasir 2 Kapasitas Storage" >
                            </div>
                            <div class="form-group">
                            <label for="K2_TYPE_STORAGE">Kasir 2 Type Storage</label>
                            <input type="text" name="K2_TYPE_STORAGE" class="form-control" id="K2_TYPE_STORAGE" placeholder="Enter kasie 2 Type Storage" >
                            </div>


                            <!-- Kasir 3-->
                            <div class="form-group">
                            <label for="K3_MERK">Kasir 3 Merk</label>
                            <input type="text" name="K3_MERK" class="form-control" id="K3_MERK" placeholder="Enter kasir 3 Merk" >
                            </div>
                            <div class="form-group">
                            <label for="K3_PROCESSOR">Kasir 3 Processor</label>
                            <input type="text" name="K1_PROCESSOR" class="form-control" id="K3_PROCESSOR" placeholder="Enter kasir 3 Processor" >
                            </div>
                            <div class="form-group">
                            <label for="K3_MEMORI">Kasir 3 Memori</label>
                            <input type="text" name="K3_MEMORI" class="form-control" id="K3_MEMORI" placeholder="Enter kasir 3 Memori" >
                            </div>
                            <div class="form-group">
                            <label for="K3_KAPASITAS_STORAGE">Kasir 3 Kapasitas Storage</label>
                            <input type="text" name="K3_KAPASITAS_STORAGE" class="form-control" id="K3_KAPASITAS_STORAGE" placeholder="Enter kasir 3 Kapasitas Storage" >
                            </div>
                            <div class="form-group">
                            <label for="K3_TYPE_STORAGE">Kasir 3 Type Storage</label>
                            <input type="text" name="K3_TYPE_STORAGE" class="form-control" id="K3_TYPE_STORAGE" placeholder="Enter kasir 3 Type Storage" >
                            </div>
                        </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <a href="ceklist_perangkat_it_store" class="btn btn-primary">Kembali</a>
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
