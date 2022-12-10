<?php
include_once __DIR__ . '/../template/header/header_book.php';
require_once __DIR__ . '/../functions/penting.php';
?>

<!-- ============================================-->
<!-- <section> begin ============================-->
<?php
require_once __DIR__ . '/../template/sidebar/nama-halaman.php';
require_once __DIR__ . '/../template/sidebar/search-halaman.php';
?>
<div id="NB" class="text-center mb-6">
  <h3 class="fs-2 fs-md-3">New Book Released</h3>
  <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
</div>
<div class="row g-4">
  <?php
  $sql = mysqli_query($con, "SELECT * FROM hlmnbuku");
  while ($data = mysqli_fetch_array($sql)) {
  ?>
    <div class="col-md-5 col-lg-3">
      <div class="card">
      <a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">
          <img class="card-img-top" src="../assets/img/buku/<?= $data['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" />
        </a>
        <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
          <div class="overflow-hidden"><a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">
              <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
            </a></div>
          <div class="overflow-hidden">
            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By <?= $data['author'] ?></p>
          </div>
          <div class="overflow-hidden">
            <?php
            $str = $data['textbuku'];
            if (strlen($str) > 10)
              $str = substr($str, 0, 100) . '...';
            ?>
            <p class="mt-3" data-zanim-xs='{"delay":0.2}'><?= $str ?></p>
          </div>
          <div class="overflow-hidden">
            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">Book Now!<div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div></a></div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>

<div id="F" class="text-center mb-6">
  <h3 class="fs-2 fs-md-3">Fiction</h3>
  <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
</div>
<div class="row g-4">
  <?php
  $sql = mysqli_query($con, "SELECT * FROM hlmnbuku WHERE kategoribuku LIKE '%Fiction%'");
  while ($data = mysqli_fetch_array($sql)) {
  ?>
    <div class="col-md-5 col-lg-3">
    <div class="card"><a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>"><img class="card-img-top" src="../assets/img/buku/<?= $data['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" /></a>
        <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
          <div class="overflow-hidden"><a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">
              <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
            </a></div>
          <div class="overflow-hidden">
            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By <?= $data['author'] ?></p>
          </div>
          <div class="overflow-hidden">
            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">Book Now!<div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div></a></div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>

<div id="H" class="text-center mb-6">
  <h3 class="fs-2 fs-md-3">History</h3>
  <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
</div>
<div class="row g-4">
  <?php
  $sql = mysqli_query($con, "SELECT * FROM hlmnbuku WHERE kategoribuku = 'Historical'");
  while ($data = mysqli_fetch_array($sql)) {
  ?>
    <div class="col-md-5 col-lg-3">
    <div class="card"><a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>"><img class="card-img-top" src="../assets/img/buku/<?= $data['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" /></a>
        <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
          <div class="overflow-hidden"><a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">
              <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
            </a></div>
          <div class="overflow-hidden">
            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By <?= $data['author'] ?></p>
          </div>
          <div class="overflow-hidden">
            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">Book Now!<div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div></a></div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>

<div id="SI" class="text-center mb-6">
  <h3 class="fs-2 fs-md-3">Self Improvement</h3>
  <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
</div>
<div class="row g-4">
  <?php
  $sql = mysqli_query($con, "SELECT * FROM hlmnbuku WHERE kategoribuku = 'Self Improvement'");
  while ($data = mysqli_fetch_array($sql)) {
  ?>
    <div class="col-md-5 col-lg-3">
    <div class="card"><a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>"><img class="card-img-top" src="../assets/img/buku/<?= $data['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" /></a>
        <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
          <div class="overflow-hidden"><a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">
              <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
            </a></div>
          <div class="overflow-hidden">
            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By <?= $data['author'] ?></p>
          </div>
          <div class="overflow-hidden">
            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">Book Now!<div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div></a></div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>
</div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<?php
include_once __DIR__ . '/../template/footer/footer_book.php';
?>
<script>
  $(document).ready(function() {
    $("h1.nama-atasnya-web").html("Category");

  })
</script>