<?php
require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// Ambil id dari url
$id = $_GET['id'];

// Query Pegawai berdasarkan id
$u = query("SELECT * FROM user WHERE id_user = $id");

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
  <form action="" method="post">
    <input type="hidden" name="id" value="<?= $u['id_user']; ?>">
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
        <label>
          Foto :
          <input type="text" name="foto" required value="<?= $u['foto']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data !</button>

      </li>
    </ul>
  </form>
</body>

</html>