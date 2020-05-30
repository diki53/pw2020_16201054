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
