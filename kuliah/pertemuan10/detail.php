<?php
require 'functions.php';

// ambil id dari url
$id = $_GET['id'];

// query pegawai berdasarkan id
$pegawai = query("SELECT * FROM user WHERE id_user = $id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Pegawai</title>
</head>

<body>
  <h3>Detail Pegawai</h3>
  <ul>
    <li><img src="img/<?= $pegawai['foto']; ?>" width="60"></li>
    <li>Nip : <?= $pegawai['nip']; ?></li>
    <li>Nama : <?= $pegawai['nama']; ?></li>
    <li>Status : <?= $pegawai['status']; ?></li>
    <li><a href="">Ubah</a> | <a href="">Hapus</a></li>
    <li><a href="latihan3.php">Kembali</a></li>
  </ul>


</body>

</html>