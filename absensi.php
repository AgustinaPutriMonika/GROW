<?php
// session_start();
// require 'function.php';
require 'cek_login.php';
// require './config/allFunctions.php';
require './config/AbsensiController.php';

if (isset($_POST['addAbsenMasuk'])) {
    absensiMasuk($_POST, $_SESSION);
}

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
    <script type="text/javascript">
        window.onload = function() {
            getLocation();
        };

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            document.getElementById("latitudeInput").value = latitude;
            document.getElementById("longitudeInput").value = longitude;
            document.getElementById("latitudeOutput").innerText = "Latitude: " + latitude;
            document.getElementById("longitudeOutput").innerText = "Longitude: " + longitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Anda Harus Mengijinkan Geo Location untuk mengisi form");
                    break;
                default:
                    alert("Gagal mengambil lokasi: " + error.message);
                    break;
            }
        }
    </script>

    <style>
        #layoutSidenav_content .datatable-top .datatable-search .datatable-input {
            display: none;
        }

        .datatable-selector {
            display: none;
        }

        .datatable-dropdown {
            display: none;
        }

        .datatable-bottom .datatable-info {
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
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
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
                            <a class="nav-link active" href="absensi.php">Absensi</a>
                            <a class="nav-link" href="stok_jalan.php">Stok Jalan</a>
                            <a class="nav-link" href="stok_gudang_besar.php">Stok Gudang Besar</a>
                            <a class="nav-link" href="stok_gudang_kecil.php">Stok Gudang Kecil</a>
                            <a class="nav-link" href="pengajuanProduk.php">Pengajuan Produk</a>
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
                    <?= $_SESSION['nama'] ?> (<?= $_SESSION['level'] ?>)
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">GROW</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">ANDA LOGIN SEBAGAI <?php echo strtoupper($_SESSION['nama']); ?> (<?php echo strtoupper($_SESSION['level']); ?>)</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>ABSENSI</h2>
                        </div>
                        <div class="card-body">
                            <div>
                                <?php if (isAbsenMasuk($_SESSION['id'])) : ?>
                                    <!-- <form method="POST" action=""> -->
                                    <a type="button" href="absen_keluar.php?id_absensi=<?= getLastAbsen($_SESSION['id'])['id_absensi'] ?>" class="btn btn-danger">
                                        Absen Keluar
                                    </a>
                                    <!-- </form> -->
                                <?php elseif (getLastAbsen($_SESSION['id']) == -1) : ?>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#absenMasuk">
                                        Absen Masuk
                                    </button>
                                <?php else : ?>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#absenMasuk">
                                        Absen Masuk
                                    </button>
                                <?php endif; ?>
                            </div>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Id Pengguna</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>No Telepon</th>
                                        <th>Waktu Masuk</th>
                                        <th>Waktu Keluar</th>
                                        <th>Keterangan</th>
                                        <th>Foto</th>
                                        <th>Lokasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $absens = getAbsensi($_SESSION['id']);
                                    foreach ($absens as $absen) :
                                    ?>
                                        <tr>
                                            <td><?= $absen['id_user'] ?></td>
                                            <td><?= $_SESSION['nama'] ?></td>
                                            <td><?= ucwords($_SESSION['level']) ?></td>
                                            <td><?= $_SESSION['no_telp'] ?></td>
                                            <?php
                                            $datetimeMasuk = new DateTime($absen['waktu_masuk']);
                                            $formatedDatetimeMasuk = $datetimeMasuk->format('j M, Y g:i A');

                                            $datetimeKeluar = new DateTime($absen['waktu_keluar']);
                                            $formatedDatetimeKeluar = $datetimeKeluar->format('j M, Y g:i A');
                                            ?>
                                            <td><?= $formatedDatetimeMasuk ?></td>
                                            <td>
                                                <?php if ($absen['waktu_keluar'] == '') : ?>
                                                    <!-- <a href="absen_keluar.php?kd_absensi=<?= $absen['kd_absensi'] ?>">Keluar</a> -->
                                                    <p>-</p>
                                                <?php else : ?>
                                                    <?= $formatedDatetimeKeluar ?>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $absen['keterangan'] ?></td>
                                            <td>
                                                <img width="150" src="./assets/absensi/<?= $absen['foto'] ?>" />
                                            </td>
                                            <td><a href="http://maps.google.com/maps?q=<?= $absen['latitude'] ?>,<?= $absen['longitude'] ?>" target="_blank">Cek Lokasi</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="absenMasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Absen Masuk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" class="myForm" enctype="multipart/form-data" action="">
                                                    <div class="modal-body">
                                                        <input type="file" name="foto" class="form-control" capture><br>
                                                        <input type="text" name="keterangan" placeholder="keterangan" class="form-control" /><br>
                                                        <input type="hidden" id="latitudeInput" name="latitude" placeholder="latitude" class="form-control" /><br>
                                                        <input type="hidden" id="longitudeInput" name="longitude" placeholder="longitude" class="form-control" /><br>
                                                        <!-- <input type="hidden" name="nama_karyawan" /> -->
                                                        <button type="submit" class="btn btn-primary" name="addAbsenMasuk">Submit</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="absenKeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Absen Masuk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" class="myForm" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="file" name="foto" class="form-control"><br>
                                                        <input type="text" name="keterangan" placeholder="keterangan" class="form-control"><br>
                                                        <input type="hidden" id="latitudeInput" name="latitude" placeholder="latitude" class="form-control"><br>
                                                        <input type="hidden" id="longitudeInput" name="longitude" placeholder="longitude" class="form-control"><br>
                                                        <button type="submit" class="btn btn-primary" name="addAbsenKeluar">Submit</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" class="myForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" name="namasales" placeholder="nama sales" class="form-control"><br>
                        <input type="text" name="namatoko" placeholder="nama toko" class="form-control"><br>
                        <input type="text" name="distrik" placeholder="distrik" class="form-control"><br>
                        <input type="text" name="routing" placeholder="routing" class="form-control"><br>
                        <!-- <input type="text" name="jkunjungan" placeholder="jenis kunjungan" class="form-control"><br> -->
                        <select name="jkunjungan" id="jkunjungan" placeholder="Pilih Kunjungan" class="form-control">
                            <option value="io">IO</option>
                            <option value="ro">RO</option>
                            <option value="roc">ROC</option>
                            <option value="r">R</option>
                            <option value="rot">ROT</option>
                            <option value="r2w">R2W</option>
                        </select> <br>
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
                        <input type="text" name="keterangan" placeholder="keterangan" class="form-control"><br>
                        <input type="file" name="foto" class="form-control"><br>
                        <input type="hidden" id="latitudeInput" name="latitude" placeholder="latitude" class="form-control"><br>
                        <input type="hidden" id="longitudeInput" name="longitude" placeholder="longitude" class="form-control"><br>
                        <button type="submit" class="btn btn-primary" name="addnew">Submit</button>
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