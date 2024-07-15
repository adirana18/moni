    <?php 
    include '_header.php';
    include '_nav.php';
    include '_sidebar.php'; 
    include 'aksi/koneksi.php'; 

    // Menampilkan data dari database
    $sql = "SELECT ID,KD_BRANCH, NAMA_BRANCH, KD_STORE, NIK_IT_STORE, NAMA_IT_STORE, NAMA_STORE, TYPE_TOKO, PDT, KONEKSI, TYPE_KONEKSI, VENDOR_KONEKSI, S_MERK, S_PROCESSOR, S_MEMORI, S_KAPASITAS_STORAGE, S_TYPE_STORAGE, K1_MERK, K1_PROCESSOR, K1_MEMORI, K1_KAPASITAS_STORAGE, K1_TYPE_STORAGE, K2_MERK, K2_PROCESSOR, K2_MEMORI, K2_KAPASITAS_STORAGE, K2_TYPE_STORAGE, K3_MERK, K3_PROCESSOR, K3_MEMORI, K3_KAPASITAS_STORAGE, K3_TYPE_STORAGE, K4_MERK, K4_PROCESSOR, K4_MEMORI, K4_KAPASITAS_STORAGE, K4_TYPE_STORAGE FROM ceklist_perangkat_it_store";
    $result = $conn->query($sql);
    ?>


    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Data Ceklist Perangkat IT store</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="bo">Home</a></li>
                            <li class="breadcrumb-item active">Ceklist</li>
                        </ol>
                    </div>
                    <div class="tambah-data">
                        <a href="add-ceklist" class="btn btn-primary">Tambah Data</a>
                        <a href="report-ceklist" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan</a>
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
                
                <th>NAMA_BRANCH</th>
                <th> NAMA_IT_STORE</th>
                <th>NAMA_STORE</th>
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
                    
                    echo "<td>" . $row["NAMA_BRANCH"] . "</td>";
                    echo "<td>" . $row["NAMA_IT_STORE"] . "</td>";
                    echo "<td>" . $row["NAMA_STORE"] . "</td>";
                
                    echo "<td>";
                    //echo "<a href='edit-kunjungan.php?id=" . $row["ID"] . "' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i> Edit</a>";
                    //echo "&nbsp;&nbsp;";
                    //echo "<a href='view-kunjungan.php?id=" . $row["ID"] . "' class='btn btn-info btn-sm'><i class='fa fa-search'></i> View</a>";
                    //echo "&nbsp;&nbsp;";
    echo "<a href='delete-ceklist.php?id=" . $row["ID"] . "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Delete</a>";
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



