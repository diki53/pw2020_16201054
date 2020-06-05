<?php
require 'functions.php';
$pegawai = query("SELECT * FROM user");


// ketika tombol cari ditekan

if (isset($_POST['cari'])) {
  $pegawai = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pegawai</title>
</head>

<body>
  <h3>Daftar Pegawai</h3>

  <a href="tambah.php">Tambah Data Pegawai</a>
  <br>
  <br>

  <form action="" method="post">
    <input type="text" name="keyword" size="35" placeholder="masukan keyword pencarian . ." autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari</button>
  </form>
  <br>

  <table cellpadding="10" border="1" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>
    <?php if (empty($pegawai)) : ?>
      <tr>
        <td colspan="4">
          <p style="color: red; font-style: italic;">Data Pegawai Tidak Ditemukan</p>
        </td>
      </tr>
    <?php endif; ?>

    <?php
    $i = 1;
    foreach ($pegawai as $user) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $user['foto']; ?> " width="60"></td>
        <td><?= $user['nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $user['id_user']; ?>">Lihat Detail</a>

        </td>
      </tr>
    <?php endforeach; ?>
  </table>

</body>

</html>