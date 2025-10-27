<style>
    .container-news{
        width: 70% !important;
    }
    @media(min-width:1500px) {
        .container-news{
            width: 60% !important;
        }
    }
    
    @media(max-width:992px) {
        .container-news{
            width: 95% !important;
        }
    }
</style>

<?php
    // Ajustar URLs das imagens no conteúdo
    $conteudoAjustado = $noticia->conteudo;
    $conteudoAjustado = str_replace('src="/', 'src="' . $base_url . 'admin/', $conteudoAjustado);
?>

<section class="fundos py-5" style="border-bottom: 2px solid #DB0000;">
    <div class="container-news mx-auto py-3 px-4 px-lg-0">
        <p class="small font-inter text-white mb-5">Publicado em: <?= date('d/m/Y', strtotime($noticia['created_at'])) ?></p>

        <div>
            <div class="mt-4 font-inter text-white" style="font-size: 18px; line-height: 1.8;">
                <?= nl2br($conteudoAjustado) ?>
            </div>
        </div>

        <div class="mt-5 text-center"><button onclick="copiarLink()" style="border: none;" class="bg-0 text-white py-3 px-5"><img src='<?= $base_url ?>assets/imagens/site/copy.png' style="width: 20px;" class="me-2"> Copiar link</button></div>
    </div>
</section>


<script>
    function copiarLink(){
        const link = window.location.href;

        navigator.clipboard.writeText(link).then(function() {
            alert('Link copiado para a área de transferência!');
        }, function(err) {
            alert('Erro ao copiar o link: ', err);
        });
    }
</script>