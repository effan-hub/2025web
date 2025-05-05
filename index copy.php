<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}

include "koneksi.php";

$query = "SELECT m.*, p.nama namaProdi FROM mahasiswa m JOIN prodi p ON m.id_prodi = p.id";
$data = ambildata($query);

include "template/header.php";
include "template/sidebar.php";
?>

<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Bordered Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Telp</th>
                                        <th>Prodi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($data as $d) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $d["nim"] ?></td>
                                            <td><?php echo $d["nama"] ?></td>
                                            <td><?php echo $d["telp"] ?></td>
                                            <td><?php echo $d["namaProdi"] ?></td>
                                            <td><a href="deletemahasiswa.php?nim=<?= $d['nim']; ?>" onclick="return confirm('Yakin ingin hapus?')">Delete</a> <a href="editmahasiswa.php?nim=<?= $d['nim']; ?>">Edit</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <a href="tambahmahasiswa.php">Tambah</a>
                <table border="1" cellspacing="0" cellpadding="5">
                    <thead>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Telp</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>

                        <?php
                        $i = 1;
                        foreach ($data as $d) : ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $d["nim"] ?></td>
                                <td><?php echo $d["nama"] ?></td>
                                <td><?php echo $d["telp"] ?></td>
                                <td><?php echo $d["namaProdi"] ?></td>
                                <td><a href="deletemahasiswa.php?nim=<?= $d['nim']; ?>" onclick="return confirm('Yakin ingin hapus?')">Delete</a> | <a href="editmahasiswa.php?nim=<?= $d['nim']; ?>">Edit</a></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <a href="logout.php">Keluar</a>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->


<?php
include "template/footer.php";
?>