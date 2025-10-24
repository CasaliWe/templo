<style>
    .title-fale-conosco{
        width: 400px;
    }

    @media(min-width:1500px) {
      
    }
    
    @media(max-width:992px) {
        .title-fale-conosco{
            width: 90%;
        }
    }
</style>


<section class="py-5" style="background-color: #1A1A1A;">
    <div class="px-4 px-lg-0 container mx-auto">
        <div class="mb-5">
            <img class="title-fale-conosco d-none d-lg-block" src='<?= $base_url ?>assets/imagens/site/title-fale-conosco.png'>
            <img class="title-fale-conosco d-block d-lg-none" src='<?= $base_url ?>assets/imagens/site/title-fale-conosco-mobile.png'>
        </div>

        <div class="row">
            <div id="contato" class="col-12 col-lg-6 order-2 order-lg-1">
                <form action="<?= $base_url; ?>modulos/contato/php/enviar.php" method="post">
                    <div class="mb-3">
                        <label for="nome" class="font-inter-2 small text-white form-label"><img style="width: 20px;" class="me-2" src='<?= $base_url ?>assets/imagens/site/input-user.png'> SEU NOME</label>
                        <input type="text" class="text-white w-100 border py-2 px-3" style="background-color: transparent;" id="nome" name="nome" placeholder="Digite seu nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="font-inter-2 small text-white form-label"><img style="width: 20px;" class="me-2" src='<?= $base_url ?>assets/imagens/site/input-mail.png'> SEU EMAIL</label>
                        <input type="email" class="text-white w-100 border py-2 px-3" style="background-color: transparent;" id="email" name="email" placeholder="Seu E-mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensagem" class="font-inter-2 small text-white form-label"><img style="width: 20px;" class="me-2" src='<?= $base_url ?>assets/imagens/site/input-chat.png'> SUA MENSAGEM</label>
                        <textarea class="text-white w-100 border py-2 px-3" style="background-color: transparent;" id="mensagem" name="mensagem" rows="3" placeholder="Digite sua mensagem" required></textarea>
                    </div>
                    <button type="submit" style="border: none;" class="w-100 text-center text-white bg-0 py-3 px-5"><span>Enviar E-mail</span> <img style="width: 20px;" class="ms-2" src='<?= $base_url ?>assets/imagens/site/input-submit.png'></button>
                </form>
            </div>

            <div class="mb-5 mb-lg-0 ps-1 ps-lg-5 col-12 col-lg-4 order-1 order-lg-2">
                <div class="mb-5">
                    <h2 class="display-6 text-0 mb-2">CONTATO</h2>
                    <a href="https://wa.me/<?= preg_replace("/[^0-9]/", "", $contatos['wpp']); ?>" target="_blank">
                        <p class="text-white font-inter-2 small"><?= $contatos['wpp']; ?></p>
                    </a>
                </div>

                <div class="mb-5">
                    <h2 class="display-6 text-0 mb-2">REDES SOCIAIS</h2>
                    <a href="<?= $contatos['instagram']; ?>" target="_blank">
                        <p class="text-white font-inter-2 small"><?= $contatos['_instagram']; ?></p>
                    </a>
                </div>

                <div class="mb-5">
                    <h2 class="display-6 text-0 mb-2">E-MAIL</h2>
                    <p class="text-white font-inter-2 small"><?= $contatos['email']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    // pegando o get envio, se for == success ou error, exibe o alert
    const urlParams = new URLSearchParams(window.location.search);
    const envio = urlParams.get('envio');
    if (envio === 'success') {
        alert('E-mail enviado com sucesso!');
        // limpa o get da url
        window.history.replaceState({}, document.title, window.location.pathname);
    } else if (envio === 'error') {
        alert('Erro ao enviar e-mail.');
        // limpa o get da url
        window.history.replaceState({}, document.title, window.location.pathname);
    }
</script>