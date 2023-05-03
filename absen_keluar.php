<?php
require './config/allFunctions.php';


if(absensiKeluar($_GET['kd_absensi']) > 0) {
  header("Location: absensi.php");
}