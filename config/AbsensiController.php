<?php

require './config/allFunctions.php';

function absensiMasuk($data, $session)
{
  global $koneksi;

  $keterangan = $data['keterangan'];
  $latitude = $data['latitude'];
  $longitude = $data['longitude'];
  $date = date('Y-m-d H:i:s');
  $id_user = $session['id'];
  $foto = upload();

  // $date = date('d-m-Y',time());

  $query = "INSERT INTO `absensi` (`id_absensi`, `id_user`, `keterangan`, `waktu_masuk`, `waktu_keluar`, `foto`, `latitude`, `longitude`) 
            VALUES (NULL, '$id_user', '$keterangan', NOW(), NULL, '$foto', '$latitude', '$longitude');";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function getLastAbsen($id_user) {
  global $koneksi;

  $query = "SELECT * FROM absensi WHERE id_user='$id_user';";

  $results = mysqli_query($koneksi, $query);

  $rows = [];

  while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
  }

  $last = sizeof($rows) - 1;

  if($last == -1) {
    return -1;
  } else {
    return $rows[$last];
  }
}

function isAbsenMasuk($id_user) {
  if(getLastAbsen($id_user) != -1) {
    if(getLastAbsen($id_user)['waktu_keluar'] == NULL) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function absensiKeluar($id_absensi)
{
  global $koneksi;

  $date = date('Y-m-d H:i:s');

  $query = "UPDATE `absensi` SET `waktu_keluar` = NOW() WHERE `absensi`.`id_absensi` = $id_absensi;";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function getUserById($id_user)
{
  global $koneksi;

  $query = "SELECT * FROM user WHERE id_user = '$id_user';";

  $results = mysqli_query($koneksi, $query);

  $rows = [];

  while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
  }

  return $rows;
}

function getAbsensi($id_user)
{
  global $koneksi;

  $query = "SELECT * FROM absensi WHERE id_user = '$id_user';";

  $results = mysqli_query($koneksi, $query);

  $rows = [];

  while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
  }

  return $rows;
}

function upload()
{
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];

  $valid = ['jpg', 'jpeg', 'png'];
  $extension = explode('.', $foto);
  $extension = strtolower(end($valid));

  $newFile = uniqid();
  $newFile .= '.';
  $newFile .= $extension;


  move_uploaded_file($tmp, './assets/absensi/' . $newFile);
  return $newFile;
}