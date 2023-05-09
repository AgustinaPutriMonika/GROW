<?php
$koneksi = mysqli_connect("localhost","root","","toko_rokok3");

// Check connection
if (mysqli_connect_errno()){
 echo "Koneksi database gagal : " . mysqli_connect_error();
}

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
    

    if($addb20){
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

if(isset($_POST['persetujuan'])){
    $pengajuan = list($id_pengajuan, $id_produk) = explode("|", $_POST['persetujuan']);
    $dikirim = $_POST["dikirim"];
    $nama_penyetuju = $_POST["nama_peny"];

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

    // //MANIPULASI B16
    // $cekb16 = mysqli_query($koneksi, "SELECT * FROM gudang_kecil WHERE id_produk='B16'");
    // $ambildatanya = mysqli_fetch_array($cekb16);
    // $stokb16 = $ambildatanya['stok'];
    // $tambahstokb16 = $stokb16 + intval($dikirim);

    // $cekBesarb16 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='B16'");
    // $ambildatanya = mysqli_fetch_array($cekBesarb16);
    // $stokBesarb16 = $ambildatanya['stok'];
    // $kurangstokb16 = $stokBesarb16 - intval($dikirim);

    // $update4 = mysqli_query($koneksi, "UPDATE gudang_kecil SET stok ='$tambahstokb16'  WHERE id_produk='B16'");
    // $update5 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$kurangstokb16'  WHERE id_produk='B16'");

    // //MANIPULASI B12
    // $cekb12 = mysqli_query($koneksi, "SELECT * FROM gudang_kecil WHERE id_produk='B12'");
    // $ambildatanya = mysqli_fetch_array($cekb12);
    // $stokb12 = $ambildatanya['stok'];
    // $tambahstokb12 = $stokb12 + intval($dikirim);

    // $cekBesarb12 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='B12'");
    // $ambildatanya = mysqli_fetch_array($cekBesarb12);
    // $stokBesarb12 = $ambildatanya['stok'];
    // $kurangstokb12 = $stokBesarb16 - intval($dikirim);

    // $update6 = mysqli_query($koneksi, "UPDATE gudang_kecil SET stok ='$tambahstokb12'  WHERE id_produk='B12'");
    // $update7 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$kurangstokb12'  WHERE id_produk='B12'");

    // //MANIPULASI BB16
    // $cekbb16 = mysqli_query($koneksi, "SELECT * FROM gudang_kecil WHERE id_produk='BB16'");
    // $ambildatanya = mysqli_fetch_array($cekbb16);
    // $stokbb16 = $ambildatanya['stok'];
    // $tambahstokbb16 = $stokbb16 + intval($dikirim);

    // $cekBesarbb16 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='BB16'");
    // $ambildatanya = mysqli_fetch_array($cekBesarbb16);
    // $stokBesarbb16 = $ambildatanya['stok'];
    // $kurangstokbb16 = $stokBesarbb16 - intval($dikirim);

    // $update8 = mysqli_query($koneksi, "UPDATE gudang_kecil SET stok ='$tambahstokbb16'  WHERE id_produk='BB16'");
    // $update9 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$kurangstokbb16'  WHERE id_produk='BB16'");

    // //MANIPULASI BB12
    // $cekbb12 = mysqli_query($koneksi, "SELECT * FROM gudang_kecil WHERE id_produk='BB12'");
    // $ambildatanya = mysqli_fetch_array($cekbb12);
    // $stokbb12 = $ambildatanya['stok'];
    // $tambahstokbb12 = $stokbb12 + intval($dikirim);

    // $cekBesarbb12 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='BB12'");
    // $ambildatanya = mysqli_fetch_array($cekBesarbb12);
    // $stokBesarbb12 = $ambildatanya['stok'];
    // $kurangstokbb12 = $stokBesarbb12 - intval($dikirim);

    // $update10 = mysqli_query($koneksi, "UPDATE gudang_kecil SET stok ='$tambahstokbb12'  WHERE id_produk='BB12'");
    // $update11 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$kurangstokbb12'  WHERE id_produk='BB12'");

    // //MANIPULASI BICE16
    // $cekbice16 = mysqli_query($koneksi, "SELECT * FROM gudang_kecil WHERE id_produk='BICE16'");
    // $ambildatanya = mysqli_fetch_array($cekbice16);
    // $stokbice16 = $ambildatanya['stok'];
    // $tambahstokbice16 = $stokbice16 + intval($dikirim);

    // $cekBesarbice16 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='BICE16'");
    // $ambildatanya = mysqli_fetch_array($cekBesarbice16);
    // $stokBesarbice16 = $ambildatanya['stok'];
    // $kurangstokbice16 = $stokBesarbice16 - intval($dikirim);

    // $update12 = mysqli_query($koneksi, "UPDATE gudang_kecil SET stok ='$tambahstokbice16'  WHERE id_produk='BICE16'");
    // $update13 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$kurangstokbice16'  WHERE id_produk='BICE16'");

    // //MANIPULASI KC
    // $cekkc = mysqli_query($koneksi, "SELECT * FROM gudang_kecil WHERE id_produk='KC'");
    // $ambildatanya = mysqli_fetch_array($cekkc);
    // $stokkc = $ambildatanya['stok'];
    // $tambahstokkc = $stokkc + intval($dikirim);

    // $cekBesarkc = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='KC'");
    // $ambildatanya = mysqli_fetch_array($cekBesarkc);
    // $stokBesarkc = $ambildatanya['stok'];
    // $kurangstokkc = $stokBesarkc - intval($dikirim);

    // $update14 = mysqli_query($koneksi, "UPDATE gudang_kecil SET stok ='$tambahstokkc'  WHERE id_produk='KC'");
    // $update15 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$kurangstokkc'  WHERE id_produk='KC'");

    // //MANIPULASI KK
    // $cekkk = mysqli_query($koneksi, "SELECT * FROM gudang_kecil WHERE id_produk='KK'");
    // $ambildatanya = mysqli_fetch_array($cekkk);
    // $stokkk = $ambildatanya['stok'];
    // $tambahstokkk = $stokkk + intval($dikirim);

    // $cekBesarkk = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='KK'");
    // $ambildatanya = mysqli_fetch_array($cekBesarkk);
    // $stokBesarkk = $ambildatanya['stok'];
    // $kurangstokk = $stokBesarkk - intval($dikirim);

    // $update16 = mysqli_query($koneksi, "UPDATE gudang_kecil SET stok ='$tambahstokkk'  WHERE id_produk='KK'");
    // $update17 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$kurangstokkk'  WHERE id_produk='KK'");

    // //MANIPULASI R16
    // $cekr16 = mysqli_query($koneksi, "SELECT * FROM gudang_kecil WHERE id_produk='R16'");
    // $ambildatanya = mysqli_fetch_array($cekr16);
    // $stokr16 = $ambildatanya['stok'];
    // $tambahstokr16 = $stokr16 + intval($dikirim);

    // $cekBesarr16 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='R16'");
    // $ambildatanya = mysqli_fetch_array($cekBesarr16);
    // $stokBesar16 = $ambildatanya['stok'];
    // $kurangstokr16 = $stokBesarr16 - intval($dikirim);

    // $update18 = mysqli_query($koneksi, "UPDATE gudang_kecil SET stok ='$tambahstokr16'  WHERE id_produk='R16'");
    // $update19 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$kurangstokr16'  WHERE id_produk='R16'");

    // //MANIPULASI R12
    // $cekr12 = mysqli_query($koneksi, "SELECT * FROM gudang_kecil WHERE id_produk='R12'");
    // $ambildatanya = mysqli_fetch_array($cekr12);
    // $stokr12 = $ambildatanya['stok'];
    // $tambahstokr12 = $stokr12 + intval($dikirim);

    // $cekBesarr12 = mysqli_query($koneksi, "SELECT * FROM gudang_besar WHERE id_produk='R12'");
    // $ambildatanya = mysqli_fetch_array($cekBesarr12);
    // $stokBesar12 = $ambildatanya['stok'];
    // $kurangstokr12 = $stokBesarr12 - intval($dikirim);

    // $update20 = mysqli_query($koneksi, "UPDATE gudang_kecil SET stok ='$tambahstokr12'  WHERE id_produk='R12'");
    // $update21 = mysqli_query($koneksi, "UPDATE gudang_besar SET stok ='$kurangstokr12'  WHERE id_produk='R12'");



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
?>