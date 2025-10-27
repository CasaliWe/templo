<?php
   require 'config/config.php';

   //verifica auth;
   include_once './helpers/verifica-auth.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- HEADER -->
    <?php include_once 'modulos-admin/header/index.php'; ?>
    <!-- HEADER -->
    
    <title><?= \Core\RoutesAdmin::getPageTitle(); ?></title>
</head>
<body>

    <!-- LOADING -->
    <?php include_once 'modulos-admin/loading/index.php'; ?>
    <!-- LOADING -->

    <!-- NAVEGAÇÃO -->
    <?php include_once 'modulos-admin/navegacao/index.php'; ?>
    <!-- NAVEGAÇÃO -->

    <!-- CONTENT -->
    <main id="content-pagina">
        <h5 id="titulo-content-pagina" class="fw-semibold"><?= \Core\RoutesAdmin::getPageTitle(); ?></h5>

        <!-- módulo content página -->
        <?php include_once 'modulos-admin/contents/blog/index.php';?>
        <!-- módulo content página -->
    </main>
    <!-- CONTENT -->

    <!-- MODAL AVISOS -->
     <?php include_once "modulos-admin/modal-aviso/index.php"; ?>
    <!-- MODAL AVISOS -->
    
    <!-- MODAIS DE BLOG -->
    <?php include_once 'modulos-admin/contents/blog/modais/adicionar-noticia.php'; ?>
    <!-- MODAIS DE BLOG -->
    
    <!-- SWIPER JS -->
    <script src="<?= $base_url ?>assets/utils/swiper/swiper.js"></script>

    <!--BOOTSTRAP JS-->
    <script src="<?= $base_url ?>assets/utils/bootstrap/bootstrap.js"></script>
    
    <!-- SUMMERNOTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-pt-BR.min.js"></script>
    
    <!-- BLOG INIT JS -->
    <script src="<?= $base_url ?>assets/js-global/blog-init.js"></script>
</body>
</html>