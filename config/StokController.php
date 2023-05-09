<?php

require './config/allFunctions.php';

function getStokUser($id_user) {
  global $koneksi;

  $query = "SELECT user.nama, c.*, produk.nama_produk
  FROM carry_produk AS c
  JOIN produk ON produk.id_produk = c.id_produk
  JOIN user ON c.id_user = user.id_user
  WHERE c.id_user = '$id_user';";

  $results = mysqli_query($koneksi, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
  }

  return $rows;
}

function getStokProdukUser($id_produk, $id_user) {
  global $koneksi;

  $query = "SELECT id_user, id_produk, stok_dibawa
  FROM carry_produk
  WHERE id_produk = '$id_produk'
  AND id_user = '$id_user';";

  $results = mysqli_query($koneksi, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
  }

  return $rows;
}

// function kurangiStokGudangKecil($jumlahDiambil, $id_produk) {
//   global $koneksi;
//   $query = "UPDATE gudang_kecil SET stok = $jumlahDiambil WHERE id_produk = '$id_produk';";

//   mysqli_query($koneksi, $query);

//   return mysqli_affected_rows($koneksi);
// }

function ambilBarang($jumlahBarang, $id_produk, $id_user) {
  global $koneksi;
  // $query = "UPDATE carry_produk SET stok_dibawa = $jumlahBarang WHERE id_produk = '$id_produk' AND id_user = '$id_user';";

  $query = "INSERT INTO `carry_produk` (`id_user`, `id_produk`, `tanggal_carry`, `stok_dibawa`, `stok_kembali`) 
              VALUES ('$id_user', '$id_produk', NOW(), '$jumlahBarang', '0');";

  try {
    mysqli_query($koneksi, $query);
  } catch (Exception $e) {
    // echo $e->getMessage();
    $query = "UPDATE carry_produk SET stok_dibawa = $jumlahBarang WHERE id_produk = '$id_produk' AND id_user = '$id_user';";
    mysqli_query($koneksi, $query);
  }

  // return mysqli_affected_rows($koneksi);
}