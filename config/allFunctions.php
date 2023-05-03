<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko_rokok2");

function absensiMasuk($data, $yg_login)
{
  global $koneksi;

  $keterangan = $data['keterangan'];
  $latitude = $data['latitude'];
  $longitude = $data['longitude'];
  $date = date('Y-m-d H:i:s');
  $id_karyawan = $yg_login['id'];
  $foto = upload();

  // $date = date('d-m-Y',time());

  $query = "INSERT INTO `absensi` (`kd_absensi`, `kd_karyawan`, `keterangan`, `waktu_masuk`, `waktu_keluar`, `foto`, `latitude`, `longitude`) 
            VALUES (NULL, '$id_karyawan', '$keterangan', NOW(), NULL, '$foto', '$latitude', '$longitude');";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function absensiKeluar($id)
{
  global $koneksi;

  $date = date('Y-m-d H:i:s');

  $query = "UPDATE `absensi` SET `waktu_keluar` = NOW() WHERE `absensi`.`kd_absensi` = $id;";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function getUserById($id)
{
  global $koneksi;

  $query = "SELECT * FROM karyawan WHERE kd_karyawan = '$id';";

  $results = mysqli_query($koneksi, $query);

  $rows = [];

  while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
  }

  return $rows;
}

function getAbsensi($id)
{
  global $koneksi;

  $query = "SELECT * FROM absensi WHERE kd_karyawan = '$id';";

  $results = mysqli_query($koneksi, $query);

  $rows = [];

  while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
  }

  return $rows;
}

function upload() {
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];

  $valid = ['jpg', 'jpeg', 'png'];
  $extension = explode('.', $foto);
  $extension = strtolower(end($valid));

  $newFile = uniqid();
  $newFile .= '.';
  $newFile .= $extension;


  move_uploaded_file($tmp, './assets/absensi/'.$newFile);
  return $newFile;
}