<?php
session_start();
//jika belum login

if(isset($_SESSION['log'])){

}else{
  header('location:login.php');
}

?>