<style>
    #title-a-banda{
        width: 250px;
    }

    #texto-a-banda{
        width: 60%;
    }

    .container-img-registro{
        width: 100%;
        height: 210px;
    }
    .container-img-registro img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
    .container-img-registro a{
        text-decoration: none;
        cursor: pointer;
        display: block;
        width: 100%;
        height: 100%;
    }

    @media(min-width:1500px) {
        .container-img-registro{
            width: 100%;
            height: 260px;
        }
    }
    
    @media(max-width:992px) {
        #texto-a-banda{
            width: 95%;
        }

        .container-img-registro{
            width: 100%;
            height: 160px;
        }
    }
</style>


<section id="banda" class="fundos py-5">
    <h2 class="d-none"> A banda Templô</h2>

    <div class="container mx-auto py-3 px-4 px-lg-0">
        <img <?= $_ENV['ANIMA_SCROLL']; ?> class="mb-3" id="title-a-banda" src='<?= $base_url ?>assets/imagens/site/title-a-banda.png'>
        <p <?= $_ENV['ANIMA_SCROLL']; ?> class="text-white font-kanit mb-4" id="texto-a-banda">A <span class="text-0">Banda Templô</span> surge das entranhas da cultura underground de Passo Fundo/RS, carregando na voz e nos instrumentos a urgência de quem tem algo a dizer. <br><br> Nossa música é uma ponte entre o peso do rock e a poesia do cotidiano, onde a emoção encontra o palco, e o manifesto se transforma em canção. Acreditamos que a arte precisa ocupar espaços públicos, democratizar o acesso à cultura e ser ferramenta de transformação social.</p>
        <div <?= $_ENV['ANIMA_SCROLL']; ?>>
            <span class="text-0 me-2">NOS ACOMPANHE PELO INSTAGRAM:</span>
            <a href="<?= $contatos['instagram']; ?>" target="_blank"><img style="width: 170px;" src='<?= $base_url ?>assets/imagens/site/btn-instagram.png'></a>
        </div>

        <h2 <?= $_ENV['ANIMA_SCROLL']; ?> class="text-white mb-3 mt-5 display-5">REGISTROS</h2>

        <div <?= $_ENV['ANIMA_SCROLL']; ?> class="row mb-5 pb-4">
            <?php foreach ($imagensRecentes as $key => $img) { ?>
                <div class="mb-2 col-6 col-lg-3 px-2">
                    <div class="container-img-registro">
                        <a href='<?= $base_url ?>admin/assets/imagens/arquivos/galeria/<?= $img->imagem ?>' data-fancybox="galeria-registros" data-caption="Registro da Banda Templô">
                            <img src='<?= $base_url ?>admin/assets/imagens/arquivos/galeria/<?= $img->imagem ?>'>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div <?= $_ENV['ANIMA_SCROLL']; ?> class="text-center mt-5">
            <a href="<?= $base_url; ?>galeria.php" class="py-3 px-5 bg-0 text-white">GALERIA DE IMAGENS</a>
        </div>
    </div>
</section>


<script>

</script>