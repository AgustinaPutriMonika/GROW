<?php
$koneksi = mysqli_connect("localhost","root","","toko_rokok2");

// Check connection
if (mysqli_connect_errno()){
 echo "Koneksi database gagal : " . mysqli_connect_error();
}

//Menambah barang baru
if(isset($_POST['addnew'])){
    $namasales = $_POST["namasales"];
    $namatoko = $_POST["namatoko"];
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
    // $geocode = $_POST["geocode"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];


    $folder = './produk/';
    $name_p = $_FILES['foto']['name'];
    $sumber_p = $_FILES['foto']['tmp_name'];
    move_uploaded_file($sumber_p, $folder.$name_p);
    $addtotoko = mysqli_query($koneksi, "INSERT INTO toko VALUES ('','$namatoko', '$distrik', '$routing', '$jkunjungan', '$keterangan', '$name_p', '$latitude', '$longitude')");

    $addtoproduk = mysqli_query($koneksi, "INSERT INTO produk VALUES ('$b20', '$b16', '$b12', '$r16', '$r12', '$kk', '$kc', '$bb16', '$bb12', '$bice','')");

    $getidjual = mysqli_query($koneksi, "SELECT kd_jual FROM produk ORDER BY kd_jual DESC");
    $rowidjual = mysqli_fetch_array($getidjual);
    $idjual = $rowidjual['kd_jual'];
    
    $getidtoko = mysqli_query($koneksi, "SELECT id_toko FROM toko ORDER BY id_toko DESC");
    $rowidtoko = mysqli_fetch_array($getidtoko);
    $idtoko = $rowidtoko['id_toko'];

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');
    $addmasuk = mysqli_query($koneksi, "INSERT INTO masuk_toko VALUES ('', '$namasales', '$idjual', '$idtoko','$tanggal')");

    if($addtotoko AND $addtoproduk AND $addmasuk){
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
            document.location.href = 'masuk.php';
        </script>
        ";
    }
}

//Menambah barang baru sales
if(isset($_POST['addnewsales'])){
    $namasales = $_POST["namasales"];
    $namatoko = $_POST["namatoko"];
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
    // $geocode = $_POST["geocode"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];


    $folder = './produk/';
    $name_p = $_FILES['foto']['name'];
    $sumber_p = $_FILES['foto']['tmp_name'];
    move_uploaded_file($sumber_p, $folder.$name_p);
    $addtotoko = mysqli_query($koneksi, "INSERT INTO toko VALUES ('','$namatoko', '$distrik', '$routing', '$jkunjungan', '$keterangan', '$name_p', '$latitude', '$longitude')");

    $addtoproduk = mysqli_query($koneksi, "INSERT INTO produk VALUES ('$b20', '$b16', '$b12', '$r16', '$r12', '$kk', '$kc', '$bb16', '$bb12', '$bice','')");

    $getidjual = mysqli_query($koneksi, "SELECT kd_jual FROM produk ORDER BY kd_jual DESC");
    $rowidjual = mysqli_fetch_array($getidjual);
    $idjual = $rowidjual['kd_jual'];
    
    $getidtoko = mysqli_query($koneksi, "SELECT id_toko FROM toko ORDER BY id_toko DESC");
    $rowidtoko = mysqli_fetch_array($getidtoko);
    $idtoko = $rowidtoko['id_toko'];

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');
    $addmasuk = mysqli_query($koneksi, "INSERT INTO masuk_toko VALUES ('', '$namasales', '$idjual', '$idtoko','$tanggal')");

    if($addtotoko AND $addtoproduk AND $addmasuk){
        echo "
        <script>
            alert('data berhasil di tambahkan!');
            document.location.href = 'sales.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal di tambahkan!');
            document.location.href = 'sales.php';
        </script>
        ";
    }
}

?>