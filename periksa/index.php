<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';

// Membuat koneksi menggunakan mysqli_connect()
$koneksi = mysqli_connect($host, $user, $pass, $dbname);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
    die("Tidak bisa terkoneksi di database: " . mysqli_connect_error());
}
$tanggal = "";
$berat = "";
$tinggi = "";
$tensi = "";
$keterangan = "";


if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $tensi = $_POST['tensi'];
    $keterangan = $_POST['keterangan'];



    if ($tanggal && $berat && $tinggi && $tensi && $keterangan) {
        $sql1 = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan) VALUES ('$tanggal', '$berat', '$tinggi', '$tensi', '$keterangan')";
        $q1 = mysqli_query($koneksi, $sql1); // Perbaikan variabel menjadi $q1

        if ($q1) { // Mengubah variabel dari $sq1 menjadi $q1
            $sukses = "Berhasil memasukkan data baru";
        } else {
            $error = "Gagal memasukkan data";
        }
    }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Periksa</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Periksa</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">Data Periksa</h2>
                            <a href="add.php"><button class="btn btn-primary mb-1">Tambah Data</button></a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Berat</th>
                                        <th scope="col">Tinggi</th>
                                        <th scope="col">Tensi</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Pasien Id</th>
                                        <th scope="col">Dokter Id</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $urut = 1;
                                        $query = $dbh->query("SELECT * FROM periksa");
                                        foreach ($query as $row) {
                                            $id = $row['id'];
                                            $tanggal = $row['tanggal'];
                                            $berat = $row['berat'];
                                            $tinggi = $row['tinggi'];
                                            $tensi = $row['tensi'];
                                            $keterangan = $row['keterangan'];
                                            $pasien_id = $row['pasien_id'];
                                            $dokter_id = $row['dokter_id'];

                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $urut++ ?></th>
                                                <td><?php echo $tanggal ?></td>
                                                <td><?php echo $berat ?></td>
                                                <td><?php echo $tinggi ?></td>
                                                <td><?php echo $tensi ?></td>
                                                <td><?php echo $keterangan ?></td>
                                                <td><?php echo $pasien_id ?></td>
                                                <td><?php echo $dokter_id ?></td>
                                                <td>

                                                    <a href='edit.php?id=<?php echo $id ?>' class="btn btn-warning btn-sm"></i> Edit</a>
                                                    <a href='delete.php?id=<?php echo $id ?>' class="btn btn-danger btn-sm"></i> Delete</a>

                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<?php
require_once 'footer.php';
?>