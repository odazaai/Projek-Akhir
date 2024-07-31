<?php
require_once("database.php");

if(isset($_POST['submit'])){
    $status = $_POST['status'];

    // Query SQL untuk update data barang
    $simpan = "UPDATE peminjaman SET status='$status' WHERE id_peminjaman='$id'";

    // Eksekusi query
    $result = mysqli_query($connect, $simpan); // Pastikan $koneksi sudah didefinisikan sebelumnya di file "database.php"

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        header("location:data_peminjaman.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
