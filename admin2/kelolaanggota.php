<?php
// require_once 'inc/koneksi.php';
// require_once 'functions/penting.php';
require_once __DIR__ . '/../inc/env.php';
require_once __DIR__ . '/../functions/penting.php';
session_start();
if ($_SESSION['role'] == 1) {
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_ENV['NAMA_WEB']  ?> | Admin Kelola Anggota</title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/32x32/Logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/16x16/Logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/32x32/Logo.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<?php
    
    $sql_user = 'SELECT nama, username,password, email, id_user, role, is_active  FROM user';
    $query_user = mysqli_query($con, $sql_user);

    $sql_book = 'SELECT judulbuku, kategoribuku, author FROM hlmnbuku';
    $query_book = mysqli_query($con, $sql_book);
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                <i class="sidebar-brand-logo"><img src="../assets/img/logo/128x128/E-Lib Logo White.png" alt="logo" /></i>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="kelolaanggota.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Anggota</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kelolabuku.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Kelola Buku</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="transaksi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Transaksi Buku</span></a>
            </li>
            
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
                        <h1 class="h3 mb-0 text-gray-800">Menu Admin</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h2 class="m-0 font-weight-bold text-primary">Kelola Anggota</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
							                <th>Username</th>
							                <th>Email</th>
							                <th>Id</th>
							                <th>Role</th>
							                <th>Is Active</th>
							                <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
							                <th>Username</th>
							                <th>Email</th>
							                <th>Id</th>
							                <th>Role</th>
							                <th>Is Active</th>
							                <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                        while ($row = mysqli_fetch_array($query_user))
                                        {
                                            echo '<tr>';
                                            echo "<td>" . $row['nama'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            // echo "<td>" . $row['password'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['id_user'] . "</td>";
                                            echo "<td>" . $row['role'] . "</td>";
                                            echo "<td>" . $row['is_active'] . "</td>";
                                            echo "<td><button class='btn btn-primary btn-icon-split editButton' href='#' value='".$row['id_user']."'><span class='text'><i class='fa fa-book'></i></span></button>
                                                      <button class='btn btn-danger btn-icon-split deleteButton' href='#' value='".$row['id_user']."'><span class='text'><i class='fa fa-trash'></></span></button></td>";
                                            echo '</tr>';
                                        }
                                    ?>
                                    
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
            <?php
            require_once __DIR__ . '/template/footer.php';
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
                    <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah jika ingin mengakhiri sesi </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../auth/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    

       <!-- Edit Modal-->
       <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="user" id="editForm" method="POST" action="/E-lib/Library/admin2/user/update-data.php">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="iduser"
                                            placeholder="ID User" name="id_user" value="" readonly required>
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name"
                                            placeholder="Nama" name="nama" value="" required>
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username"
                                            placeholder="Username" name="username" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        placeholder="Email Address" name="email" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        placeholder="Password" name="password" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="role"
                                        placeholder="Role" name="role" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="isactive"
                                        placeholder="Is Active" name="is_active" value="" required>
                                </div>
                                <button type="submit" id="editSubmit" class="btn btn-primary btn-user btn-block" name="submit" value="submit">
                                    Submit
                                    </button>
                            </form>
                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
        </div>

        <!-- Delete Modal-->
       <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                Anda yakin akan menghapus anggota ini?
                </div>
                <div class="modal-footer">
                    <a class='btn btn-danger btn-icon-split' id="hapusAnggota" href='#'><span class='text'>Hapus</span></a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function(){
	    $(document).on('click', '.editButton', function(){
		var id=$(this).val();
 
		$('#editModal').modal('show');
		$('#iduser').val(id);
	});
    });
    </script>
    <script>
        $(document).ready(function(){
	    $(document).on('click', '.deleteButton', function(){
        var id=$(this).val();
        var hapus = "/E-lib/Library/admin2/user/delete-user.php?id_user=";
 
		$('#deleteModal').modal('show');
		$('a#hapusAnggota').attr("href", hapus + id);
	});
    });
    </script>


</body>

</html>
<?php
} else {
    $file_penting->redirect('');
}
?>