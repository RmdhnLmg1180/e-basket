<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
      header("Location: login.php");
  }
include "koneksi.php";
$tbl = mysqli_query($conn,"SELECT s.jam_pesan, s.tgl_pesan, s.jam_selesai, p.username, l.no_lpgn FROM pemesanan s, pelanggan p, lapangan l where p.email = s.email and l.no_lpgn = s.no_lpgn order by tgl_pesan and jam_pesan asc; ");

$query1 = mysqli_query($conn,"SELECT * FROM lapangan WHERE jenis_lpgn = 'Lapangan 1 Outdoor'");
$row_query1 = mysqli_fetch_array($query1);

$query2 = mysqli_query($conn,"SELECT * FROM lapangan WHERE jenis_lpgn = 'Lapangan 2 Outdoor'");
$row_query2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($conn,"SELECT * FROM lapangan WHERE jenis_lpgn = 'Lapangan 1 Indoor'");
$row_query3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($conn,"SELECT * FROM lapangan WHERE jenis_lpgn = 'Lapangan 2 Indoor'");
$row_query4 = mysqli_fetch_array($query4);
?>
 
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Basket | Home</title>
    <link rel="icon" type="image/x-icon" href="gambar/Logo.ico">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/862e982684.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-basketball"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-Basket </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fa-sharp fa-solid fa-house"></i>
                    <span>Home</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="pemesanan.php">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>Pemesanan</span>
                </a>
            </li>

        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Pesan riwayat -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="pesan.php" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-check-to-slot"></i>
                                <!-- Counter - Alerts -->
                            </a>
                        </li>

                        <!-- Nav Item - User Information -->
                        <form action="" method="POST" class="login-email"> 
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['username'] ."  ". "  "; ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fa-sharp fa-solid fa-house"></i> Home</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Lapangan dan Harga</h6>
                        </div>
                    </div>
                <div class="card-body">
                    <div class="row">

                        <!-- Lapangan 1 -->
                        <div for="no1" class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <?php 
                                                echo $row_query1['jenis_lpgn']." ". " ";
                                                echo " ' ".$row_query1['no_lpgn']." ' ";
                                                ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp ".number_format($row_query1['harga'],2) . "/jam". "<br>";?></div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lapangan 2 -->
                        <div for="no2" class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <?php 
                                                echo $row_query2['jenis_lpgn']." "." ";
                                                echo " ' ".$row_query2['no_lpgn']." ' ";
                                                ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp ".number_format($row_query2['harga'],2) . "/jam". "<br>";?></div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lapangan 1 In -->
                        <div for="no3" class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            <?php 
                                                echo $row_query3['jenis_lpgn']." "." ";
                                                echo " ' ".$row_query3['no_lpgn']." ' ";
                                                ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp ".number_format($row_query3['harga'],2) . "/jam". "<br>";?></div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div for="no4" class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            <?php 
                                                echo $row_query4['jenis_lpgn']." "." ";
                                                echo " ' ".$row_query4['no_lpgn']." ' ";
                                                ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp ".number_format($row_query4['harga'],2) . "/jam". "<br>";?></div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Content Row -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Booking Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Berakhir</th>
                                            <th>lapangan</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Berakhir</th>
                                            <th>lapangan</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                    <?php $i=1;?>
                                        <?php while($row=mysqli_fetch_array($tbl)) {
                                            $tgl = $row["tgl_pesan"];
                                            $jam1 = $row["jam_pesan"];
                                            $jam2 = $row["jam_selesai"];
                                            $nama = $row["username"];
                                            $no_lpgn = $row["no_lpgn"];
                                            echo "
                                            <tr>
                                                <td>$i</td>
                                                <td>$tgl</td>
                                                <td>$nama</td>
                                                <td>$jam1</td>
                                                <td>$jam2</td>
                                                <td>$no_lpgn</td>
                                            </tr>

                                            ";
                                            $i++;
                                        }   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; E-Basket</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika kamu ingin keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>