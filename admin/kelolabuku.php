<?php
// require_once 'inc/koneksi.php';
// require_once 'functions/penting.php';
require_once __DIR__ . '/../inc/env.php';
require_once __DIR__ . '/../functions/penting.php';
session_start();
if (isset($_SESSION['nama'])) {
    $nama = $_SESSION['nama'];
    $mysqli_user = mysqli_query($con, "SELECT * FROM user WHERE nama = '$nama'");
    $fetchdata = mysqli_fetch_array($mysqli_user);
    }
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

    <title><?php echo $_ENV['NAMA_WEB']  ?> | Admin Kelola Buku</title>

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

    <!-- Uploadcare API -->
    <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>

    <style>
    .uploadcare--widget__button.uploadcare--widget__button_type_open {
    background-color: #f1f1f1;
    color: #000000;
    border-radius: 50px;
    margin-top: 10px; 
    margin-bottom: 20px; 
    margin-left: 5px;
    }
    </style>
    <style>
    #help-block {
        color: red;
    }
    #labelupload, #help-block {
        margin-left: 10px;
    }
    </style>
    <script>
    UPLOADCARE_LOCALE_TRANSLATIONS = {
    buttons: {
    choose: {
    files: {
    one: 'Choose File'
    }
    }
    }
    }
    </script>
    

</head>

