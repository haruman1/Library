<?php

include_once __DIR__ . '/../template/header/header_book.php';
require_once __DIR__ . '/../functions/penting.php';

?>

<!-- ============================================-->
<!-- <section> begin ============================-->
<section>
  <div class="bg-holder overlay" style="background-image:url(../assets/img/bg3.jpg);background-position:center bottom; margin-top: 57px;"></div>
  <!--/.bg-holder-->
  <div class="container">
    <div class="row pt-6" data-inertia='{"weight":1.5}'>
      <div class="col-md-8 text-white" data-zanim-timeline="{}" data-zanim-trigger="scroll">
        <div class="overflow-hidden">
          <h1 class="text-white fs-4 fs-md-5 mb-0 lh-1" data-zanim-xs='{"delay":0}'>My Book</h1>
          <div class="nav" aria-label="breadcrumb" role="navigation" data-zanim-xs='{"delay":0.1}'>
            <ol class="breadcrumb fs-1 ps-0 fw-bold">
              <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">MyBook</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->
<?php
require_once __DIR__ . '/../template/sidebar/search-halaman.php';
?>
<div class="row g-0 mb-5">
  <?php
  $sql = mysqli_query($con, "SELECT * FROM mybook");
  while ($data = mysqli_fetch_array($sql)) {
  ?>
    <div class="col-lg-2 px-3 py-3 my-lg-2 bg-white position-relative">
      <?php
      $query = mysqli_query($con, "SELECT cover_buku FROM hlmnbuku JOIN mybook ON hlmnbuku.id_buku = mybook.id_buku WHERE mybook.id_buku = '$data[id_buku]' ");
      while ($row = mysqli_fetch_array($query)) {
      ?>

        <img class="card-img mb-2" src="../assets/img/buku/<?= $row['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" />
        <!--/.bg-holder-->
    </div>
    <div class="col-lg-4 px-5 py-6 my-lg-2 ml-2 bg-white d-flex align-items-center">
      <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
        <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
        <a class="btn-outline-info btn" style="width: 200px; margin-bottom:5px;" href="read.php?id_buku=<?= $data['id_buku'] ?>">Baca Sekarang!</a>
        <a class="btn-outline-success btn" style="width: 200px;" href="deletedata_pinjam.php?id_buku=<?= $data['id_buku'] ?>">Kembalikan</a>
      </div>
    </div>
  <?php } ?>
<?php } ?>
</div>
<div class="row g-0">
  <div class="card-header bg-info text-white">
    List Buku
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ID Buku</th>
          <th scope="col">Judul Buku</th>
          <th scope="col">File</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = mysqli_query($con, "SELECT * FROM mybook");
        while ($data = mysqli_fetch_array($sql)) {
          echo "<tr>";
          echo "<th>$data[id]</th>";
          echo "<th>$data[id_buku]</th>";
          echo "<th>$data[judulbuku]</th>";
          echo "<th><a href='read.php?id_buku=" . $data['id_buku'] . "'>$data[file_buku]</a></th>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div><!-- end of .container-->
</section>

<!-- <section> close ============================-->
<!-- ============================================-->

</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<?php
include_once __DIR__ . '/../template/footer/footer_book.php';
echo $file_penting->render_with_swal();

?>