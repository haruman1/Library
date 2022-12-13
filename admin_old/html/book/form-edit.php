<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6" style="width: 0px;">
                    <a class="navbar-brand" href="index.php" >
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <p style="font-family: 'Segoe UI', Tahoma, Verdana, sans-serif; font-size:26px">E-lib</p>
                        </b>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="mdi mdi-menu"></i></a>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../kelolaanggota.php" aria-expanded="false"><i
                                    class="mdi mdi-account-network"></i><span class="hide-menu">Kelola Anggota</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="../kelolabuku.php" aria-expanded="false"><i
                                    class="mdi mdi-book"></i><span class="hide-menu">Kelola Buku</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="table-basic.html" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">Table</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="icon-material.html" aria-expanded="false"><i class="mdi mdi-face"></i><span
                                    class="hide-menu">Icon</span></a></li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="index.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Edit Buku</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Edit Buku</h1> 
                    </div>
                </div>
            </div>
            

<?php
            // require_once '../../../inc/koneksi.php';
            // require_once '../../../functions/penting.php';
require_once __DIR__ . '/../../../inc/env.php';
require_once __DIR__ . '/../../../inc/koneksi.php';
require_once __DIR__ . '/../../../vendor/autoload.php';
?>

<?php
$id_buku = $_GET["id_buku"];//mengambil data ygdikirim
$query = mysqli_query($con,"Select * from hlmnbuku where id_buku = '$id_buku'");

while ($row = mysqli_fetch_array($query)) {
$id_buku = $row["id_buku"];
$judulbuku = $row["judulbuku"];
$kategoribuku = $row["kategoribuku"];
$author = $row["author"];
$stok = $row["stok"];
$cover_buku;
$file_buku;
}
?>


            <div class="container-fluid">
                <div class="container">
            <form class="mt-5" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="id_buku">Id Barang</label>
                    <input type="text" class="form-control" id="id_buku" name="id_buku" placeholder="judulbuku" value="<?=$id_buku?>" disabled>
                </div>
                <div class="form-group">
                    <label for="kode_barang">Judul Buku</label>
                    <input type="text" class="form-control" id="judulbuku" name="judulbuku" placeholder="judulbuku" value="<?=$judulbuku?>">
                </div>
                <div class="form-group">
                    <label for="nama">kategori</label>
                    <input type="text" class="form-control" id="kategoribuku" name="kategoribuku" placeholder="kategoribuku" value="<?=$kategoribuku?>">
                </div>
                <div class="form-group">
                    <label for="stok">Author</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="author"value="<?=$author?>">
                </div>
                <div class="form-group">
                    <label for="harga">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" placeholder="stok"value="<?=$stok?>">
                </div>
                <div class="form-group">
							<label for="cover_buku">Upload Cover</label>
							<input type="file" name="cover_buku" id="cover_buku" value="<?=$cover_buku?>">
							<p class="help-block">
								<font color="red">Format file .jpg"</p>
				</div>
                <div class="form-group">
							<label for="file_buku">Upload Buku</label>
							<input type="file" name="file_buku" id="file_buku" value="<?=$file_buku?>">
							<p class="help-block">
								<font color="red">Format file .Pdf"</p>
				</div>
                <button type="submit" class="btn btn-primary" name="Ubah" value="Ubah">Submit</button>
            </form>   
    </div>
    
<?php
    $sumber = @$_FILES['file_buku']['tmp_name'];
    $target = '../../../assets/pdf/';
    $nama_file = @$_FILES['file_buku']['name'];
    $pindah = move_uploaded_file($sumber, $target.$nama_file);
    
    $sumber2 = @$_FILES['cover_buku']['tmp_name'];
    $target2 = '../../../assets/img/buku/';
    $nama_file2 = @$_FILES['cover_buku']['name'];
    $pindah2 = move_uploaded_file($sumber2, $target2.$nama_file2);

    if (isset ($_POST['Ubah'])){
    
        if(!empty($sumber) && !empty($sumber2)){// pdf & cover
            $pdf= $data_cek['file_buku'];
                if (file_exists("../../../assets/pdf/$pdf")){
                unlink("../../../assets/pdf/$pdf");}
            $jpg= $data_cek['cover_buku'];
                if (file_exists("../../../assets/img/buku/$jpg")){
                    unlink("../../../assets/img/buku/$jpg");}
    
            $sql_ubah = "UPDATE hlmnbuku SET
                judulbuku='".$_POST['judulbuku']."',
                kategoribuku='".$_POST['kategoribuku']."',
                author='".$_POST['author']."',
                stok='".$_POST['stok']."',
                file_buku='".$nama_file."',
                cover_buku='".$nama_file2."'
                WHERE id_buku='".$_GET['id_buku']."'";
               $query_ubah = mysqli_query($con, $sql_ubah);
    
        }elseif (!empty($sumber) && empty($sumber2)) { // just pdf
            $pdf= $data_cek['file_buku'];
                if (file_exists("../../../assets/pdf/$pdf")){
                unlink("../../../assets/pdf/$pdf");}

                $sql_ubah = "UPDATE hlmnbuku SET
                judulbuku='".$_POST['judulbuku']."',
                kategoribuku='".$_POST['kategoribuku']."',
                author='".$_POST['author']."',
                stok='".$_POST['stok']."',
                file_buku='".$nama_file."'
                WHERE id_buku='".$_GET['id_buku']."'";
               $query_ubah = mysqli_query($con, $sql_ubah);
        
        }elseif (empty($sumber) && !empty($sumber2)) { // just cover
            $jpg= $data_cek['cover_buku'];
            if (file_exists("../../../assets/img/buku/$jpg")){
                unlink("../../../assets/img/buku/$jpg");}

                $sql_ubah = "UPDATE hlmnbuku SET
                judulbuku='".$_POST['judulbuku']."',
                kategoribuku='".$_POST['kategoribuku']."',
                author='".$_POST['author']."',
                stok='".$_POST['stok']."',
                cover_buku='".$nama_file2."'
                WHERE id_buku='".$_GET['id_buku']."'";
               $query_ubah = mysqli_query($con, $sql_ubah);
        }
        elseif(empty($sumber) && empty($sumber2)){
            $sql_ubah = "UPDATE hlmnbuku SET
                judulbuku='".$_POST['judulbuku']."',
                kategoribuku='".$_POST['kategoribuku']."',
                author='".$_POST['author']."',
                stok='".$_POST['stok']."'
                WHERE id_buku='".$_GET['id_buku']."'";
           $query_ubah = mysqli_query($con, $sql_ubah);
            }
    
        if ($query_ubah) {
            // header('Location: ../kelolabuku.php?status=sukses'); exit;
            echo "<script> window.location.href = '../kelolabuku.php';</script>";
            }else{
            echo "gagal";
        }
    }
?>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
            E-Lib
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.js"></script>
</body>

</html>