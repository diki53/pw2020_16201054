<?php
require 'functions.php';
$pegawai = query("SELECT * FROM user");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pegawai</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>

  <table cellpadding="10" border="1" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>
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