<?php
include_once __DIR__ . '/template/header/header_book.php';
require_once __DIR__ . '/functions/penting.php';


?>
<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0" data-zanim-timeline="{}" data-zanim-trigger="scroll">
    <div class="bg-holder" style="background-image:url(<?php echo $_ENV['LINK_WEB']  ?>assets/img/bg1.jpg); back"></div>
    <!--/.bg-holder-->
    <div class="container">
        <div class="row min-vh-100 py-8 align-items-center" data-inertia='{"weight":1.5}'>
            <div class="col-sm-4 col-lg-5">
                <div class="overflow-hidden">
                    <h1 class="fs-4 fs-md-5" data-zanim-xs='{"delay":0.5}'><?php echo $_ENV['NAMA_WEB']  ?></h1>
                </div>
                <div class="overflow-hidden">
                    <p class="text-primary mt-4 mb-5 " data-zanim-xs='{"delay":0.6}'>"Kadang-kadang, kamu membaca buku dan itu memenuhi kamu dengan semangat evangelis yang aneh ini, dan kamu menjadi yakin bahwa dunia yang hancur tidak akan pernah disatukan kembali kecuali dan sampai semua manusia yang hidup membaca buku itu." - John Green, The Fault in Our Stars</p>
                </div>
                <div class="overflow-hidden">
                    <form class="row" action="<?php echo $_ENV['LINK_WEB']  ?>/category/search.php" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="submit-search" class="form-control" placeholder="Cari Buku" aria-label="Cari Buku" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="bg-100 text-center">
    <div class="container">
        <div class="text-center mb-6">
            <h3 class="fs-2 fs-md-3">Trending</h3>
            <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
        </div>
        <div class="row">
            <?php
            $sql = mysqli_query($con, "SELECT * FROM trendingbook");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="card h-100"><a href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>"><img class="card-img-top" src="assets/img/buku/<?= $data['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" />
                            <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="fw-normal text-500" data-zanim-xs='{"delay":0.1}'><?= $data['author'] ?></h6>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= $_ENV['LINK_WEB'] ?>category/borrow.php?id_buku=<?= $data['id_buku'] ?>">Read Now!<div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div></a></div>
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
include_once __DIR__ . '/template/footer/footer.php';
?>