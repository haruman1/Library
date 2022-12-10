<?php
include_once __DIR__ . '/../template/header/header_book.php';
require_once __DIR__ . '/../functions/penting.php';

if (isset($_GET['submit-search'])) {
  $search = mysqli_real_escape_string($con, $_GET['submit-search']);
}

?>
<!-- ============================================-->
<!-- <section> begin ============================-->
<?php
require_once __DIR__ . '/../template/sidebar/nama-halaman.php';
require_once __DIR__ . '/../template/sidebar/search-halaman.php';

?>
<!-- <section> close ============================-->
<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->

<div class="row g-0 mb-5">
  <?php
  if (isset($_GET['submit-search'])) {
    $search = mysqli_real_escape_string($con, $_GET['submit-search']);
    $sql = "SELECT * FROM hlmnbuku WHERE judulbuku LIKE '%$search%' OR textbuku LIKE '%$search%' OR kategoribuku LIKE '%$search%' OR author LIKE '%$search%' ORDER BY judulbuku ASC";
    $result = mysqli_query($con, $sql);
    $QueryResults = mysqli_num_rows($result);
    if ($QueryResults > 0) {
      while ($data = mysqli_fetch_assoc($result)) {
  ?>
        <div class="col-lg-2 px-3 py-3 my-lg-2 bg-white position-relative">
          <a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">
            <img class="card-img mb-2" src="../assets/img/buku/<?= $data['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" />
          </a>
        </div>
        <div class="col-lg-4 px-5 py-6 my-lg-2 ml-2 bg-white d-flex align-items-center">
          <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">
              <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
            </a>
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
            <a class="btn-outline-info btn" href="read.php?id_buku=<?= $data['id_buku'] ?>">Baca Sekarang!</a>
          </div>
        </div>
      <?php } ?>
    <?php } else {
    ?>
      <div class="col-lg-12 px-5 py-6 my-lg-2 ml-2 bg-white d-flex align-items-center">
        <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
          <h5 data-zanim-xs='{"delay":0}'><?php echo $_GET['submit-search'] ?> Tidak ditemukan hasil pencarian</h5>
        </div>
      </div>
  <?php }
  } else {
    $file_penting->add_with_swal('warning', 'Silahkan isi kolom pencarian terlebih dahulu!', 'error', '');
  } ?>
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
    $("nama_item_web").html("Search");
    $("nama-atasnya-web").html("Search");
  })
</script>