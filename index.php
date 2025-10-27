<?php
    include_once __DIR__ . '/config/config.php';

    // buscar contatos
    use Repositories\ContatosRepository;
    $contatos = ContatosRepository::getContatos();

    // buscar banners iniciais
    use Repositories\BannerInicialRepository;
    $bannersIniciais = BannerInicialRepository::getAll();

    // PEGANDO 4 IMAGENS
    use Repositories\GaleriaRepository;
    $imagensRecentes = GaleriaRepository::getRecentes();
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

    <!-- BANNER INICIAL -->
    <?php include_once  __DIR__ .'/modulos/banner-inicial/index.php'; ?>
    <!-- BANNER INICIAL -->

    <!-- BANNER ROCK NA RUA -->
    <?php include_once  __DIR__ .'/modulos/banner-rock-na-rua/index.php'; ?>
    <!-- BANNER ROCK NA RUA -->

    <!-- TEMPLO NA MIDIA -->
    <?php include_once  __DIR__ .'/modulos/templo-na-midia/index.php'; ?>
    <!-- TEMPLO NA MIDIA -->

    <!-- OUÇA -->
    <?php include_once  __DIR__ .'/modulos/ouca/index.php'; ?>
    <!-- OUÇA -->

    <!-- A BANDA -->
    <?php include_once  __DIR__ .'/modulos/a-banda/index.php'; ?>
    <!-- A BANDA -->

    <!-- ONDE VAMOS TOCAR -->
    <?php include_once  __DIR__ .'/modulos/onde-vamos-tocar/index.php'; ?>
    <!-- ONDE VAMOS TOCAR -->

    <!-- NOSSA EQUIPE -->
    <?php include_once  __DIR__ .'/modulos/nossa-equipe/index.php'; ?>
    <!-- NOSSA EQUIPE -->

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