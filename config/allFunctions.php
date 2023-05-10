<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko_rokok3");

function getDistrik()
{
  global $koneksi;

  $query = "SELECT * FROM distrik;";

  $results = mysqli_query($koneksi, $query);

  $rows = [];

  while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
  }

  return $rows;
}

function distrikToko()
{
  global $koneksi;

  if (isset($_GET['dis'])) {
    $dis = $_GET['dis'];
    $query = "SELECT * FROM toko WHERE kd_distrik='$dis'";

    $results = mysqli_query($koneksi, $query);

    while ($row = mysqli_fetch_assoc($results)) {
      echo '<option value="' . $row['kd_toko'] . '">' . htmlentities($row['nama_toko']) . '</option>';
    }
  }
}

// function absensiMasuk($data, $yg_login)
// {
//   global $koneksi;

//   $keterangan = $data['keterangan'];
//   $latitude = $data['latitude'];
//   $longitude = $data['longitude'];
//   $date = date('Y-m-d H:i:s');
//   $id_karyawan = $yg_login['id'];
//   $foto = upload();

//   // $date = date('d-m-Y',time());

//   $query = "INSERT INTO `absensi` (`kd_absensi`, `kd_karyawan`, `keterangan`, `waktu_masuk`, `waktu_keluar`, `foto`, `latitude`, `longitude`) 
//             VALUES (NULL, '$id_karyawan', '$keterangan', NOW(), NULL, '$foto', '$latitude', '$longitude');";

//   mysqli_query($koneksi, $query);

//   return mysqli_affected_rows($koneksi);
// }

// function getLastAbsen($kd_karyawan) {
//   global $koneksi;

//   $query = "SELECT * FROM absensi WHERE kd_karyawan='$kd_karyawan';";

//   $results = mysqli_query($koneksi, $query);

//   $rows = [];

//   while ($row = mysqli_fetch_assoc($results)) {
//     $rows[] = $row;
//   }

//   $last = sizeof($rows) - 1;

//   if($last == -1) {
//     return -1;
//   } else {
//     return $rows[$last];
//   }
// }

// function isAbsenMasuk($kd_karyawan) {
//   if(getLastAbsen($kd_karyawan) != -1) {
//     if(getLastAbsen($kd_karyawan)['waktu_keluar'] == NULL) {
//       return true;
//     } else {
//       return false;
//     }
//   } else {
//     return false;
//   }
// }

// function absensiKeluar($kd_absensi)
// {
//   global $koneksi;

//   $date = date('Y-m-d H:i:s');

//   $query = "UPDATE `absensi` SET `waktu_keluar` = NOW() WHERE `absensi`.`kd_absensi` = $kd_absensi;";

//   mysqli_query($koneksi, $query);

//   return mysqli_affected_rows($koneksi);
// }

// function getUserById($id)
// {
//   global $koneksi;

//   $query = "SELECT * FROM karyawan WHERE kd_karyawan = '$id';";

//   $results = mysqli_query($koneksi, $query);

//   $rows = [];

//   while ($row = mysqli_fetch_assoc($results)) {
//     $rows[] = $row;
//   }

//   return $rows;
// }

// function getAbsensi($id)
// {
//   global $koneksi;

//   $query = "SELECT * FROM absensi WHERE kd_karyawan = '$id';";

//   $results = mysqli_query($koneksi, $query);

//   $rows = [];

//   while ($row = mysqli_fetch_assoc($results)) {
//     $rows[] = $row;
//   }

//   return $rows;
// }

// function upload()
// {
//   $foto = $_FILES['foto']['name'];
//   $tmp = $_FILES['foto']['tmp_name'];

//   $valid = ['jpg', 'jpeg', 'png'];
//   $extension = explode('.', $foto);
//   $extension = strtolower(end($valid));

//   $newFile = uniqid();
//   $newFile .= '.';
//   $newFile .= $extension;


//   move_uploaded_file($tmp, './assets/absensi/' . $newFile);
//   return $newFile;
// }






