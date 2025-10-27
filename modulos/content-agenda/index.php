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

<?php 
    $realizado = [];
    $nao_realizado = [];
    foreach ($agendas as $key => $ag) { 
        if ($ag['realizado']) {
            $realizado[] = $ag;
        } else {
            $nao_realizado[] = $ag;
        }
    } 
?>


<section class="<?= count($nao_realizado) < 1 ? 'd-none' : '' ?> fundos py-5">
    <h2 class="d-none">Agenda</h2>

    <div class="container mx-auto py-3">

        <h1 <?= $_ENV['ANIMA_SCROLL']; ?> class="text-white display-6 mb-5 text-center">PRÓXIMOS SHOWS</h1>

        <!-- item -->
        <?php foreach ($agendas as $key => $agenda) { ?>
            <?php if($agenda['realizado']) continue; ?>
            <div <?= $_ENV['ANIMA_SCROLL']; ?> class="mb-5 w-100 p-3 px-lg-5 bg-0 container-item-agenda">
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
                        // Separar por ; se existir, senão por \n (compatibilidade com dados antigos)
                        $programacao = strpos($agenda['programacao'], ';') !== false ? 
                            explode(";", $agenda['programacao']) : 
                            explode("\n", $agenda['programacao']);
                        foreach ($programacao as $item) {
                            if(trim($item)) {
                                echo '<li class="font-inter text-white mb-2 small">- ' . trim($item) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
        <!-- item -->

    </div>
</section>




<section style="background-color: #4A4A4A;" class="py-5 <?= count($realizado) < 1 ? 'd-none' : '' ?>">
    <div class="container mx-auto">
        <h1 class="text-center text-white mb-5 display-6">SHOWS REALIZADOS</h1>

        <?php foreach ($agendas as $key => $agenda) { ?>
            <?php if(!$agenda['realizado']) continue; ?>
            <div <?= $_ENV['ANIMA_SCROLL']; ?> style="background-color: #f2f2f21c;" class="mb-5 w-100 p-3 px-lg-5 container-item-agenda">
                <h2 class="text-white mb-2"><?= $agenda['titulo']; ?></h2>
                
                <div style="background-color: #ffffff3a; border-left: 2px solid white;" class="p-3 d-flex align-items-start">
                    <img src='<?= $base_url ?>assets/imagens/site/ico-loca.png' style="width: 15px;" class="me-1">
                    <span class="ms-2">
                        <h6 class="mb-0 text-white"><?= $agenda['local_1']; ?></h6>
                        <p class="mt-0 mb-0 text-white font-inter"><?= $agenda['local_2']; ?></p>
                    </span>
                </div>

                <p class="mt-2 text-white font-inter mb-1"><img src='<?= $base_url ?>assets/imagens/site/ico-agenda.png' style="width: 15px;" class="me-1"> <?= date('d/m/Y', strtotime($agenda['data'])) ?></p>
            </div>
        <?php } ?>
    </div>
</section>