<?php

// require './config/allFunctions.php';
$koneksi = mysqli_connect("localhost", "root", "", "toko_rokok2");
if (isset($_GET['dis'])) {
  $dis = $_GET['dis'];
  $query = "SELECT * FROM toko WHERE kd_distrik='$dis'";

  $results = mysqli_query($koneksi, $query);

  while ($row = mysqli_fetch_assoc($results)) {
    echo '<option value="' . $row['kd_toko'] . '">' . htmlentities($row['nama_toko']) . '</option>';
  }
}