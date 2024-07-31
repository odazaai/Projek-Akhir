<?php 
require_once("database.php");

$sql_barang = "SELECT kode_barang, nama_barang FROM barang";
$result_barang = mysqli_query($connect, $sql_barang);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Peminjaman</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand bg-success">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="color: white"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#" style="color:white">SMK BAKTI NUSANTARA 666</a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" style="padding-left: 1200px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- side bar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-success bg-opacity-25" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link text-decoration-none" href="home.php" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                            <a class="nav-link" href="data_barang.php" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Daftar Barang
                            </a>
                            <a class="nav-link" href="data_peminjaman.php" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Peminjaman
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                            <a class="nav-link" href="data_user.php" style="color: black;">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-circle"></i></div>
                                User
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <h1 class="mt-4"><center>Peminjaman</center></h1>
                <br>
                <div class="container">
                <div class="card mx-auto col-lg-6 ">
                    <div class="card-body shadow h-100 py-2">
                    <form action="proses_peminjaman.php" method="post" >
                    <div class="mb-3">
                            <label form="tanggal" class="form-label">Nama Peminjam</label>
                            <input type="text" class="form-control" id="nama_pminjam" name="nama_peminjaman">
                        </div>
                        <div class="mb-3">
                            <label form="merk" class="form-label">Kode Barang</label>
                            <select id="disabledSelect" class="form-select" name="kode_barang">
                                <option></option>
                                <?php
                                if (mysqli_num_rows($result_barang) > 0){
                                    while ($row = mysqli_fetch_assoc($result_barang)){
                                        echo "
                                        <option value='" . $row['kode_barang'] . "'>" . $row['kode_barang'] . " - " . $row['nama_barang'] ."</option>
                                        ";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label form="nama" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang">
                        </div>
                        <div class="mb-3">
                            <label form="harga" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
                        </div>
                        <div class="mb-3">
                            <label form="harga" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali">
                        </div>
                        <div class="mb-3">
                            <label form="keperluan" class="form-label">Keperluan</label>
                            <input type="text" class="form-control" id="keperluan" name="keperluan">
                        </div>
                        <div class="mb-3">
                            <label form="status" class="form-label">Status</label>
                            <select id="disabledSelect" class="form-select" name="status">
                                <option>Sudah Kembali</option>
                                <option>Belum Kembali</option>
                            </select>
                        </div>
                    <button type="reset" class="btn btn-light" name="batal">Batal</button>
                    <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                    <br>
                </form>
                    </div>
                </div>
                </div>
                <br><br>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>