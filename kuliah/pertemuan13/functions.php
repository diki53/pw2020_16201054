<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw_16201054');
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

function upload()
{
  $nama_file = $_FILES['foto']['name'];
  $tipe_file = $_FILES['foto']['type'];
  $ukuran_file = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmp_file = $_FILES['foto']['tmp_name'];


  // ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    // echo "<script>
    // alert('Pilih Gambar Terlebih Dahulu !');
    // </script>";
    return '13032020200334no-image-200x300.jpg';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
    alert('Yang Anda pilih bukan gambar !');
    </script>";
    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
    alert('Yang Anda pilih bukan gambar !');
    </script>";
    return false;
  }

  // cek ukuran file
  // makimal 5Mb == 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
    alert('Ukuran Terlalu Besar !');
    </script>";
    return false;
  }

  // lolos pengecekan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}

function tambah($data)
{
  $koneksi = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nip = htmlspecialchars($data['nip']);
  $username = htmlspecialchars($data['nip']);
  $password = htmlspecialchars($data['nip']);
  $level = htmlspecialchars($data['level']);
  // $foto = htmlspecialchars($data['foto']);
  $status = "Nonaktif";

  $foto = upload();
  if (!$foto) {
    return false;
  }

  $query = "INSERT INTO
                  pegawai
            VALUES
            ('','$nama','$nip','$username','$password','$level','$status','$foto');
            ";
  mysqli_query($koneksi, $query);

  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function hapus($id)
{
  $koneksi = koneksi();

  // menghapus gambar di folder img
  $pgw = query("SELECT * FROM pegawai WHERE id_pegawai = $id");
  if ($pgw['foto'] != '13032020200334no-image-200x300.jpg') {
    unlink('img/' . $pgw['foto']);
  }

  mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai = $id") or die(mysqli_error($koneksi));
  return mysqli_affected_rows($koneksi);
}

function ubah($data)
{
  $koneksi = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nip = htmlspecialchars($data['nip']);
  $username = htmlspecialchars($data['nip']);
  $password = htmlspecialchars($data['nip']);
  $level = htmlspecialchars($data['level']);
  $foto_lama = htmlspecialchars($data['foto_lama']);
  $status = "Nonaktif";


  $foto = upload();
  if (!$foto) {
    return false;
  }

  if ($foto == '13032020200334no-image-200x300.jpg') {
    $foto = $foto_lama;
  }

  $query = "UPDATE pegawai SET
              nama = '$nama',
              nip = '$nip',
              username = '$username',
              password = '$password',
              level = '$level',
              status = '$status',
              foto = '$foto'
              WHERE id_pegawai = $id";
  mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
  return mysqli_affected_rows($koneksi);
}


function cari($keyword)
{
  $koneksi = koneksi();

  $query = "SELECT * FROM pegawai
              WHERE nama LIKE '%$keyword%' OR
              nip LIKE '%$keyword%' ";
  $result = mysqli_query($koneksi, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function login($data)
{
  $koneksi = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  // Cek dulu username
  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {

    // cek password
    if (password_verify($password, $user['password'])) {
      // Set Session
      $_SESSION['log'] = true;

      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password Salah !'
  ];
}

function registrasi($data)
{
  $koneksi = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($koneksi, $data['password1']);
  $password2 = mysqli_real_escape_string($koneksi, $data['password2']);


  // Jika Username / password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
    alert('Username / Password tidak boleh kosong !');
    document.location.href= 'registrasi.php';
    </script>";

    return false;
  }

  // Jika Username sudah ada

  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
    alert('Username Sudah Terdaftar !');
    document.location.href= 'registrasi.php';
    </script>";

    return false;
  }

  //  Jika Konfirmasi password tidak sesuai

  if ($password1 !== $password2) {
    echo "<script>
    alert('Konfirmasi Password Tidak Sesuai !');
    document.location.href= 'registrasi.php';
    </script>";

    return false;
  }

  // Jika Password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
    alert('Password Terlalu Pendek !');
    document.location.href= 'registrasi.php';
    </script>";

    return false;
  }

  // Jika password & username sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  // insert ke tabel user
  $query = "INSERT INTO user
              VALUES
            (null, '$username', '$password_baru')
            ";
  mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
  return mysqli_affected_rows($koneksi);
}
