<?php
session_start();

if (!isset($_SESSION['log'])) {
  header("Location: login.php");
}
require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// Ambil id dari url
$id = $_GET['id'];

// Query Pegawai berdasarkan id
$u = query("SELECT * FROM pegawai WHERE id_pegawai = $id");

// cek apakah tombol tambah sudah ditekan

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
    alert('Data Brhasil Diubah!');
    window.location.href='index.php';
    </script>";
  } else {
    echo "Data Gagal Diubah !";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Ubah Data Mahasiswa</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $u['id_pegawai']; ?>">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required value="<?= $u['nama']; ?>">
        </label>
      </li>
      <li>
        <label>
          Nip :
          <input type="text" name="nip" required value="<?= $u['nip']; ?>">
        </label>
      </li>
      <li>
        <label>
          Level :
          <input type="text" name="level" required value="<?= $u['level']; ?>">
        </label>
      </li>
      <li>
        <input type="hidden" name="foto_lama" value="<?= $u['foto']; ?>">
        <label>
          Foto :
          <input type="file" name="foto" class="foto" onchange="previewImage()">
        </label>
        <img src="img/<?= $u['foto']; ?>" width="60" style="display: block" class="img-preview">
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data !</button>

      </li>
    </ul>
  </form>
</body>

<script src="js/script.js"></script>

</html>