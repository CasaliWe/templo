<?php
    include_once __DIR__ . '/config/config.php';

    // buscar contatos
    use Repositories\ContatosRepository;
    $contatos = ContatosRepository::getContatos();

    // buscar banners iniciais
    use Repositories\BannerInicialRepository;
    $bannersIniciais = BannerInicialRepository::getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <?php include_once  __DIR__ .'/modulos/header/index.php'; ?>

</head>
<body>
    <!-- WPP FLOAT -->
    <?php include_once  __DIR__ .'/modulos/wpp-float/index.php'; ?>
    <!-- WPP FLOAT -->

    <!-- MENU -->
    <?php include_once  __DIR__ .'/modulos/menu/index.php'; ?>
    <!-- MENU -->

    <!-- BANNER AGENDA -->
    <?php include_once  __DIR__ .'/modulos/banner-agenda/index.php'; ?>
    <!-- BANNER AGENDA -->

    <!-- CONTENT AGENDA -->
    <?php include_once  __DIR__ .'/modulos/content-agenda/index.php'; ?>
    <!-- CONTENT AGENDA -->

    <!-- CONTATO -->
    <?php include_once  __DIR__ .'/modulos/contato/index.php'; ?>
    <!-- CONTATO -->

    <!-- FOOTER -->
    <?php include_once  __DIR__ .'/modulos/footer/index.php'; ?>
    <!-- FOOTER -->



    
    

    <!-- SCROLL ANIMATION -->
    <script src="<?= $base_url; ?>assets/utils/anima-scroll/aos.js"></script>
    <script>AOS.init()</script>

    <!-- BOOTSTRAP -->
    <script src="<?= $base_url; ?>assets/utils/bootstrap/bootstrap.js"></script>

    <!-- LOADING JS -->
    <script src="<?= $base_url; ?>assets/js/loading.js"></script>

    <!-- FANCYBOX JS -->
    <script src="<?= $base_url; ?>assets/utils/fancybox/fancybox-1.js"></script>
    <script src="<?= $base_url; ?>assets/utils/fancybox/fancybox-2.js"></script>

    <!-- SWIPER JS -->
    <script src="<?= $base_url; ?>assets/utils/swiper/swiper.js"></script>

    <!-- JS GLOBAL -->
    <script src="<?= $base_url; ?>assets/js/app.js"></script>
</body>
</html>