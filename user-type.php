<?php 
  include '_header.php';
  include '_nav.php';
  include '_sidebar.php'; 
?>

<?php
  if ( $levelLogin === "admin" ) {
    $query_toko = mysqli_query($conn, "SELECT * FROM toko WHERE toko_cabang = '$sessionCabang' AND toko_status > 0");
    $row_toko = mysqli_fetch_assoc($query_toko);
      echo "
        <script>
          document.location.href = 'users?cabang=".base64_encode($row_toko['toko_cabang']).strtolower(str_replace(' ', '-', $row_toko['toko_nama']))."';
        </script>
      ";
  }

  else if ( $levelLogin !== "super admin") {
    echo "
      <script>
        document.location.href = 'bo';
      </script>
    ";
  }
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User per Lokasi</h1>
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

    <?php  
        $toko = query("SELECT * FROM toko WHERE toko_status > 0");
    ?>
    <section class="content tipe-pembayaran">
      <div class="row">
        <?php foreach ( $toko as $row ) : ?>
        <div class="col-lg-3 col-md-6">
            <div class="box-pembayaran">
                <a href="users?cabang=<?= base64_encode($row['toko_cabang']); ?><?= strtolower(str_replace(' ', '-', $row['toko_nama'])) ?>">
                  <div class="box-pembayaran-parent">
                    <?php  
                      $tipeToko = $row['toko_cabang'];

                      if ( $tipeToko == 0 ) {
                        echo "pusat";
                      } else {
                        echo "cabang ".$tipeToko;
                      }
                    ?>
                  </div>
                  <div class="box-pembayaran-title">
                      Kota <?= $row['toko_kota']; ?>
                  </div>
                  <div class="box-pembayaran-cta">
                      <i class="fa fa-chevron-right"></i>
                  </div>
                </a>
            </div>
          </div>
          <?php endforeach; ?>
      </div>
    </section>
  </div>


<?php include '_footer.php'; ?>