// PINDAHAN FUNCTION

// Check connection
if (mysqli_connect_errno()){
  echo "Koneksi database gagal : " . mysqli_connect_error();
 }
 
 //Menambah barang baru
 if(isset($_POST['addnew'])){
     $namasales = $_POST["namasales"];
     $namatoko = $_POST["toko"];
     $distrik = $_POST["distrik"];
     $routing = $_POST["routing"];
     $jkunjungan = $_POST["jkunjungan"];
     $b20 = $_POST["b20"];
     $b16 = $_POST["b16"];
     $b12 = $_POST["b12"];
     $r16 = $_POST["r16"];
     $r12 = $_POST["r12"];
     $kk = $_POST["kk"];
     $kc = $_POST["kc"];
     $bb16 = $_POST["bb16"];
     $bb12 = $_POST["bb12"];
     $bice = $_POST["bice"];
     $keterangan = $_POST["keterangan"];
     $latitude = $_POST["latitude"];
     $longitude = $_POST["longitude"];
 
     $addtoproduk = mysqli_query($koneksi, "INSERT INTO produk VALUES ('$b12', '$b16', '$b20', '$bb12', '$bb16', '$bice', '$kc', '$kk', '$r12', '$r16','','')");
 
     $getidjual = mysqli_query($koneksi, "SELECT kd_jual FROM produk ORDER BY kd_jual DESC");
     $rowidjual = mysqli_fetch_array($getidjual);
     $idjual = $rowidjual['kd_jual'];
 
     $folder = './produk/';
     $name_p = $_FILES['foto']['name'];
     $sumber_p = $_FILES['foto']['tmp_name'];
     move_uploaded_file($sumber_p, $folder.$name_p);
     date_default_timezone_set('Asia/Jakarta');
     $tanggal = date('Y-m-d H:i:s');
     $addmasuk = mysqli_query($koneksi, "INSERT INTO masuk_toko VALUES ('', '$namasales', '$idjual', '$namatoko', '$distrik', '$routing','$tanggal', '$jkunjungan', '$keterangan', '$name_p', '$latitude', '$longitude')");
 
     // update stok
     $cekstok = mysqli_query($koneksi, "SELECT * FROM stok_gudang_kecil");
     $ambildatanya = mysqli_fetch_array($cekstok);
     $stokb20 = $ambildatanya['B20'];
     $tambahstokb20 = $stokb20 - intval($b20);
 
     $stokb16 = $ambildatanya['B16'];
     $tambahstokb16 = $stokb16 - intval($b16);
 
     $stokb12 = $ambildatanya['B12'];
     $tambahstokb12 = $stokb12 - intval($b12);
 
     $stokr16 = $ambildatanya['R16'];
     $tambahstokr16 = $stokr16 - intval($r16);
 
     $stokr20 = $ambildatanya['R12'];
     $tambahstokr20 = $stokr20 - intval($r12);
 
     $stokkk = $ambildatanya['KK'];
     $tambahstokkk = $stokkk - intval($kk);
 
     $stokkc = $ambildatanya['KC'];
     $tambahstokkc = $stokkc - intval($kc);
 
     $stokbb12 = $ambildatanya['BB12'];
     $tambahstokbb12 = $stokbb12 - intval($bb12);
 
     $stokbb16 = $ambildatanya['BB16'];
     $tambahstokbb16 = $stokbb16 - intval($bb16);
 
     $stokbice = $ambildatanya['BICE16'];
     $tambahstokbice = $stokbice - intval($bice);
 
     $update = mysqli_query($koneksi, "UPDATE stok_gudang_kecil 
     SET B20 ='$tambahstokb20',
         B16 ='$tambahstokb16',
         B12 ='$tambahstokb12',
         R16 ='$tambahstokr16',
         R12 ='$tambahstokr20',
         KK ='$tambahstokkk',
         KC ='$tambahstokkc',
         BB12 ='$tambahstokbb12',
         BB16 ='$tambahstokbb16',
         BICE16 ='$tambahstokbice'");
 
 
     if($addtoproduk AND $addmasuk AND $update){
         echo "
         <script>
             alert('data berhasil di tambahkan!');
             document.location.href = 'index.php';
         </script>
         ";
     }else{
         echo "
         <script>
             alert('data gagal di tambahkan!');
             document.location.href = 'index.php';
         </script>
         ";
     }
 }
 
 //Updtade Stok
//  if(isset($_POST['updatestok'])){
//      $b20 = $_POST["b20"];
//      $b16 = $_POST["b16"];
//      $b12 = $_POST["b12"];
//      $r16 = $_POST["r16"];
//      $r12 = $_POST["r12"];
//      $kk = $_POST["kk"];
//      $kc = $_POST["kc"];
//      $bb16 = $_POST["bb16"];
//      $bb12 = $_POST["bb12"];
//      $bice = $_POST["bice"];
 
//      // update stok
//      $cekstok = mysqli_query($koneksi, "SELECT * FROM stok_gudang_kecil");
//      $ambildatanya = mysqli_fetch_array($cekstok);
//      $stokb20 = $ambildatanya['B20'];
//      $tambahstokb20 = $stokb20 + intval($b20);
 
//      $stokb16 = $ambildatanya['B16'];
//      $tambahstokb16 = $stokb16 + intval($b16);
 
//      $stokb12 = $ambildatanya['B12'];
//      $tambahstokb12 = $stokb12 + intval($b12);
 
//      $stokr16 = $ambildatanya['R16'];
//      $tambahstokr16 = $stokr16 + intval($r16);
 
//      $stokr20 = $ambildatanya['R12'];
//      $tambahstokr20 = $stokr20 + intval($r12);
 
//      $stokkk = $ambildatanya['KK'];
//      $tambahstokkk = $stokkk + intval($kk);
 
//      $stokkc = $ambildatanya['KC'];
//      $tambahstokkc = $stokkc + intval($kc);
 
//      $stokbb12 = $ambildatanya['BB12'];
//      $tambahstokbb12 = $stokbb12 + intval($bb12);
 
//      $stokbb16 = $ambildatanya['BB16'];
//      $tambahstokbb16 = $stokbb16 + intval($bb16);
 
//      $stokbice = $ambildatanya['BICE16'];
//      $tambahstokbice = $stokbice + intval($bice);
 
//      $update = mysqli_query($koneksi, "UPDATE stok_gudang_kecil 
//      SET B20 ='$tambahstokb20',
//          B16 ='$tambahstokb16',
//          B12 ='$tambahstokb12',
//          R16 ='$tambahstokr16',
//          R12 ='$tambahstokr20',
//          KK ='$tambahstokkk',
//          KC ='$tambahstokkc',
//          BB12 ='$tambahstokbb12',
//          BB16 ='$tambahstokbb16',
//          BICE16 ='$tambahstokbice'");
 
 
//      if($update){
//          echo "
//          <script>
//              alert('data berhasil di tambahkan!');
//              document.location.href = 'stok_gudang_kecil.php';
//          </script>
//          ";
//      }else{
//          echo "
//          <script>
//              alert('data gagal di tambahkan!');
//              document.location.href = 'stok_gudang_kecil.php';
//          </script>
//          ";
//      }
//  }

if(isset($_POST['updatestok'])){
    $b20 = $_POST["b20"];
    $b16 = $_POST["b16"];
    $b12 = $_POST["b12"];
    $r16 = $_POST["r16"];
    $r12 = $_POST["r12"];
    $kk = $_POST["kk"];
    $kc = $_POST["kc"];
    $bb16 = $_POST["bb16"];
    $bb12 = $_POST["bb12"];
    $bice = $_POST["bice"];

    // update stok
    $cekb20 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='B20'");
    $ambildatanya = mysqli_fetch_array($cekb20);
    $stokb20 = $ambildatanya['stok'];
    $tambahstokb20 = $stokb20 + intval($b20);

    $cekb16 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='B16'");
    $ambildatanya = mysqli_fetch_array($cekb16);
    $stokb16 = $ambildatanya['stok'];
    $tambahstokb16 = $stokb16 + intval($b16);

    $cekb12 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='B12'");
    $ambildatanya = mysqli_fetch_array($cekb12);
    $stokb12 = $ambildatanya['stok'];
    $tambahstokb12 = $stokb12 + intval($b12);

    $cekr16 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='R16'");
    $ambildatanya = mysqli_fetch_array($cekr16);
    $stokr16 = $ambildatanya['stok'];
    $tambahstokr16 = $stokr16 + intval($r16);

    $cekr12 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='R12'");
    $ambildatanya = mysqli_fetch_array($cekr12);
    $stokr12 = $ambildatanya['stok'];
    $tambahstokr12 = $stokr12 + intval($r12);

    $cekkk = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='KK'");
    $ambildatanya = mysqli_fetch_array($cekkk);
    $stokkk = $ambildatanya['stok'];
    $tambahstokkk = $stokkk + intval($kk);

    $cekkc = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='KC'");
    $ambildatanya = mysqli_fetch_array($cekkc);
    $stokkc = $ambildatanya['stok'];
    $tambahstokkc = $stokkc + intval($kc);

    $cekbb16 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='BB16'");
    $ambildatanya = mysqli_fetch_array($cekbb16);
    $stokbb16 = $ambildatanya['stok'];
    $tambahstokbb16 = $stokbb16 + intval($bb16);

    $cekbb12 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='BB12'");
    $ambildatanya = mysqli_fetch_array($cekbb12);
    $stokbb12 = $ambildatanya['stok'];
    $tambahstokbb12 = $stokbb12 + intval($bb12);

    $cekbice16 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='BB16'");
    $ambildatanya = mysqli_fetch_array($cekbice16);
    $stokbice16 = $ambildatanya['stok'];
    $tambahstokbice16 = $stokbice16 + intval($bice);

    $update1 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$tambahstokb20'  WHERE id_produk='B20'");
    $update2 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$tambahstokb16'  WHERE id_produk='B16'");
    $update3 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$tambahstokb12'  WHERE id_produk='B12'");
    $update4 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$tambahstokr16'  WHERE id_produk='R16'");
    $update5 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$tambahstokr12'  WHERE id_produk='R12'");
    $update6 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$tambahstokkk'  WHERE id_produk='KK'");
    $update7 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$tambahstokkc'  WHERE id_produk='KC'");
    $update8 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$tambahstokbb16'  WHERE id_produk='BB16'");
    $update9 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$tambahstokbb12'  WHERE id_produk='BB12'");
    $update10 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$tambahstokbice16'  WHERE id_produk='BICE16'");


    if($update1 AND $update2 AND $update3 AND $update4 AND $update5 AND $update6 AND $update7 AND $update8 AND $update9 AND $update10){
        echo "
        <script>
            alert('data berhasil di tambahkan!');
            document.location.href = 'stok_gudang_besar.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal di tambahkan!');
            document.location.href = 'stok_gudang_besar.php';
        </script>
        ";
    }
}

