<?php
$koneksi = mysqli_connect("localhost","root","","toko_rokok2");

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

    $addtoproduk = mysqli_query($koneksi, "INSERT INTO produk VALUES ('$b20', '$b16', '$b12', '$r16', '$r12', '$kk', '$kc', '$bb16', '$bb12', '$bice','','')");

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
    $cekstok = mysqli_query($koneksi, "SELECT * FROM stok_gudang_kecil");
    $ambildatanya = mysqli_fetch_array($cekstok);
    $stokb20 = $ambildatanya['B20'];
    $tambahstokb20 = $stokb20 + intval($b20);

    $stokb16 = $ambildatanya['B16'];
    $tambahstokb16 = $stokb16 + intval($b16);

    $stokb12 = $ambildatanya['B12'];
    $tambahstokb12 = $stokb12 + intval($b12);

    $stokr16 = $ambildatanya['R16'];
    $tambahstokr16 = $stokr16 + intval($r16);

    $stokr20 = $ambildatanya['R12'];
    $tambahstokr20 = $stokr20 + intval($r12);

    $stokkk = $ambildatanya['KK'];
    $tambahstokkk = $stokkk + intval($kk);

    $stokkc = $ambildatanya['KC'];
    $tambahstokkc = $stokkc + intval($kc);

    $stokbb12 = $ambildatanya['BB12'];
    $tambahstokbb12 = $stokbb12 + intval($bb12);

    $stokbb16 = $ambildatanya['BB16'];
    $tambahstokbb16 = $stokbb16 + intval($bb16);

    $stokbice = $ambildatanya['BICE16'];
    $tambahstokbice = $stokbice + intval($bice);

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


    if($update){
        echo "
        <script>
            alert('data berhasil di tambahkan!');
            document.location.href = 'stok_gudang_kecil.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal di tambahkan!');
            document.location.href = 'stok_gudang_kecil.php';
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

    // update stok
    $cekstok = mysqli_query($koneksi, "SELECT * FROM stok_gudang_kecil");
    $ambildatanya = mysqli_fetch_array($cekstok);
    $stokb20 = $ambildatanya['B20'];
    $tambahstokb20 = $stokb20 + intval($b20);

    $stokb16 = $ambildatanya['B16'];
    $tambahstokb16 = $stokb16 + intval($b16);

    $stokb12 = $ambildatanya['B12'];
    $tambahstokb12 = $stokb12 + intval($b12);

    $stokr16 = $ambildatanya['R16'];
    $tambahstokr16 = $stokr16 + intval($r16);

    $stokr20 = $ambildatanya['R12'];
    $tambahstokr20 = $stokr20 + intval($r12);

    $stokkk = $ambildatanya['KK'];
    $tambahstokkk = $stokkk + intval($kk);

    $stokkc = $ambildatanya['KC'];
    $tambahstokkc = $stokkc + intval($kc);

    $stokbb12 = $ambildatanya['BB12'];
    $tambahstokbb12 = $stokbb12 + intval($bb12);

    $stokbb16 = $ambildatanya['BB16'];
    $tambahstokbb16 = $stokbb16 + intval($bb16);

    $stokbice = $ambildatanya['BICE16'];
    $tambahstokbice = $stokbice + intval($bice);

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
        BICE16 ='$tambahstokbice';");

    $update2 = mysqli_query($koneksi, "UPDATE masuk_spo 
    SET keterangan = '$keterangan',
        latitude = '$latitude',
        longitude = '$longitude'
        WHERE kd_masuk_spo = '$kdspo';");


    if($update2 AND $update){
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



















//Menambah barang baru sales
// if(isset($_POST['addnewsales'])){
//     $namasales = $_POST["namasales"];
//     $namatoko = $_POST["toko"];
//     $distrik = $_POST["distrik"];
//     $routing = $_POST["routing"];
//     $jkunjungan = $_POST["jkunjungan"];
//     $b20 = $_POST["b20"];
//     $b16 = $_POST["b16"];
//     $b12 = $_POST["b12"];
//     $r16 = $_POST["r16"];
//     $r12 = $_POST["r12"];
//     $kk = $_POST["kk"];
//     $kc = $_POST["kc"];
//     $bb16 = $_POST["bb16"];
//     $bb12 = $_POST["bb12"];
//     $bice = $_POST["bice"];
//     $keterangan = $_POST["keterangan"];
//     // $geocode = $_POST["geocode"];
//     $latitude = $_POST["latitude"];
//     $longitude = $_POST["longitude"];


//     $folder = './produk/';
//     $name_p = $_FILES['foto']['name'];
//     $sumber_p = $_FILES['foto']['tmp_name'];
//     move_uploaded_file($sumber_p, $folder.$name_p);
//     $addtotoko = mysqli_query($koneksi, "INSERT INTO toko VALUES ('','$namatoko', '$distrik', '$routing', '$jkunjungan', '$keterangan', '$name_p', '$latitude', '$longitude')");

//     $addtoproduk = mysqli_query($koneksi, "INSERT INTO produk VALUES ('$b20', '$b16', '$b12', '$r16', '$r12', '$kk', '$kc', '$bb16', '$bb12', '$bice','')");

//     $getidjual = mysqli_query($koneksi, "SELECT kd_jual FROM produk ORDER BY kd_jual DESC");
//     $rowidjual = mysqli_fetch_array($getidjual);
//     $idjual = $rowidjual['kd_jual'];

//     date_default_timezone_set('Asia/Jakarta');
//     $tanggal = date('Y-m-d H:i:s');
//     $addmasuk = mysqli_query($koneksi, "INSERT INTO masuk_toko VALUES ('', '$namasales', '$idjual', '$namatoko', '$distrik', '$routing','$tanggal''$jkunjungan', '$keterangan', '$name_p', '$latitude', '$longitude')");

//     if($addtotoko AND $addtoproduk AND $addmasuk){
//         echo "
//         <script>
//             alert('data berhasil di tambahkan!');
//             document.location.href = 'sales.php';
//         </script>
//         ";
//     }else{
//         echo "
//         <script>
//             alert('data gagal di tambahkan!');
//             document.location.href = 'sales.php';
//         </script>
//         ";
//     }
// }

?>