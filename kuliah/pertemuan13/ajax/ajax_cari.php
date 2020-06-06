<?php
require '../functions.php';

$pegawai = cari($_GET['keyword']);
?>
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
        <a href="detail.php?id=<?= $user['id_pegawai']; ?>">Lihat Detail</a>

      </td>
    </tr>
  <?php endforeach; ?>