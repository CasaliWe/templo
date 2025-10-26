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

<section class="fundos py-5" style="border-bottom: 2px solid #DB0000;">
    <div class="container-news mx-auto py-3 px-4 px-lg-0">
        <p class="small font-inter text-white mb-5">Publicado em: 01/10/2025</p>

        <div>
            <h1 class="text-white mb-4">2# ROCK NA RUA ACONTECE NO BOQUEIRÃO.</h1>
            <p class="mb-4 text-white">O segundo Rock na Rua levou energia, música e cultura para o Parque Linear da Av. Brasil, no Canteiro 10, no Boqueirão.</p>
            <img src='<?= $base_url ?>assets/imagens/site/exemplo-1.png' class="w-100">

            <p class="mb-4 mt-4 text-white">A programação contou com batalha de rimas com premiação, Best Trick Skate e muita interação com o público — reafirmando o propósito do projeto de ocupar os espaços urbanos com música e expressão local.</p>
            <p class="mb-4 mt-4 text-white">A programação contou com batalha de rimas com premiação, Best Trick Skate e muita interação com o público — reafirmando o propósito do projeto de ocupar os espaços urbanos com música e expressão local.</p>
            <img src='<?= $base_url ?>assets/imagens/site/exemplo-1.png' class="w-100">
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