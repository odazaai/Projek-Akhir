<?php
require_once("database.php");


if (isset($_POST['nama_peminjaman'], $_POST['kode_barang'], $_POST['jumlah_barang'], $_POST['tgl_pinjam'], $_POST['tgl_kembali'], $_POST['keperluan'], $_POST['status'])) {
    $nama_peminjam = $_POST['nama_peminjaman'];
    $kode_barang = $_POST['kode_barang'];
    $jml_barang = $_POST['jumlah_barang'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $keperluan = $_POST['keperluan'];
    $status = $_POST['status'];

    $sql = "INSERT INTO peminjaman VALUES ('', '$nama_peminjam', '$kode_barang', $jml_barang, '$tgl_pinjam', '$tgl_kembali', '$keperluan', '$status')";
        $save = mysqli_query($connect,$sql );
        if ($save) {
            header("Location: data_peminjaman.php");
        }else{
            echo"Error";
        }
}
?>
