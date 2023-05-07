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
?>