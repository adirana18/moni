<?php 
include '_header.php';
include '_nav.php';
include '_sidebar.php'; 
include 'aksi/koneksi.php';

// Mengambil data cabang dari URL
$id = abs((int)base64_decode($_GET["cabang"]));

// Menentukan judul cabang
$titleCabang = ($id < 1) ? "Pusat" : "Cabang " . $id;
?>

<?php
// Mengarahkan pengguna berdasarkan level login
if ($levelLogin == "Petugas" || $levelLogin == "kurir") {
    echo "
      <script>
        document.location.href = 'bo';
      </script>
    ";
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User <b><?= $titleCabang; ?></b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="bo">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
                <div class="tambah-data">
                    <a href="user-add?cabang=<?= base64_encode($id); ?>" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Mengambil data user dari database
    $data = query("SELECT * FROM user WHERE user_cabang = $id AND user_id > 1 ORDER BY user_id DESC");
    ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data User Keseluruhan</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>No. Hp</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center; width: 14%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row['user_nama']; ?></td>
                                    <td><?= $row['user_no_hp']; ?></td>
                                    <td><?= $row['user_email']; ?></td>
                                    <td style="text-transform: capitalize;"><?= $row['user_level']; ?></td>
                                    <td style="text-align: center;">
                                        <?php 
                                        if ($row['user_status'] === "1") {
                                            echo "<b>Aktif</b>";
                                        } else {
                                            echo "<b style='color: red;'>Tidak Aktif</b>";
                                        }
                                        ?>      
                                    </td>
                                    <td class="orderan-online-button">
                                        <?php $idUser = $row["user_id"]; ?>
                                        <a href="user-zoom?id=<?= $idUser; ?>&cabang=<?= base64_encode($id); ?>" title="Zoom Data">
                                            <button class="btn btn-success" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </a>
                                        <a href="user-edit?id=<?= $idUser; ?>&cabang=<?= base64_encode($id); ?>" title="Edit Data">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <?php if ($_SESSION['user_id'] != $idUser) : ?>
                                        <a href="user-delete?id=<?= base64_encode($idUser); ?>&cabang=<?= base64_encode($id); ?>" onclick="return confirm('Yakin dihapus?')" title="Delete Data">
                                            <button class="btn btn-danger" type="submit" name="hapus">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </a>
                                        <?php else : ?>
                                        <a href="#!" title="Delete Data">
                                            <button class="btn btn-default" type="submit" name="hapus">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-id-2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Warning</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>
                    Data User ada di dalam data Invoice Jadi <b>TIDAK BISA DIHAPUS</b>
                </h4>
                <small>
                    Jika ingin menghapus user ini Lakukan <b>Hapus Semua Data Invoice</b> dengan Transaksi <b>user tersebut !!</b>
                </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php include '_footer.php'; ?>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
$(function () {
    $("#example1").DataTable();
});
</script>
</body>
</html>

<?php include '_footer.php'; ?>