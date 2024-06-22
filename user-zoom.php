<?php 
  include '_header.php';
  include '_nav.php';
  include '_sidebar.php'; 
?>

<?php  
  if ( $levelLogin !== "super admin" ) {
    echo "
      <script>
        document.location.href = 'bo';
      </script>
    ";
  }
    
?>

<?php  
// ambil data di URL
$id = $_GET["id"];


// query data mahasiswa berdasarkan id
$user = query("SELECT * FROM user WHERE user_id = $id ")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
  // var_dump($_POST);

  // cek apakah data berhasil di tambahkan atau tidak
  if( editUser($_POST) > 0 ) {
    echo "
      <script>
        document.location.href = 'users';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Data gagal diedit');
      </script>
    ";
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
            <h1>Tambah Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="bo">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
                <h3 class="card-title">Data User Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" name="user_id" value="<?= $user["user_id"]; ?>">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                          <label for="user_nama">Nama Lengkap</label>
                          <input type="text" name="user_nama" class="form-control" id="user_nama" value="<?= $user['user_nama']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="user_no_hp">No. Hp</label>
                            <input type="text" name="user_no_hp" class="form-control" id="user_no_hp" value="<?= $user['user_no_hp']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="user_alamat">Alamat</label>
                            <textarea name="user_alamat" id="user_alamat" class="form-control" rows="5" readonly="readonly"><?= $user['user_alamat']; ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group ">
                            <label for="user_level" class="">Level</label>
                            <div class="">
                              <?php  
                                if ( $user['user_level'] === "super admin" ) {
                                  $level = "Super Admin";
                                } elseif ( $user['user_level'] === "admin" ) {
                                  $level = "Admin";
                                } elseif ( $user['user_level'] === "kurir" ) {
                                  $level = "Kurir";
                                } else {
                                  $level = "Petugas";
                                }
                              ?>
                            <input type="text" name="" class="form-control" id="" value="<?= $level; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group ">
                              <label for="user_status">Status</label>
                              <div class="">
                                <?php  
                                  if ( $user['user_status'] === "1" ) {
                                    $status = "Active";
                                  } else {
                                    $status = "Not Active";
                                  }
                                ?>
                                   <input type="text" name="" class="form-control" id="" value="<?= $status; ?>" readonly>
                              </div>
                          </div>
                        <div class="form-group">
                          <label for="user_email">Email</label>
                          <input type="email" name="user_email" class="form-control" id="user_email" value="<?= $user['user_email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="user_create">Waktu Create</label>
                            <input type="text" name="user_create" class="form-control" id="user_create" value="<?= $user['user_create']; ?>" readonly="">
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <a href="users?cabang=<?= $_GET['cabang']; ?>" class="btn btn-success">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>


<?php include '_footer.php'; ?>