<?php 
require './config/allFunctions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - GROW</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            #layoutSidenav_content .datatable-top .datatable-search .datatable-input {
                display: none;
            }
            .datatable-selector {
                display: none;
            }
            .datatable-dropdown{
                display: none;
            }
            .datatable-bottom .datatable-info{
                display: none;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">GROW</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Edit Akun</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link " href="absensi.php">Absensi</a>
                            <a class="nav-link" href="stok_jalan.php">Stok Jalan</a>
                            <a class="nav-link" href="stok_gudang_besar.php">Stok Gudang Besar</a>
                            <a class="nav-link" href="stok_gudang_kecil.php">Stok Gudang Kecil</a>
                            <a class="nav-link active" href="pengajuanProduk.php">Pengajuan Produk</a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <!-- <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div> -->
                                Penjualan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <div class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="#">Penjualan non-SPO</a>
                                    <a class="nav-link" href="#">Penjualan SPO</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">GROW</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">ANDA LOGIN SEBAGAI ADMIN</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <h2>DAFTAR PENGAJUAN PRODUK</h2>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Produk</th>
                                        <th>Jumlah</th>
                                        <th>Jumlah Dikirim</th>
                                        <th>Nama Pengaju</th>
                                        <th>Nama Pengirim</th>
                                        <th>Waktu Masuk</th>
                                        <th>Waktu Terima</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $ambilsemua = mysqli_query($koneksi, "SELECT * FROM pengajuan_produk" );
                                        $no=1;
                                        while($data = mysqli_fetch_array($ambilsemua)){
                                            $id_produk = $data['id_produk'];
                                            $waktu_masuk = $data['waktu_masuk'];
                                            $waktu_terima = $data['waktu_terima'];
                                            $id_produk = $data['id_produk'];
                                            $jumlah = $data['jumlah'];
                                            $pengirim = $data['nama_pengirim'];
                                            $penerima = $data['nama_penerima'];
                                            $id_pengajuan = $data['id_pengajuan'];
                                            $pengiriman = $data['dikirim'];
                                    ?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$id_produk;?></td>
                                        <td><?=$jumlah;?></td>
                                        <td><?=$pengiriman;?></td>
                                        <td><?=$pengirim;?></td>
                                        <td id="penerima"><?=$penerima;?></td>
                                        <td><?=$waktu_masuk;?></td>
                                        <td id="waktu_terima"><?=$waktu_terima;?></td>
                                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setuju<?= $id_pengajuan;?>" id="setuju" value="<?= $id_pengajuan;?>">
                                            Persetujuan
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="setuju<?= $id_pengajuan;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Stok</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" class="myForm" enctype="multipart/form-data" id="formToko">
                                            <div class="modal-body">
                                                <input type="hidden" name="idpengajuan" value="<?= $id_pengajuan;?>" class="form-control" required>
                                                <input type="hidden" name="idproduk" value="<?= $id_produk;?>" class="form-control" required>
                                                <input type="text" name="nama_peny" placeholder="Nama Penyetuju" class="form-control"><br>
                                                <input type="number" name="dikirim" placeholder="Jumlah Dikirim" class="form-control"><br>
                                                <button type="submit" class="btn btn-primary" name="persetujuan"  value="<?= $id_pengajuan;?>">Submit</button>
                                                <!-- <button type="submit" class="btn btn-primary" name="persetujuan" value="<?= $id_pengajuan."|".$id_produk;?>">Submit</button> -->
                                                
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Stok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" class="myForm" enctype="multipart/form-data" id="formToko">
                <div class="modal-body">
                    <input type="number" name="b20" placeholder="B20" class="form-control"><br>
                    <input type="number" name="b16" placeholder="B16" class="form-control"><br>
                    <input type="number" name="b12" placeholder="B12" class="form-control"><br>
                    <input type="number" name="r16" placeholder="R16" class="form-control"><br>
                    <input type="number" name="r12" placeholder="R12" class="form-control"><br>
                    <input type="number" name="kk" placeholder="KK" class="form-control"><br>
                    <input type="number" name="kc" placeholder="KC" class="form-control"><br>
                    <input type="number" name="bb16" placeholder="BB16" class="form-control"><br>
                    <input type="number" name="bb12" placeholder="BB12" class="form-control"><br>
                    <input type="number" name="bice" placeholder="BICE" class="form-control"><br>
                    <button type="submit" class="btn btn-primary" name="stokgkecil">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

<!-- <?php
                                                    session_start();
                                                    if(isset($_POST['persetujuan'])) {
                                                        // tombol persetujuan sudah di-klik, maka ubah labelnya menjadi "Sudah diterima" dan simpan informasi di session
                                                        $_SESSION['persetujuan'] = true;
                                                        header("Location: ".$_SERVER['PHP_SELF']);
                                                        exit();
                                                    } else {
                                                        // tombol persetujuan belum di-klik, maka cek informasi di session dan tampilkan atau sembunyikan tombol "Submit"
                                                        if(isset($_SESSION['persetujuan'])) {
                                                            echo '<button type="button" class="btn btn-success" disabled>Sudah diterima</button>';
                                                        } else {
                                                            echo '<button type="submit" class="btn btn-primary" name="persetujuan" value="'.$id_pengajuan.'">Submit</button>';
                                                        }
                                                    }
                                                ?> -->