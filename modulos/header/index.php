    <!-- METATAGS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?= $base_url; ?>assets/imagens/site/thumb.png">
    <meta property="og:image:width" content="310">
    <meta property="og:image:height" content="310">
    <meta property="og:url" content="<?= $base_url; ?>">
    <meta property="og:title" content="<?= $titulo_site; ?>">
    <meta name="description" content="<?= $descricao_site; ?>">
    <meta property="og:description" content="<?= $descricao_site; ?>">

    <!-- FAVICON -->
    <link rel="icon" href="<?= $base_url; ?>assets/imagens/site/favicon.png" type="image/x-icon">

    <!-- FONTAWSOME -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- SCROLL ANIMATION -->
    <link href="<?= $base_url; ?>assets/utils/anima-scroll/aos.css" rel="stylesheet">
    
    <!-- BASE URL JS -->
    <script>
        const base_url = '<?= $base_url; ?>';
    </script>

    <!-- SWIPER -->
    <link rel="stylesheet" href="<?= $base_url; ?>assets/utils/swiper/swiper.css">

    <!-- TOASTR JS -->
    <script src="<?= $base_url; ?>assets/utils/toastr/toastr.js"></script>

    <!-- TOASTR CSS -->
    <link rel="stylesheet" href="<?= $base_url; ?>assets/utils/toastr/toastr.css">

    <!-- ALERT CSS -->
    <link rel="stylesheet" href="<?= $base_url; ?>assets/utils/alert/alert.css">

    <!-- FANCYBOX CSS -->
    <link rel="stylesheet" href="<?= $base_url; ?>assets/utils/fancybox/fancybox.css">
    
    <!-- BOOTSTRAP -->
    <link href="<?= $base_url; ?>assets/utils/bootstrap/bootstrap.css" rel="stylesheet">

    <!-- GLOBAL CSS -->
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/style.css">


    <title><?= \Core\RoutesSite::getPageTitle(); ?></title>