select `sts_peminjaman`.`peminjaman`.`id` AS `id`,`sts_peminjaman`.`peminjaman`.`tgl_pinjam` AS `tgl_pinjam`,`sts_peminjaman`.`peminjaman`.`tgl_kembali` 
AS `tgl_kembali`,`sts_peminjaman`.`peminjaman`.`no_identitas` AS `no_identitas`,`sts_peminjaman`.`user`.`nama` AS `nama`,`sts_peminjaman`.`peminjaman`.
`kode_barang` AS `kode_barang`,`sts_peminjaman`.`barang`.`nama_barang` AS `nama_barang`,`sts_peminjaman`.`peminjaman`.`jumlah` AS `jumlah`,
`sts_peminjaman`.`peminjaman`.`keperluan` AS `keperluan`,`sts_peminjaman`.`peminjaman`.`status` AS `status`,`sts_peminjaman`.`peminjaman`.`id_login` 
AS `id_login` from ((`sts_peminjaman`.`peminjaman` join `sts_peminjaman`.`barang` on(`sts_peminjaman`.`barang`.`kode_barang` = `sts_peminjaman`.
`peminjaman`.`kode_barang`)) join `sts_peminjaman`.`user` on(`sts_peminjaman`.`peminjaman`.`no_identitas` = `sts_peminjaman`.`user`.`no_identitas`))