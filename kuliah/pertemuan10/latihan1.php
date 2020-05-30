<?php
// Koneksi Ke DB
$koneksi = mysqli_connect('localhost', 'root', '', 'swadharma');

// Query isi tabel pegawai
$qry = mysqli_query($koneksi, "SELECT * FROM user");

// Ubah data kedalam array

// $row = mysqli_fetch_row($qry); //array Numerik
// $row = mysqli_fetch_assoc($qry); //Array associative
// $row = mysqli_fetch_array($qry); //Keduanya
$rows = [];
while ($row = mysqli_fetch_assoc($qry)) {
  $rows[] = $row;
}

$pegawai = $rows;

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
      <th>Email</th>
      <th>Aksi</th>
    </tr>
    <?php
    $i = 1;
    foreach ($pegawai as $user) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $user['foto']; ?> " width="60"></td>
        <td><?= $user['nama']; ?></td>
        <td><?= $user['nip']; ?></td>
        <td>
          <a href="">Ubah</a> | <a href="">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

</body>

</html>