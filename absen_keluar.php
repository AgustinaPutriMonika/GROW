<?php
// require './config/allFunctions.php';
require './config/AbsensiController.php';


if(absensiKeluar($_GET['id_absensi']) > 0) {
  header("Location: absensi.php");
}