if(isset($_POST['stokgkecil'])){
    $b20 = $_POST["b20"];
    $b16 = $_POST["b16"];
    $b12 = $_POST["b12"];
    $r16 = $_POST["r16"];
    $r12 = $_POST["r12"];
    $kk = $_POST["kk"];
    $kc = $_POST["kc"];
    $bb16 = $_POST["bb16"];
    $bb12 = $_POST["bb12"];
    $bice = $_POST["bice"];
    $nama_pengirim = $_POST["nama_peng"];

    // Update tanggal
    date_default_timezone_set('Asia/Jakarta');
    $tanggalmasuk = date('Y-m-d H:i:s');

    // insert perngajuan gudang kecil
    //1.MANIPULASI B20
    $cekb20 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='B20'");
    $ambildatanya = mysqli_fetch_array($cekb20);
    $idb20 = $ambildatanya['id_produk'];
    if($b20 > 0) {
        $addb20 = mysqli_query($koneksi, "INSERT INTO pengajuan_produk VALUES ('', '$tanggalmasuk', NULL, '$idb20', '$b20',NULL, '$nama_pengirim', NULL)");
    }

    //2.MANIPULASI B16
    $cekb16 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='B16'");
    $ambildatanya = mysqli_fetch_array($cekb16);
    $idb16 = $ambildatanya['id_produk'];
    if($b16 > 0) {
        $addb16 = mysqli_query($koneksi, "INSERT INTO pengajuan_produk VALUES ('', '$tanggalmasuk', NULL, '$idb16', '$b16',NULL, '$nama_pengirim', NULL)");
    }
    
    //3.MANIPULASI B12
    $cekb12 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='B12'");
    $ambildatanya = mysqli_fetch_array($cekb12);
    $idb12 = $ambildatanya['id_produk'];
    if($b12 > 0) {
        $addb12 = mysqli_query($koneksi, "INSERT INTO pengajuan_produk VALUES ('', '$tanggalmasuk', NULL, '$idb12', '$b12',NULL, '$nama_pengirim', NULL)");
    }
    
    //4.MANIPULASI BB12
    $cekbb12 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='BB12'");
    $ambildatanya = mysqli_fetch_array($cekbb12);
    $idbb12 = $ambildatanya['id_produk'];
    if($bb12 > 0) {
        $addbb12 = mysqli_query($koneksi, "INSERT INTO pengajuan_produk VALUES ('', '$tanggalmasuk', NULL, '$idbb12', '$bb12',NULL, '$nama_pengirim', NULL)");
    }

    //5.MANIPULASI BB16
    $cekbb16 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='BB16'");
    $ambildatanya = mysqli_fetch_array($cekbb16);
    $idbb16 = $ambildatanya['id_produk'];
    if($bb16 > 0) {
        $addbb16 = mysqli_query($koneksi, "INSERT INTO pengajuan_produk VALUES ('', '$tanggalmasuk', NULL, '$idbb16', '$bb16',NULL, '$nama_pengirim', NULL)");
    }

    //6.MANIPULASI BICE16
    $cekbice16 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='BICE16'");
    $ambildatanya = mysqli_fetch_array($cekbice16);
    $idbice16 = $ambildatanya['id_produk'];
    if($bice > 0) {
        $addbice16 = mysqli_query($koneksi, "INSERT INTO pengajuan_produk VALUES ('', '$tanggalmasuk', NULL, '$idbice16', '$bice',NULL, '$nama_pengirim', NULL)");
    }

    //7.MANIPULASI KC
    $cekkc = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='KC'");
    $ambildatanya = mysqli_fetch_array($cekkc);
    $idkc = $ambildatanya['id_produk'];
    if($kc > 0) {
        $addkc = mysqli_query($koneksi, "INSERT INTO pengajuan_produk VALUES ('', '$tanggalmasuk', NULL, '$idkc', '$kc',NULL, '$nama_pengirim', NULL)");
    }

    //8.MANIPULASI KK
    $cekkk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='KK'");
    $ambildatanya = mysqli_fetch_array($cekkk);
    $idkk = $ambildatanya['id_produk'];
    if($kk > 0) {
        $addkk = mysqli_query($koneksi, "INSERT INTO pengajuan_produk VALUES ('', '$tanggalmasuk', NULL, '$idkk', '$kk',NULL, '$nama_pengirim', NULL)");
    }

    //9.MANIPULASI R16
    $cekr16 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='R16'");
    $ambildatanya = mysqli_fetch_array($cekr16);
    $idr16 = $ambildatanya['id_produk'];
    if($r16 > 0) {
        $addr16 = mysqli_query($koneksi, "INSERT INTO pengajuan_produk VALUES ('', '$tanggalmasuk', NULL, '$idr16', '$r16',NULL, '$nama_pengirim', NULL)");
    }
    
    //10.MANIPULASI R12
    $cekr12 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='R12'");
    $ambildatanya = mysqli_fetch_array($cekr12);
    $idr12 = $ambildatanya['id_produk'];
    if($r12 > 0) {
        $addr12 = mysqli_query($koneksi, "INSERT INTO pengajuan_produk VALUES ('', '$tanggalmasuk', NULL, '$idr12', '$r12',NULL, '$nama_pengirim', NULL)");
    }
    

    if($addr16){
        echo "
        <script>
            alert('data berhasil di tambahkan!');
            document.location.href = 'stok_gudang_kecil.php';
        </script>
        ";
    }
    else{
        echo "
        <script>
            alert('data gagal di tambahkan!');
            document.location.href = 'stok_gudang_kecil.php';
        </script>
        ";
    }
}

