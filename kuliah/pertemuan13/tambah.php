<?php
session_start();

if (!isset($_SESSION['log'])) {
  header("Location: login.php");
}
require 'functions.php';

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
    alert('Data Brhasil Ditambahakan!');
    window.location.href='index.php';
    </script>";
  } else {
    echo "Data Gagal Ditambahakan !";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Tambah Data Mahasiswa</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required autocomplete="off">
        </label>
      </li>
      <li>
        <label>
          Nip :
          <input type="text" name="nip" required>
        </label>
      </li>
      <li>
        <label>
          Level :
          <input type="text" name="level" required>
        </label>
      </li>
      <li>
        <label>
          Foto :
          <input type="file" name="foto" class="foto" onchange="previewImage()">
        </label>
        <img src="img/13032020200334no-image-200x300.jpg" width="60" style="display: block" class="img-preview">
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Data !</button>
      </li>
    </ul>
  </form>

  <script src="js/script.js"></script>
</body>

</html>