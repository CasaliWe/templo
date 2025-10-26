<style>
    #banner-geral{
        background-image: url('<?= $base_url; ?>assets/imagens/site/banner.png');
        background-size: cover;
        background-position: center;
        height: 40vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .sub-title-banner{
        width: 30% !important;
    }

    @media(min-width:1500px) {
        #banner-geral{
            height: 30vh;
        }
    }
    
    @media(max-width:992px) {
        #banner-geral{
            height: 35vh;
        }
        .sub-title-banner{
            width: 90% !important;
        }
    }
</style>

<section id="banner-geral">
    <h1 class="display-3 px-4 px-lg-0 mb-0 text-center text-white">Galeria</h1>
    <p class="sub-title-banner w-25 mx-auto px-4 px-lg-0 mt-0 small font-inter text-center text-white">Registros que contam a história da Templô em imagem: momentos dos shows, bastidores e projetos que marcaram a banda.</p>
</section>