<?php
    $sql_user = 'SELECT nama, username, email, id_user FROM user';
    $query_user = mysqli_query($con, $sql_user);

    $sql_book = 'SELECT id_buku, judulbuku, kategoribuku, author, file_buku,stok, total_pinjam FROM hlmnbuku';
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
            <li class="nav-item">
                <a class="nav-link" href="kelolaanggota.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Anggota</span></a>
            </li>
            <li class="nav-item active">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $fetchdata['nama'] ?></span>
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


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h2 class="m-0 font-weight-bold text-primary">Kelola Buku</h2>
                            <a href="#" class="btn btn-primary btn-icon-split addBook" style="margin-top: 10px; margin-bottom: 10px;">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus-square"></i>
                                        </span>
                                        <span class="text">Tambah Buku</span>
                        </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Buku</th>
							                <th>Judul Buku</th>
							                <th>Kategori</th>
							                <th>Author</th>
							                <th>File Buku</th>
							                <th>Stok</th>
							                <th>Jumlah Peminjaman</th>
							                <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Buku</th>
							                <th>Judul Buku</th>
							                <th>Kategori</th>
							                <th>Author</th>
							                <th>File Buku</th>
							                <th>Stok</th>
							                <th>Jumlah Peminjaman</th>
							                <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                        while ($row = mysqli_fetch_array($query_book))
                                        {
                                            echo '<tr>';
                                            echo "<td>" . $row['id_buku'] . "</td>";
                                            echo "<td>" . $row['judulbuku'] . "</td>";
                                            echo "<td>" . $row['kategoribuku'] . "</td>";
                                            echo "<td>" . $row['author'] . "</td>";   
                                            echo "<td>" . $row['file_buku'] . "</td>";    
                                            echo "<td>" . $row['stok'] . "</td>";
                                            echo "<td>" . $row['total_pinjam'] . "</td>";   
                                            echo "<td><button class='btn btn-primary btn-icon-split editButton' style='margin:10px;' href='#' value='".$row['id_buku']."'><span class='text'><i class='fa fa-book'></i></span></button>
                                                      <button class='btn btn-danger btn-icon-split deleteButton' style='margin:10px;' href='#' value='".$row['id_buku']."'><span class='text'><i class='fa fa-trash'></i></span></button></td>";
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

    <!-- Add Book Modal-->
    <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="user" method="POST" action="<?php echo $_ENV['LINK_WEB']  ?>/admin/book/save-book.php">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="idbuku"
                                            placeholder="ID Buku" name="id_buku" required>
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="judulbuku" id="add_judulbuku"
                                            placeholder="Judul Buku" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="add_kategori"
                                        placeholder="Kategori" name="kategoribuku" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="add_author"
                                        placeholder="Author" name="author" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="add_stok"
                                        placeholder="Stok" name="stok" required>
                                </div>
                                <div class="file-drop-area">
                                <label for="cover_buku" id="labelupload">Cover Buku</label>
                                <input
                                type="hidden"
                                role="uploadcare-uploader"
                                data-public-key="10955e4554b0247de269"
                                data-tabs="file url gdrive"
                                name="cover_buku"
                                id="cover_buku"
                                />
                                <p id="help-block">
								Format file .jpg</p>
                                </div>
                                <div class="file-drop-area">
                                <label for="file_buku" id="labelupload">File Buku</label>
                                <input
                                type="hidden"
                                role="uploadcare-uploader"
                                data-public-key="10955e4554b0247de269"
                                data-tabs="file url gdrive"
                                name="file_buku"
                                id="file_buku"
                                />
                                <p id="help-block">
								Format file .Pdf</p>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" name="Simpan" value="Simpan">
                                </input>
                            </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
                <form class="user" method="POST" action="<?php echo $_ENV['LINK_WEB']  ?>/admin/book/save-book.php">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="edit_idbuku"
                                            placeholder="ID Buku" name="id_buku" value="" readonly required>
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="judulbuku" id="edit_judulbuku"
                                            placeholder="Judul Buku" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="edit_kategori"
                                        placeholder="Kategori" name="kategoribuku" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="edit_author"
                                        placeholder="Author" name="author" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="edit_stok"
                                        placeholder="Stok" name="stok" required>
                                </div>
                                <div class="file-drop-area">
                                <label for="cover_buku" id="labelupload">Cover Buku</label>
                                <input
                                type="hidden"
                                role="uploadcare-uploader"
                                data-public-key="10955e4554b0247de269"
                                data-tabs="file url gdrive"
                                name="cover_buku"
                                id="cover_buku"
                                />
                                <p id="help-block">
								Format file .jpg</p>
                                </div>
                                <div class="file-drop-area">
                                <label for="file_buku" id="labelupload">File Buku</label>
                                <input
                                type="hidden"
                                role="uploadcare-uploader"
                                data-public-key="10955e4554b0247de269"
                                data-tabs="file url gdrive"
                                name="file_buku"
                                id="file_buku"
                                />
                                <p id="help-block">
								Format file .Pdf</p>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" name="Ubah" value="Ubah">
                                </input>
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
                Anda yakin akan menghapus buku ini?
                </div>
                <div class="modal-footer">
                    <a class='btn btn-danger btn-icon-split' id="hapusBuku" href='#'><span class='text'>Hapus</span></a>
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

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($_GET['status']) && $_GET['status'] != '')
    {
    ?>
    <script>
        Swal.fire({
        title: 'Update Berhasil!',
        icon: 'success',
        confirmButtonText: 'Ok'
        })
    </script>
    <?php
    }
        ?>
    <?php if(isset($_GET['delete']) && $_GET['delete'] != '')
    {
    ?>
    <script>
        Swal.fire({
        title: 'Data Berhasil Dihapus!',
        icon: 'success',
        confirmButtonText: 'Ok'
        })
    </script>
    <?php
    }
        ?>                                    
    
    <script>
        $(document).ready(function(){
	    $(document).on('click', '.addBook', function(){
		$('#addBookModal').modal('show');
		
	});
    });
    </script>
    <script>
        $(document).ready(function(){
	    $(document).on('click', '.editButton', function(){
		var id=$(this).val();
 
		$('#editModal').modal('show');
		$('#edit_idbuku').val(id);
	});
    });
    </script>
    <script>
        $(document).ready(function(){
	    $(document).on('click', '.deleteButton', function(){
        var id=$(this).val();
        var hapus = "<?php echo $_ENV['LINK_WEB']  ?>/admin/book/delete-book.php?id_buku=";
 
		$('#deleteModal').modal('show');
		$('a#hapusBuku').attr("href", hapus + id);
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