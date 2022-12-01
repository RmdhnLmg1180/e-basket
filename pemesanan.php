<?php 

error_reporting(0);
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}



if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $tanggal = $_POST['tgl_pesan'];
    $jam_pesan = $_POST['jam_pesan'];
    $Jam_selesai = $_POST['Jam_selesai'];
    $no_lpgn = $_POST['no_lpgn'];
    $jaminan = $_POST['jaminan'];
 

    $query = "INSERT INTO pemesanan (no, email, jam_pesan, Jam_selesai, tgl_pesan, no_lpgn, jaminan) VALUES (' ', '$email', '$jam_pesan', '$Jam_selesai', '$tanggal', '$no_lpgn', '$jaminan' )";
    $result = mysqli_query($conn, $query);
    echo "
    <script> alert('Pemesanan anda sedang di proses')</script>
    ";
    }
         



?>
 
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Basket | Pemesanan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/862e982684.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    

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
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fa-sharp fa-solid fa-house"></i>
                    <span>Home</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
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
                <nav class="navbar navbar-fixed navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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
                        <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-clipboard"></i> Pemesanan</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info">Silahkan isi Form dibawah ini !</h6>
                        </div>
                    </div>
                        <form action="" method="post">
                            <div class="pesanan">
                                <!-- email -->
                                <div class="d-sm-flex">
                                    <div>
                                        <div class="card-header py-3">
                                            <label for="cemail" class="form-label text-primary font-weight-bold">Konfirmasi Email</label>
                                        </div>
                                        <input type="text" placeholder="Confirm email"  class="form-control"  name="email" value="<?php echo $email; ?>" required>
                                    </div> 
                                    <div class="card-header py-3">
                                        <label for="tm" class="form-label text-primary font-weight-bold"></label>
                                    </div>
                                </div>
                                <!-- tanggal -->
                                <div class="d-sm-flex">
                                    <div>
                                        <div class="card-header py-3">
                                            <label for="tanggal" class="form-label text-primary font-weight-bold">Tanggal</label>
                                        </div>
                                        <div>
                                        <input type="date" placeholder="date" class="form-control" name="tanggal" value="<?php echo $tanggal; ?>" required>
                                        </div>
                                    </div> 
                                    <div class="card-header py-3">
                                                <label for="tm" class="form-label text-primary font-weight-bold"></label>
                                    </div>
                                </div>
                                <div class="d-sm-flex">
                                    <!-- jam mulai -->
                                    <div>
                                        <div class="card-header py-3">
                                            <label for="tm" class="form-label text-primary font-weight-bold">Jam Mulai</label>
                                        </div>
                                        <input type="time" placeholder="Start time" class="form-control" name="jam_pesan" value="<?php echo $jam_pesan; ?>" required>
                                    </div> 
                                    <!-- Jam Selesai -->
                                        <div class="card-header py-3">
                                            <label for="tm" class="form-label text-primary font-weight-bold"></label>
                                        </div>
                                    <div>
                                        <div class="card-header py-3">
                                            <label for="wm" class="form-label text-primary font-weight-bold">Jam Selesai</label>
                                        </div>
                                        <input type="time" placeholder="Finish time" class="form-control" name="Jam_selesai" value="<?php echo $Jam_selesai; ?>" required>
                                    </div>
                                </div> 
                                <!-- lapangan -->
                                <div class="d-sm-flex">
                                    <div>
                                        <div class="card-header py-3">
                                            <label for="nolpgn" class="form-label text-primary font-weight-bold">Lapangan</label>
                                        </div>
                                        <div class="lpg">
                                        <select class="form-select" name="no_lpgn" aria-label="Default select example">
                                        <option selected>pilih Lapangan</option>
                                        <?php 
                                            $sql = mysqli_query($conn,"SELECT * FROM lapangan");
                                            while ($row=mysqli_fetch_assoc($sql)){
                                            ?>
                                        <option  value="<?php echo $no_lpgn?>"><?php echo $row['no_lpgn'];?></option>
                                        <?php }?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="card-header py-3">
                                            <label for="tm" class="form-label text-primary font-weight-bold"></label>
                                    </div>
                                </div>
                                <!-- Jaminan -->
                                <div class="d-sm-flex">
                                    <div>
                                        <div class="card-header py-3">
                                            <label for="jmn" class="form-label text-primary font-weight-bold">Jaminan</label>
                                        </div>
                                        <div class="mb-3">
                                        <input type="file" placeholder="jaminan" class="form-control" name="jaminan" value="<?php echo $jaminan; ?>" required>
                                            <label for="formFile" class="form-label">nb. Jaminan berupa data diri seperti KTP/SIM</label>
                                        </div>
                                    </div>
                                    <div class="card-header py-3">
                                            <label for="tm" class="form-label text-primary font-weight-bold"></label>
                                    </div>
                                </div>
                            </div>
                            <button name="submit" class="btn btn-primary">Kirim</button>
                        </form>
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
