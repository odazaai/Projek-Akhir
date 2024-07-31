<?php
$connect=mysqli_connect("localhost", "root", "", "projek_peminjaman") or die("Failed to connect to MYSQL: " . mysqli_error($connect));


if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

function query($kueri)
{
    global $connect;
    $result=mysqli_query($connect, $kueri);
    $rows=[];
    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }
    return $rows;
}

function cek_login($username, $password){
    global $connect;
    $uname = $username;
    $upass = $password;

    $hasil = mysqli_query($connect, "select * from user where username='$uname' and password='$upass'");
    $cek = mysqli_num_rows($hasil);

    $sql = mysqli_fetch_array($hasil);
    if($cek > 0 ){
        $_SESSION['username'] = $sql['username'];
        $_SESSION['role'] = $sql['role'];
        return true;
    } 
    else {
        return false;
    }
}

function inputdata($inputdata)
{
    global $connect;
    $sql=mysqli_query($connect, $inputdata);
    return $sql;
}

function inputpeminjaman($inputpeminjaman)
{
    global $connect;
    $sql=mysqli_query($connect, $inputpeminjaman);
    return $sql;
}

function inputuser($inputuser)
{
    global $connect;
    $sql=mysqli_query($connect, $inputuser);
    return $sql;
}

function Deletebarang($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "Delete from $tablename where id_barang='$id'");
    return $hasil;
}

function Deletepeminjaman($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "Delete from $tablename where id_peminjaman='$id'");
    return $hasil;
}

function Deleteuser($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "Delete from $tablename where id='$id'");
    return $hasil;
}

function Editbarang($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "SELECT * FROM $tablename WHERE id_barang='$id'");
    return $hasil;
}

function Editpeminjaman($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "SELECT * FROM $tablename WHERE id_peminjaman='$id'");
    return $hasil;
}

function Edituser($tablename, $id)
{
    global $connect;
    $hasil=mysqli_query($connect, "SELECT * FROM $tablename WHERE id='$id'");
    return $hasil;
}

function updatebarang($table, $data, $id)
{
    global $connect;
    $sql = "UPDATE $table SET kode_barang = '$data[kode_barang]', nama_barang = '$data[nama_barang]', kategori = '$data[kategori]', merk = '$data[merk]', 
    jumlah = '$data[jumlah]' WHERE id_barang = '$id'";
    $hasil=mysqli_query($connect, $sql);
    return $hasil;
}

function updatepeminjaman($table, $data, $id)
{
    global $connect;
    $sql = "UPDATE $table SET nama_peminjam = '$data[nama_peminjamn], kode_barang = '$data[kode_barang]', jumlah_barang = '$data[jumlah_barang], 
    tgl_pinjam = '$data[tgl_pinjam]', tgl_kembali = '$data[tgl_kembali]', keperluan = '$data[keperluan], status = '$data[status]' 
    WHERE id_peminjaman = '$id'";
    $hasil = mysqli_query($connect, $sql);
    return $hasil;
}

function updateuser($table, $data, $id)
{
    global $connect;
    $sql = "UPDATE $table SET no_identitas ='$data[no_identitas], nama='$data[nama]', status='$data[status]', username='$data[username], 
    password='$data[password]', role='$data[role]' WHERE id = '$id'";
    $hasil = mysqli_query($connect, $sql);
    return $hasil;
}

function tampil_data()
{
    global $connect;
    $result=mysqli_query($connect, "SELECT peminjaman.kode_barang, peminjaman.jumlah_barang, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, user.nama, 
    barang.nama_barang, peminjaman.keperluan, peminjaman.status FROM peminjaman INNER JOIN barang 
    ON barang.kode_barang = peminjaman.kode_barang INNER JOIN user ON peminjaman.nama_peminjam = user.nama;");
    $rows=[];
    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }
    return $rows;
}

function total_barang($query){
    global $connect;
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connect));
    }
    $row = mysqli_fetch_row($result);
    if (!$row) {
        die("No rows returned");
    }
    return $row[0];
}

function total_user($query){
    global $connect;
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connect));
    }
    $row = mysqli_fetch_row($result);
    if (!$row) {
        die("No rows returned");
    }
    return $row[0];
}

function total_stok($query){
    global $connect;
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connect));
    }
    $row = mysqli_fetch_row($result);
    if (!$row) {
        die("No rows returned");
    }
    return $row[0];
}

function total_dipinjam($query){
    global $connect;
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connect));
    }
    $row = mysqli_fetch_row($result);
    if (!$row) {
        die("No rows returned");
    }
    return $row[0];
}
?>