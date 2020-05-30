<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'swadharma');
}

function query($query)
{
  $koneksi = koneksi();
  $qry = mysqli_query($koneksi, $query);

  // Jika Hasilnya Hanya 1 Data
  if (mysqli_num_rows($qry) == 1) {
    return mysqli_fetch_assoc($qry);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($qry)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $koneksi = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nip = htmlspecialchars($data['nip']);
  $username = htmlspecialchars($data['nip']);
  $password = htmlspecialchars($data['nip']);
  $level = htmlspecialchars($data['level']);
  $foto = htmlspecialchars($data['foto']);
  $status = "Nonaktif";


  $query = "INSERT INTO
                  user
            VALUES
            ('','$nama','$nip','$username','$password','$level','$status','$foto');
            ";
  mysqli_query($koneksi, $query);

  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}
