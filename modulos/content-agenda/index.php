<style>
    .container-item-agenda{
        width: 60% !important;
        margin-left: auto !important;
        margin-right: auto !important;
    }

    @media(max-width: 992px) {
        .container-item-agenda{
            width: 95% !important;
        }
    }
</style>


<section class="fundos py-5">
    <div class="container mx-auto py-3">

        <h1 class="text-white display-6 mb-5 text-center">PRÓXIMOS SHOWS</h1>

        <!-- item -->
        <?php foreach ($agendas as $key => $agenda) { ?>
            <div class="mb-5 w-100 p-3 px-lg-5 bg-0 container-item-agenda">
                <h2 class="text-white mb-1"><?= $agenda['titulo']; ?></h2>
                <p class="text-white font-inter mb-1"><img src='<?= $base_url ?>assets/imagens/site/ico-agenda.png' style="width: 15px;" class="me-1"> <?= date('d/m/Y', strtotime($agenda['data'])) ?></p>
                <p class="text-white font-inter mb-3"><img src='<?= $base_url ?>assets/imagens/site/ico-horas.png' style="width: 15px;" class="me-1"> <?= $agenda['hora']; ?></p>
    
                <div style="background-color: #ffffff3a; border-left: 2px solid white;" class="p-3 d-flex align-items-start">
                    <img src='<?= $base_url ?>assets/imagens/site/ico-loca.png' style="width: 15px;" class="me-1">
                    <span class="ms-2">
                        <h6 class="mb-0 text-white"><?= $agenda['local_1']; ?></h6>
                        <p class="mt-0 mb-0 text-white font-inter"><?= $agenda['local_2']; ?></p>
                    </span>
                </div>
    
                <div class="mt-4">
                    <h5 class="text-white mb-2">PROGRAMAÇÃO:</h5>

                    <ul class="list-unstyled">
                        <?php
                        $programacao = explode(';', $agenda['programacao']);
                        foreach ($programacao as $item) {
                            echo '<li class="font-inter text-white mb-2 small">- ' . trim($item) . '</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
        <!-- item -->

    </div>
</section>