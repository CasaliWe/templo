<style>
    #title-templo-midia{
        width: 380px;
    }

    .container-projeto-img-preview{
        height:320px;
        width: 100%;
    }
    .container-projeto-img-preview img{
        height:100%;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }

    .sub-elipsis{
        position: relative;
        line-height: 1.2;
        max-height: calc(1.2em * 3);
        min-height: calc(1.2em * 3);
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        text-overflow: ellipsis;
    }

    @media(min-width:1500px) {
        #title-templo-midia{
            width: 410px;
        }

        .container-projeto-img-preview{
            height:360px;
            width: 100%;
        }
    }
    
    @media(max-width:992px) {
        #title-templo-midia{
            width: 250px;
        }

        .container-projeto-img-preview{
            height:280px;
            width: 100%;
        }
    }
</style>


<section class="fundos py-5">
    <div class="py-5 container mx-auto">
        <div class="text-center mb-5">
            <img id="title-templo-midia" src='<?= $base_url ?>assets/imagens/site/title-templo-midia.png'>
        </div>

        <div class="row mb-3">
            <div class="mb-5 col-12 col-lg-4 px-3">
                <div class="container-projeto-img-preview">
                    <img src='<?= $base_url ?>assets/imagens/site/exemplo-1.png'>
                </div>

                <div class="mt-2 mb-3 d-flex align-items-center">
                    <img src='<?= $base_url ?>assets/imagens/site/ico-data.png' style="width: 15px;">
                    <span class="ms-2 font-inter text-white">06/10/2025</span>
                </div>

                <h4 class="text-white mb-2">MINHA VIDA EM CARTAZ, NOSSO NOVO ÁLBUM.</h4>
                <p class="sub-elipsis text-white font-inter small">Produzido de forma 100% independente, o EP é mais do que uma coleção de canções.</p>
                <a href="<?= $base_url; ?>news.php?id=1" class="font-inter-2 text-0">LER MAIS <img style="width: 15px;" src='<?= $base_url ?>assets/imagens/site/seta.png'></a>
            </div>

            <div class="mb-5 col-12 col-lg-4 px-3">
                <div class="container-projeto-img-preview">
                    <img src='<?= $base_url ?>assets/imagens/site/exemplo-2.png'>
                </div>

                <div class="mt-2 mb-3 d-flex align-items-center">
                    <img src='<?= $base_url ?>assets/imagens/site/ico-data.png' style="width: 15px;">
                    <span class="ms-2 font-inter text-white">06/10/2025</span>
                </div>

                <h4 class="text-white mb-2">MINHA VIDA EM CARTAZ, NOSSO NOVO ÁLBUM.</h4>
                <p class="sub-elipsis text-white font-inter small">Produzido de forma 100% independente, o EP é mais do que uma coleção de canções.</p>
                <a href="<?= $base_url; ?>news.php?id=2" class="font-inter-2 text-0">LER MAIS <img style="width: 15px;" src='<?= $base_url ?>assets/imagens/site/seta.png'></a>
            </div>

            <div class="mb-5 col-12 col-lg-4 px-3">
                <div class="container-projeto-img-preview">
                    <img src='<?= $base_url ?>assets/imagens/site/exemplo-3.png'>
                </div>

                <div class="mt-2 mb-3 d-flex align-items-center">
                    <img src='<?= $base_url ?>assets/imagens/site/ico-data.png' style="width: 15px;">
                    <span class="ms-2 font-inter text-white">06/10/2025</span>
                </div>

                <h4 class="text-white mb-2">MINHA VIDA EM CARTAZ, NOSSO NOVO ÁLBUM.</h4>
                <p class="sub-elipsis text-white font-inter small">Produzido de forma 100% independente, o EP é mais do que uma coleção de canções.</p>
                <a href="<?= $base_url; ?>news.php?id=3" class="font-inter-2 text-0">LER MAIS <img style="width: 15px;" src='<?= $base_url ?>assets/imagens/site/seta.png'></a>
            </div>
        </div>

        <div class="text-center"><a href="<?= $base_url; ?>projetos-shows.php" class="bg-0 text-white py-3 px-5">VER TODOS</a></div>
    </div>
</section>


<script>

</script>