<style>
    #container-nossa-equipe{
        background-image: url('<?= $base_url ?>assets/imagens/site/banner-nossa-equipe-desktop.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    #title-nossa-equipe{
        width: 290px;
    }

    .nome-integrante{
        font-size: 25px !important;
    }
    .instrumento{
        font-size: 18px !important;
    }
    
    @media(max-width:992px) {
        .nome-integrante{
            font-size: 35px !important;
        }
        .instrumento{
            font-size: 22px !important;
        }
    }
</style>

<section class="py-5" id="container-nossa-equipe">
    <h2 class="d-none">Nossa Equipe</h2>

    <div class="container mx-auto py-3">
        <div <?= $_ENV['ANIMA_SCROLL']; ?> class="text-center mb-5">
            <img id="title-nossa-equipe" src='<?= $base_url ?>assets/imagens/site/title-nossa-equipe.png'>
        </div>

        <div class="row px-3 px-lg-0">
            <div <?= $_ENV['ANIMA_SCROLL']; ?> class="mb-5 col-12 text-center col-lg-3 px-2">
                <img class="w-100" src='<?= $base_url ?>assets/imagens/site/integrante-1.png'>
                <h3 class="nome-integrante mt-3 mb-0 text-white">LUCCA</h3>
                <p class="instrumento font-inter-2 mt-0 text-0">Vocalista</p>
            </div>

            <div <?= $_ENV['ANIMA_SCROLL']; ?> class="mb-5 col-12 text-center col-lg-3 px-2">
                <img class="w-100" src='<?= $base_url ?>assets/imagens/site/integrante-2.png'>
                <h3 class="nome-integrante mt-3 mb-0 text-white">JEAN</h3>
                <p class="instrumento font-inter-2 mt-0 text-0">Baixista</p>
            </div>

            <div <?= $_ENV['ANIMA_SCROLL']; ?> class="mb-5 col-12 text-center col-lg-3 px-2">
                <img class="w-100" src='<?= $base_url ?>assets/imagens/site/integrante-3.png'>
                <h3 class="nome-integrante mt-3 mb-0 text-white">JASSO</h3>
                <p class="instrumento font-inter-2 mt-0 text-0">Baterista</p>
            </div>

            <div <?= $_ENV['ANIMA_SCROLL']; ?> class="col-12 text-center col-lg-3 px-2">
                <img class="w-100" src='<?= $base_url ?>assets/imagens/site/integrante-4.png'>
                <h3 class="nome-integrante mt-3 mb-0 text-white">ANDREY</h3>
                <p class="instrumento font-inter-2 mt-0 text-0">Guitarrista</p>
            </div>
        </div>

        <p <?= $_ENV['ANIMA_SCROLL']; ?> class="text-center mb-4 mt-5 text-white font-inter-2 px-3 px-lg-0">Conheça mais sobre nosso trabalho nas plataformas digitais</p>

        <div <?= $_ENV['ANIMA_SCROLL']; ?> class="d-flex justify-content-center align-items-center flex-column flex-lg-row">
            <a href="<?= $plataforma['youtube']; ?>" target="_blank" class="mb-3 mx-2"><img style="height: 40px;" src='<?= $base_url ?>assets/imagens/site/youtube-music.png'></a>
            <a href="<?= $plataforma['spotify']; ?>" target="_blank" class="mb-3 mx-2"><img style="height: 40px;" src='<?= $base_url ?>assets/imagens/site/spotify-music.png'></a>
        </div>
    </div>
</section>