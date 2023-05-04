<?php
require 'function.php';
require 'cek_login.php';
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

    <!-- DATA TABLE PRINT -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <style>
        #layoutSidenav_content .datatable-top .datatable-search .datatable-input {
            display: none;
        }

        #datatablesSimple_wrapper .dataTables_info {
            display: none;
        }

        #datatablesSimple_wrapper .dataTables_paginate .paging_simple_numbers {
            display: none;
        }

        .datatable-container #datatablesSimple_wrapper .dataTables_paginate .previous,
        .datatable-container #datatablesSimple_wrapper .dataTables_paginate .next {
            display: none;
        }

        .dataTables_paginate .paginate_button.current {
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
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pengguna
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="login.php">Edit Akun</a>
                                <a class="nav-link" href="absensi.php">Absensi</a>
                                <a class="nav-link" href="logout.php">Logout</a>
                            </nav>

                        </div>
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="absensi.php">Hasil Absensi</a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="stok_gudang_kecil.php">Stok Gudang</a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="pembelianspo.php">Pembelian SPO</a>
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
                        <li class="breadcrumb-item active">ANDA LOGIN SEBAGAI <?php echo strtoupper($_SESSION['nama_karyawan']); ?> (<?php echo strtoupper($_SESSION['level']); ?>)</li>
                    </ol>
                    <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Barang
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Status</th>
                                        <th>Nama Sales</th>
                                        <th>Nama Toko</th>
                                        <th>Distrik</th>
                                        <th>Routing</th>
                                        <th>B20</th>
                                        <th>B16</th>
                                        <th>B12</th>
                                        <th>R16</th>
                                        <th>R12</th>
                                        <th>KK</th>
                                        <th>KC</th>
                                        <th>BB16</th>
                                        <th>BB12</th>
                                        <th>B.ICE</th>
                                        <th>Keterangan</th>
                                        <th>Foto</th>
                                        <?php if ($_SESSION['level'] == 'admin') : ?>
                                            <th>GeoLocation</th>
                                        <?php else : ?>
                                            <th>Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambilsemua = mysqli_query($koneksi, "SELECT * FROM masuk_spo JOIN produk ON masuk_spo.kd_jual = produk.kd_jual JOIN toko ON masuk_spo.kd_toko = toko.kd_toko JOIN distrik ON distrik.kd_distrik=toko.kd_distrik ORDER BY kd_masuk_spo ASC;");
                                    $no = 1;
                                    $totalb20 = 0;
                                    while ($data = mysqli_fetch_array($ambilsemua)) {
                                        $kdmasuk = $data['kd_masuk_spo'];
                                        $kdproduk = $data['kd_jual'];
                                        $tanggalmasuk = $data['tanggal_masuk'];
                                        $tanggalkeluar = $data['tanggal_keluar'];
                                        $namasales = $data['nama_karyawan'];
                                        $namatoko = $data['nama_toko'];
                                        $distrik = $data['nama_distrik'];
                                        $routing = $data['routing'];
                                        $b20 = $data['B20'];
                                        $b16 = $data['B16'];
                                        $b12 = $data['B12'];
                                        $r16 = $data['R16'];
                                        $r12 = $data['R12'];
                                        $kk = $data['KK'];
                                        $kc = $data['KC'];
                                        $bb16 = $data['BB16'];
                                        $bb12 = $data['BB12'];
                                        $bice = $data['BICE16'];
                                        $keterangan = $data['keterangan'];
                                        $foto = $data['gambar_toko'];
                                        $latitude = $data['latitude'];
                                        $longitude = $data['longitude'];
                                        $totalb20 += $data['B20'];
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $tanggalmasuk; ?></td>
                                            <td><?= $tanggalkeluar; ?></td>
                                            <td>
                                                <p id="teks<?= $kdmasuk; ?>">Hello World</p>


                                                <script>
                                                    const tanggalTujuan<?= $kdmasuk; ?> = new Date('<?php echo $tanggalkeluar; ?>').getTime();
                                                    let hitungMundur<?= $kdmasuk; ?>;

                                                    hitungMundur<?= $kdmasuk; ?> = setInterval(function() {
                                                        tanggalSekarang = new Date().getTime();

                                                        const selisih = tanggalTujuan<?= $kdmasuk; ?> - tanggalSekarang;
                                                        const hari = Math.floor(selisih / (1000 * 60 * 60 * 24));

                                                        const teks = document.getElementById('teks<?= $kdmasuk; ?>');
                                                        teks.innerHTML = 'Batas Waktu Pembayaran: ' + hari + ' hari';

                                                        if (selisih < 0) {
                                                            clearInterval(hitungMundur<?= $kdmasuk; ?>);
                                                            teks.innerHTML = 'Batas Waktu Pembayaran Habis!';
                                                        }
                                                    }, 1000);
                                                </script>
                                            </td>
                                            <td><?= $namasales; ?></td>
                                            <td><?= $namatoko; ?></td>
                                            <td><?= $distrik; ?></td>
                                            <td><?= $routing; ?></td>
                                            <td><?= $b20; ?></td>
                                            <td><?= $b16; ?></td>
                                            <td><?= $b12; ?></td>
                                            <td><?= $r16; ?></td>
                                            <td><?= $r12; ?></td>
                                            <td><?= $kk; ?></td>
                                            <td><?= $kc; ?></td>
                                            <td><?= $bb16; ?></td>
                                            <td><?= $bb12; ?></td>
                                            <td><?= $bice; ?></td>
                                            <td><?= $keterangan; ?></td>
                                            <td><img src="produk/<?php echo $foto; ?>" width="200px" /></td>
                                            <?php if ($_SESSION['level'] == 'admin') : ?>
                                                <td><?= $latitude, ", ", $longitude; ?></td>
                                            <?php else : ?>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editspo<?= $kdmasuk; ?>">
                                                        Edit
                                                    </button>
                                                </td>
                                            <?php endif; ?>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editspo<?= $kdmasuk; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" class="myForm" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="kdspo" value="<?= $kdmasuk; ?>" class="form-control" required>
                                                            <input type="hidden" name="kdproduk" value="<?= $kdproduk; ?>" class="form-control" required>
                                                            <input type="number" name="b20" value="<?= $b20; ?>" placeholder="B20" class="form-control"><br>
                                                            <input type="number" name="b16" value="<?= $b16; ?>" placeholder="B16" class="form-control"><br>
                                                            <input type="number" name="b12" value="<?= $b12; ?>" placeholder="B12" class="form-control"><br>
                                                            <input type="number" name="r16" value="<?= $r16; ?>" placeholder="R16" class="form-control"><br>
                                                            <input type="number" name="r12" value="<?= $r12; ?>" placeholder="R12" class="form-control"><br>
                                                            <input type="number" name="kk" value="<?= $kk; ?>" placeholder="KK" class="form-control"><br>
                                                            <input type="number" name="kc" value="<?= $kc; ?>" placeholder="KC" class="form-control"><br>
                                                            <input type="number" name="bb16" value="<?= $bb16; ?>" placeholder="BB16" class="form-control"><br>
                                                            <input type="number" name="bb12" value="<?= $bb12; ?>" placeholder="BB12" class="form-control"><br>
                                                            <input type="number" name="bice" value="<?= $bice; ?>" placeholder="BICE" class="form-control"><br>
                                                            <input type="text" name="keterangan" value="<?= $keterangan; ?>" placeholder="keterangan" class="form-control"><br>
                                                            <input type="hidden" id="latitudeInput" name="latitude" placeholder="latitude" class="form-control"><br>
                                                            <input type="hidden" id="longitudeInput" name="longitude" placeholder="longitude" class="form-control"><br>
                                                            <button type="submit" class="btn btn-primary" name="editspo">Submit</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    };
                                    ?>
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
                <form method="POST" class="myForm" enctype="multipart/form-data" id="formToko">
                    <div class="modal-body">
                        <label>Distrik</label>
                        <select name="distrik" onchange="document.getElementById('formToko').submit()" class="form-control" required>
                            <option value="">Pilih</option>
                            <?php
                            $ambildistrik = mysqli_query($koneksi, "SELECT * FROM distrik");
                            while ($distrik = mysqli_fetch_array($ambildistrik)) {
                                $selected = '';
                                if (isset($_POST['distrik']) && !empty($_POST['distrik']) && $_POST['distrik'] == $distrik['kd_distrik']) {
                                    $selected = 'selected';
                                }
                                echo '<option value="' . $distrik['kd_distrik'] . '" ' . $selected . '>' . htmlentities($distrik['nama_distrik']) . '</option>';
                            }
                            ?>
                        </select><br>
                        <label>Nama Toko</label>
                        <select name="toko" class="form-control" required>
                            <option value="">Pilih</option>
                            <?php
                            if (isset($_POST['distrik']) && !empty($_POST['distrik'])) {
                                $id_distrik = $_POST['distrik'];
                                $ambiltoko = mysqli_query($koneksi, "SELECT * FROM toko WHERE kd_distrik='$id_distrik'");
                                while ($toko = mysqli_fetch_array($ambiltoko)) {
                                    echo '<option value="' . $toko['kd_toko'] . '">' . htmlentities($toko['nama_toko']) . '</option>';
                                }
                            } else {
                                echo '<option value="">Tidak ada toko yang tersedia</option>';
                            }
                            ?>
                        </select><br>
                        <input type="text" name="namasales" placeholder="nama sales" class="form-control"><br>
                        <!-- <input type="text" name="routing" placeholder="routing" class="form-control"><br> -->
                        <select name="routing" id="routing" placeholder="routing" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> <br>
                        <!-- <input type="text" name="jkunjungan" placeholder="jenis kunjungan" class="form-control"><br> -->
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
                        <button type="submit" class="btn btn-primary" name="addspo">Submit</button>
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

    <?php if ($_SESSION['level'] == 'admin') : ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatablesSimple').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'excel', 'print'
                    ]
                });
            });
        </script>
    <?php endif; ?>
</body>

</html>