<?php
require_once __DIR__ . '/../../functions/penting.php';
session_start();
$allgeo = $file_penting->curl_get_contents('http://ip-api.com/json/?fields=8216');
$decodegeo = json_decode($allgeo, true);
if (isset($_SESSION['nama'])) {
  $nama = $_SESSION['nama'];
  $mysqli_user = mysqli_query($con, "SELECT * FROM user WHERE nama = '$nama'");
  $fetchdata = mysqli_fetch_array($mysqli_user);
}
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title><?php echo $_ENV['NAMA_WEB']  ?> | Category</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/32x32/Logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/16x16/Logo.png">
  <link rel="shortcut icon" type="image/x-icon" href="https://cdnharuman.herokuapp.com/e-lib/E-Lib%20Logo/32x32/Logo.png">

  <meta name="theme-color" content="#ffffff">
  <script src="<?php echo $_ENV['LINK_WEB']  ?>vendor/overlayscrollbars/OverlayScrollbars.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="<?php echo $_ENV['LINK_WEB']  ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo $_ENV['LINK_WEB']  ?>/vendor/prism/prism.css" rel="stylesheet">
  <link href="<?php echo $_ENV['LINK_WEB']  ?>vendor/hamburgers/hamburgers.min.css" rel="stylesheet">
  <link href="<?php echo $_ENV['LINK_WEB']  ?>vendor/loaders.css/loaders.min.css" rel="stylesheet">
  <link href="<?php echo $_ENV['LINK_WEB']  ?>assets/css/theme.min.css" rel="stylesheet" />
  <link href="<?php echo $_ENV['LINK_WEB']  ?>assets/css/user.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
</head>

<body>
  <div class="bg-primary py-3 d-none d-sm-block text-white fw-bold">
    <div class="container">
      <div class="row align-items-center gx-4">
        <div class="col-auto d-none d-lg-block fs--1"><span class="fas fa-map-marker-alt text-warning me-2" data-fa-transform="grow-3"></span><?php echo $decodegeo['regionName'] ?> </div>
        <div class="col-auto ms-md-auto order-md-2 d-none d-sm-flex fs--1 align-items-center"><span class="fas fa-clock text-warning me-2" data-fa-transform="grow-3"></span><?php echo $decodegeo['query'] ?></div>
      </div>
    </div>
  </div>
  <div class="sticky-top navbar-elixir" style="margin-top: 0px;">
    <div class="container">
      <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" href="<?php echo $_ENV['LINK_WEB']  ?>index.php"><img src="<?php echo $_ENV['LINK_WEB']  ?>assets/img/Logo.png" alt="logo" /></a><button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger hamburger--emphatic"><span class="hamburger-box"><span class="hamburger-inner"></span></span></span></button>
        <div class="collapse navbar-collapse" id="primaryNavbarCollapse">
          <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
            <li class="nav-item "><a class="nav-link" href="<?php echo $_ENV['LINK_WEB']  ?>index.php" role="button">Home</a></li>
            <li class="nav-item "><a class="nav-link" href="<?php echo $_ENV['LINK_WEB']  ?>category/book.php" role="button">Category</a></li>
            <?php if (isset($_SESSION['nama'])) { ?>
              <li class="nav-item "><a class="nav-link" href="<?php echo $_ENV['LINK_WEB']  ?>category/mybook.php" role="button">My Book</a></li>
            <?php } else {
            } ?>
            <li class="nav-item "><a class="nav-link" href="<?php echo $_ENV['LINK_WEB']  ?>about.php" role="button">About Us</a></li>
          </ul>

          <?php
          if (isset($_SESSION['nama'])) {
          ?>
            <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-auto">
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $fetchdata['nama'] ?><i class="far fa-user-circle fa-lg mx-2"></i></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?php echo $_ENV['LINK_WEB']  ?>auth/logout.php">Log Out</a>
                </div>
              </li>
            </ul>
          <?php
          } else { ?>
            <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-auto">
              <a class="btn btn-outline-primary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto mx-1 my-3 my-lg-0" href="<?php echo $_ENV['LINK_WEB']  ?>auth/login.php">Sign In</a>
              <a class="btn btn-outline-secondary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto mx-1 my-3 my-lg-0" href="<?php echo $_ENV['LINK_WEB']  ?>auth/register.php">Sign Up</a>
            </ul>
          <?php } ?>
        </div>
      </nav>
    </div>
  </div>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <div class="preloader" id="preloader">
      <div class="img loader">
        <img src="<?php echo $_ENV['LINK_WEB']  ?>assets/img/Logo.png" alt="logo" />
      </div>
      <div class="loader">
        <div class="line-scale">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div>
    <?php
    echo  $file_penting->render_with_swal();
    ?>