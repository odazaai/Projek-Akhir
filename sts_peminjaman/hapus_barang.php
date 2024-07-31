<?php
require_once("database.php");
$id = $_GET['id_barang'];
$sql = Deletebarang("barang", $id);
if ($sql) {
    header("location:data_barang.php");
}
?>