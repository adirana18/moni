    <?php 
    include '_header.php';
    include '_nav.php';
    include '_sidebar.php'; 
    include 'aksi/koneksi.php'; 

    // Menampilkan data dari database
    $sql = "SELECT id, nama, kode_toko, nama_store, tgl_kunjungan, foto_before, foto_after, created_at, catatan FROM kunjungan";
    $result = $conn->query($sql);
    ?>


    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Kunjungan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="bo">Home</a></li>
                            <li class="breadcrumb-item active">Kunjungan</li>
                        </ol>
                    </div>
                    <div class="tambah-data">
                        <a href="add-kunjungan" class="btn btn-primary">Tambah Data</a>
                        <a href="report-kunjungan" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan</a>
                    </div>

                  
                </div>
            </div>
        </section>

    
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
                
                <th>Nama</th>
                <th>Kode Toko</th>
                <th>Nama Store</th>
                <th>Tanggal Kunjungan</th>
            
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
                                
                                </thead>
                                <tbody>
                                
                                    <tr>
                                    <?php
            if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["kode_toko"] . "</td>";
                    echo "<td>" . $row["nama_store"] . "</td>";
                    echo "<td>" . $row["tgl_kunjungan"] . "</td>";

                    echo "<td>" . $row["created_at"] . "</td>";
                
                    echo "<td>";
                    echo "<a href='edit-kunjungan.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i> Edit</a>";
                    echo "&nbsp;&nbsp;";
                    echo "<a href='view-kunjungan.php?id=" . $row["id"] . "' class='btn btn-info btn-sm'><i class='fa fa-search'></i> View</a>";
                    echo "&nbsp;&nbsp;";
    echo "<a href='delete-kunjungan.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Delete</a>";
    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Tidak ada data</td></tr>";
            }
            $conn->close();
            ?>     
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </body>
    </html>
    <?php include '_footer.php'; ?>



