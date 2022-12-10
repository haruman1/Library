<?php
include_once __DIR__ . '/../template/header/header_book.php';
require_once __DIR__ . '/../functions/penting.php';
?>
<!-- ============================================-->
<!-- <section> begin ============================-->
<?php
require_once __DIR__ . '/../template/sidebar/nama-halaman.php';

?>
<!-- <section> close ============================-->
<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="bg-100">
    <div class="container">
        <div class="row g-0 mb-5">
            <?php
            $sql = "SELECT * FROM hlmnbuku ORDER BY judulbuku ASC";
            $result = mysqli_query($con, $sql);
            $queryResults = mysqli_num_rows($result);
            if ($queryResults > 0) {
                while ($data = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-lg-2 px-3 py-3 my-lg-2 bg-white d-flex position-relative">
                        <a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">
                            <img class="card-img mt-6 " src="../assets/img/buku/<?= $data['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" />
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
                            <a class="btn-outline-info btn" href="persediaan.php?id_buku=<?= $data['id_buku'] ?>&judulbuku=<?= $data['judulbuku'] ?>">Cek Stok</a>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
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
        $("h1.nama-atasnya-web text-white fs-4 fs-md-5 mb-0 lh-1").html("Check Buku");
        $("li.nama_item_web breadcrumb-item active").html("Check Buku");
        $("title").html(" <?php echo $_ENV['NAMA_WEB'] ?> | Cek Buku");
        $("meta[name='description']").attr("content", "Check Buku");

    })
</script>