if(isset($_POST['persetujuan'])){
    $dikirim = $_POST["dikirim"];
    $nama_penyetuju = $_POST["nama_peny"];
    $id_produk = $_POST["idproduk"];
    $id_pengajuan = $_POST["idpengajuan"];

    // Update tanggal
    date_default_timezone_set('Asia/Jakarta');
    $tanggalkeluar = date('Y-m-d H:i:s');

    $update1 = mysqli_query($koneksi, "UPDATE pengajuan_produk 
                            SET nama_penerima ='$nama_penyetuju', 
                            waktu_terima = '$tanggalkeluar',
                            dikirim = '$dikirim'
                            WHERE id_pengajuan='$id_pengajuan'");

    //MANIPULASI B20
    
    $cekb20 = mysqli_query($koneksi, "SELECT * FROM gudang_kecil WHERE id_produk='$id_produk'");
    $ambildatanya = mysqli_fetch_array($cekb20);
    $stokb20 = $ambildatanya['stok'];
    $tambahstokb20 = $stokb20 + intval($dikirim);

    $cekBesarb20 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='$id_produk'");
    $ambildatanya = mysqli_fetch_array($cekBesarb20);
    $stokBesarb20 = $ambildatanya['stok'];
    $kurangstokb20 = $stokBesarb20 - intval($dikirim);

    $update2 = mysqli_query($koneksi, "UPDATE gudang_kecil SET stok ='$tambahstokb20'  WHERE id_produk='$id_produk'");
    $update3 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$kurangstokb20'  WHERE id_produk='$id_produk'");



    if($update1 AND $update2 AND $update3){
        echo "
        <script>
            alert('data berhasil di tambahkan!');
            document.location.href = 'pengajuanProduk.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal di tambahkan!');
            document.location.href = 'pengajuanProduk.php';
        </script>
        ";
    }
}
 
 // Menambah masuk spo
 //Menambah barang baru
 if(isset($_POST['addspo'])){
     $namasales = $_POST["namasales"];
     $namatoko = $_POST["toko"];
     $distrik = $_POST["distrik"];
     $routing = $_POST["routing"];
     $b20 = $_POST["b20"];
     $b16 = $_POST["b16"];
     $b12 = $_POST["b12"];
     $r16 = $_POST["r16"];
     $r12 = $_POST["r12"];
     $kk = $_POST["kk"];
     $kc = $_POST["kc"];
     $bb16 = $_POST["bb16"];
     $bb12 = $_POST["bb12"];
     $bice = $_POST["bice"];
     $keterangan = $_POST["keterangan"];
     $latitude = $_POST["latitude"];
     $longitude = $_POST["longitude"];
 
     $addtoproduk = mysqli_query($koneksi, "INSERT INTO produk VALUES ('$b20', '$b16', '$b12', '$r16', '$r12', '$kk', '$kc', '$bb16', '$bb12', '$bice','','')");
 
     $getidjual = mysqli_query($koneksi, "SELECT kd_jual FROM produk ORDER BY kd_jual DESC");
     $rowidjual = mysqli_fetch_array($getidjual);
     $idjual = $rowidjual['kd_jual'];
 
     $folder = './produk/';
     $name_p = $_FILES['foto']['name'];
     $sumber_p = $_FILES['foto']['tmp_name'];
     move_uploaded_file($sumber_p, $folder.$name_p);
 
     // Update tanggal
     date_default_timezone_set('Asia/Jakarta');
     $tanggalmasuk = date('Y-m-d H:i:s');
 
     $tanggalakhir = date('Y-m-d H:i:s', strtotime('+15 days', strtotime($tanggalmasuk)));
 
     // update status
     // Tanggal target
     $targetDate = $tanggalakhir;
 
     // Waktu Unix dari tanggal target
     $targetTime = strtotime($targetDate);
 
     // Selisih waktu antara sekarang dan tanggal target dalam detik
     $timeDiff = $targetTime - time();
 
     // Konversi selisih waktu ke jumlah hari
     $days = round($timeDiff / (60 * 60 * 24));
     $addmasuk = mysqli_query($koneksi, "INSERT INTO masuk_spo VALUES ('', '$namasales', '$idjual', '$namatoko', '$distrik', '$routing','$tanggalmasuk', '$tanggalakhir', '$keterangan', '$name_p', '$latitude', '$longitude')");
 
     // update stok
     $cekstok = mysqli_query($koneksi, "SELECT * FROM stok_gudang_kecil");
     $ambildatanya = mysqli_fetch_array($cekstok);
     $stokb20 = $ambildatanya['B20'];
     $tambahstokb20 = $stokb20 - intval($b20);
 
     $stokb16 = $ambildatanya['B16'];
     $tambahstokb16 = $stokb16 - intval($b16);
 
     $stokb12 = $ambildatanya['B12'];
     $tambahstokb12 = $stokb12 - intval($b12);
 
     $stokr16 = $ambildatanya['R16'];
     $tambahstokr16 = $stokr16 - intval($r16);
 
     $stokr20 = $ambildatanya['R12'];
     $tambahstokr20 = $stokr20 - intval($r12);
 
     $stokkk = $ambildatanya['KK'];
     $tambahstokkk = $stokkk - intval($kk);
 
     $stokkc = $ambildatanya['KC'];
     $tambahstokkc = $stokkc - intval($kc);
 
     $stokbb12 = $ambildatanya['BB12'];
     $tambahstokbb12 = $stokbb12 - intval($bb12);
 
     $stokbb16 = $ambildatanya['BB16'];
     $tambahstokbb16 = $stokbb16 - intval($bb16);
 
     $stokbice = $ambildatanya['BICE16'];
     $tambahstokbice = $stokbice - intval($bice);
 
     $update = mysqli_query($koneksi, "UPDATE stok_gudang_kecil 
     SET B20 ='$tambahstokb20',
         B16 ='$tambahstokb16',
         B12 ='$tambahstokb12',
         R16 ='$tambahstokr16',
         R12 ='$tambahstokr20',
         KK ='$tambahstokkk',
         KC ='$tambahstokkc',
         BB12 ='$tambahstokbb12',
         BB16 ='$tambahstokbb16',
         BICE16 ='$tambahstokbice'");
 
 
     if($addtoproduk AND $addmasuk AND $update){
         echo "
         <script>
             alert('data berhasil di tambahkan!');
             document.location.href = 'pembelianspo.php';
         </script>
         ";
     }else{
         echo "
         <script>
             alert('data gagal di tambahkan!');
             document.location.href = 'pembelianspo.php';
         </script>
         ";
     }
 }
 
 
 //Update SPO
 if(isset($_POST['editspo'])){
     $b20 = $_POST["b20"];
     $b16 = $_POST["b16"];
     $b12 = $_POST["b12"];
     $r16 = $_POST["r16"];
     $r12 = $_POST["r12"];
     $kk = $_POST["kk"];
     $kc = $_POST["kc"];
     $bb16 = $_POST["bb16"];
     $bb12 = $_POST["bb12"];
     $bice = $_POST["bice"];
     $keterangan = $_POST["keterangan"];
     $latitude = $_POST["latitude"];
     $longitude = $_POST["longitude"];
     $kdspo = $_POST["kdspo"];
     $kdproduk = $_POST["kdproduk"];
 
     $update = mysqli_query($koneksi, "UPDATE produk 
     SET B20 ='$b20',
         B16 ='$b16',
         B12 ='$b12',
         R16 ='$r16',
         R12 ='$r12',
         KK ='$kk',
         KC ='$kc',
         BB12 ='$bb12',
         BB16 ='$bb16',
         BICE16 ='$bice'WHERE kd_jual = '$kdproduk';");
 
 
     // update stok
     $cekstok = mysqli_query($koneksi, "SELECT * FROM stok_gudang_kecil");
     $cekproduk = mysqli_query($koneksi, "SELECT * FROM produk WHERE kd_jual = '$kdproduk';");
     $ambildatanya = mysqli_fetch_array($cekstok);
     $ambilproduk = mysqli_fetch_array($cekproduk);
     $stokb20 = $ambildatanya['B20'];
     $produkb20 = $ambilproduk['B20'];
     $tambahstokb20 = $stokb20 - $produkb20;
 
     $stokb16 = $ambildatanya['B16'];
     $produkb16 = $ambilproduk['B16'];
     $tambahstokb16 = $stokb16 - $produkb16;
 
     $stokb12 = $ambildatanya['B12'];
     $produkb12 = $ambilproduk['B12'];
     $tambahstokb12 = $stokb12 - $produkb12;
 
     $stokr16 = $ambildatanya['R16'];
     $produkr16 = $ambilproduk['R16'];
     $tambahstokr16 = $stokr16 - $produkr16;
 
     $stokr12 = $ambildatanya['R12'];
     $produkr12 = $ambilproduk['R12'];
     $tambahstokr12 = $stokr12 - $produkr12;
 
     $stokkk = $ambildatanya['KK'];
     $produkkk = $ambilproduk['KK'];
     $tambahstokkk = $stokkk - $produkkk;
 
     $stokkc = $ambildatanya['KC'];
     $produkkc = $ambilproduk['KC'];
     $tambahstokkc = $stokkc - $produkkc;
 
     $stokbb12 = $ambildatanya['BB12'];
     $produkbb12 = $ambilproduk['BB12'];
     $tambahstokbb12 = $stokbb12 - $produkbb12;
 
     $stokbb16 = $ambildatanya['BB16'];
     $produkbb16 = $ambilproduk['BB16'];
     $tambahstokbb16 = $stokbb16 - $produkbb16;
 
     $stokbice = $ambildatanya['BICE16'];
     $produkbice = $ambilproduk['BICE16'];
     $tambahstokbice = $stokbice - $produkbice;
 
     $update2 = mysqli_query($koneksi, "UPDATE masuk_spo 
     SET keterangan = '$keterangan',
         latitude = '$latitude',
         longitude = '$longitude'
         WHERE kd_masuk_spo = '$kdspo';");
 
     $update3 = mysqli_query($koneksi, "UPDATE stok_gudang_kecil
     SET B20 ='$tambahstokb20',
         B16 ='$tambahstokb16',
         B12 ='$tambahstokb12',
         R16 ='$tambahstokr16',
         R12 ='$tambahstokr12',
         KK ='$tambahstokkk',
         KC ='$tambahstokkc',
         BB12 ='$tambahstokbb12',
         BB16 ='$tambahstokbb16',
         BICE16 ='$tambahstokbice';");
 
     
     if($update AND $update2 AND $update3){
         echo "
         <script>
             alert('data berhasil di tambahkan!');
             document.location.href = 'pembelianspo1.php';
         </script>
         ";
     }else{
         echo "
         <script>
             alert('data gagal di tambahkan!');
             document.location.href = 'pembelianspo1.php';
         </script>
         ";
     }
 }
 