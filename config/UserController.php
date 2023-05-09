<?php
require './config/allFunctions.php';

function cekLogin($name, $id_user) {
  global $koneksi;

  $query = "SELECT * FROM user WHERE nama='$name' and id_user='$id_user'";
  $results = mysqli_query($koneksi, $query);

  return mysqli_num_rows($results);
}

function getDataLogin($name, $id_user) {
  global $koneksi;

  $query = "SELECT * FROM user WHERE nama='$name' and id_user='$id_user'";
  $results = mysqli_query($koneksi, $query);

  return mysqli_fetch_assoc($results);
}