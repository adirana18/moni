<?php 
  include '_header.php';
  include '_nav.php';
  include '_sidebar.php'; 
?>

<?php
  if ( $levelLogin == "Petugas" || $levelLogin == "kurir" ) {
    echo "
      <script>
        document.location.href = 'bo';
      </script>
    ";
  }
    
?>



<?php  
// ambil data di URL
$id = abs((int)$_GET['id']);
$cabang = $_GET['cabang'];


// query data mahasiswa berdasarkan id
$user = query("SELECT * FROM user WHERE user_id = $id ")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
  // var_dump($_POST);

  // cek apakah data berhasil di tambahkan atau tidak
  if( editUser($_POST) > 0 ) {
    echo "
      <script>
        document.location.href = 'users?cabang=".$cabang."';
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
            <h1>Edit Data User</h1>
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
                <h3 class="card-title">Data User Edit</h3>
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
                          <input type="text" name="user_nama" class="form-control" id="user_nama" value="<?= $user['user_nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="user_no_hp">No. Hp</label>
                            <input type="text" name="user_no_hp" class="form-control" id="user_no_hp" value="<?= $user['user_no_hp']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="user_alamat">Alamat</label>
                            <textarea name="user_alamat" id="user_alamat" class="form-control" rows="5" required="required"><?= $user['user_alamat']; ?></textarea>
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
                              <select name="user_level" required="" class="form-control ">
                                  <option value="<?= $user['user_level']; ?>"><?= $level; ?></option>
                                  <?php  
                                    if ( $user['user_level'] === "super admin" ) {
                                      echo'
                                        <option value="admin">Admin</option>
                                        <option value="Petugas">Petugas</option>
                                        <option value="kurir">Kurir</option>
                                      ';
                                    } elseif ( $user['user_level'] === "admin" ) {
                                      echo'
                                        <option value="Petugas">Petugas</option>
                                        <option value="super admin">Super Admin</option>
                                        <option value="kurir">Kurir</option>
                                      ';
                                    } elseif ( $user['user_level'] === "kurir" ) {
                                      echo'
                                        <option value="Petugas">Petugas</option>
                                        <option value="super admin">Super Admin</option>
                                        <option value="Petugas">Petugas</option>
                                      ';
                                    } else {
                                      echo'
                                        <option value="admin">Admin</option>
                                        <option value="super admin">Super Admin</option>
                                        <option value="kurir">Kurir</option>
                                      ';
                                    }
                                  ?>
                              </select>
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
                                  <select name="user_status" required="" class="form-control ">
                                    <option value="<?= $user['user_status']; ?>"><?= $status; ?></option>
                                    <?php  
                                      if ( $user['user_status'] === "1" ) {
                                        echo '
                                          <option value="0">Not Active</option>
                                        ';
                                      } else {
                                        echo '
                                          <option value="1">Active</option>
                                        ';
                                      }
                                    ?>
                                  </select>
                              </div>
                          </div>
                        <div class="form-group">
                          <label for="user_email">Email</label>
                          <input type="email" name="user_email" class="form-control" id="user_email" value="<?= $user['user_email']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" name="user_password" class="form-control" id="user_password" placeholder="Password" required="">
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
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