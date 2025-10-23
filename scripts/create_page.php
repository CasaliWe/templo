<?php

if ($argc < 2) {
    die("Uso: php scripts/create_page.php nome-da-pagina\n");
}

$nomePagina = $argv[1]; 

$caminhoArquivo = __DIR__ . "/../$nomePagina.php";
$configFile = __DIR__ . "/../config/pagina-atual.php";

// Criar a página PHP
$conteudoPagina = "<?php
    include_once __DIR__ . '/config/config.php';

    // *** buscar dados
    // use Repositories\\ExemploRepository;
    // \$Exemplo = ExemploRepository::getAll();
?>

<!DOCTYPE html>
<html lang=\"pt-br\">
<head>

    <?php include_once  __DIR__ .'/modulos/header/index.php'; ?>

</head>
<body>

    <!-- MODULO EXEMPLO -->
    <?php include_once  __DIR__ .'/modulos/exemplo/index.php'; ?>
    <!-- MODULO EXEMPLO -->





    
    

    <!-- SCROLL ANIMATION -->
    <script src=\"<?= \$base_url; ?>assets/utils/anima-scroll/aos.js\"></script>
    <script>AOS.init()</script>

    <!-- BOOTSTRAP -->
    <script src=\"<?= \$base_url; ?>assets/utils/bootstrap/bootstrap.js\"></script>

    <!-- LOADING JS -->
    <script src=\"<?= \$base_url; ?>assets/js/loading.js\"></script>

    <!-- FANCYBOX JS -->
    <script src=\"<?= \$base_url; ?>assets/utils/fancybox/fancybox-1.js\"></script>
    <script src=\"<?= \$base_url; ?>assets/utils/fancybox/fancybox-2.js\"></script>

    <!-- JS GLOBAL -->
    <script src=\"<?= \$base_url; ?>assets/js/app.js\"></script>
</body>
</html>";


// Criar a página
file_put_contents($caminhoArquivo, $conteudoPagina);
echo "✅ Página '$nomePagina.php' criada com sucesso!\n";



echo "✅ Por fim, atualize o arquivo core/RoutesSite.php com a nova rota na variável routes!\n";


