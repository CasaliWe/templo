<style>
    .container-img-galeria-pag{
        width: 100%;
        height: 230px;
        overflow: hidden;
    }
    @media(max-width:992px){
        .container-img-galeria-pag{
            height: 180px;
        }
    }
    .container-img-galeria-pag img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
    .container-img-galeria-pag a{
        text-decoration: none;
        cursor: pointer;
        display: block;
        width: 100%;
        height: 100%;
    }
</style>

<section style="background-color: #121212; border-bottom: 2px solid #DB0000;" class="py-5">
    <h2 class="d-none">Galeria de imagens</h2>

    <div class="py-3 container mx-auto px-4 px-lg-0">

        <?php foreach ($eventos as $key => $evento) { ?>
            <!-- item -->
            <div class="mb-5">
                <h2 <?= $_ENV['ANIMA_SCROLL']; ?> class="display-5 text-white mb-3"><?= $evento['nome_evento']; ?></h2>
    
                <div class="row mb-4">
                    <?php foreach ($evento['imagemEvento'] as $key => $img) { ?>
                        <div <?= $_ENV['ANIMA_SCROLL']; ?> class="mb-2 col-6 col-lg-3 px-1">
                            <div class="container-img-galeria-pag">
                                <a href='<?= $base_url ?>admin/assets/imagens/arquivos/galeria/<?= $img['imagem'] ?>' data-fancybox="galeria-rock-na-rua-2" data-caption="Rock na Rua #2">
                                    <img src='<?= $base_url ?>admin/assets/imagens/arquivos/galeria/<?= $img['imagem'] ?>'>
                                </a>
                            </div>
                        </div>            
                    <?php } ?>
    
                </div>

                <a href="<?= $evento['link'] ?>" target="_blank">
                    <img style="width: 200px;" src='<?= $base_url ?>assets/imagens/site/click.png'>
                </a>
            </div>
            <!-- item -->
        <?php } ?>

    </div>
</section>