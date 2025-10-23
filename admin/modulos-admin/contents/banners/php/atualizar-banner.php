<?php

require_once __DIR__ . '/../../../../../helpers/upload-webp.php';

require '../../../../config/config.php';
use Repositories\BannersRepository;

// Dados enviados pelo formulário
$refBannerDesktop = $_POST['refBannerDesktop'];
$refBannerMobile = $_POST['refBannerMobile'];
$nomeBannerDesktopDeletar = $_POST['nomeBannerDesktop'];
$nomeBannerMobileDeletar = $_POST['nomeBannerMobile'];


// Caminho onde os arquivos serão salvos
$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/banners/";

$nomeBannerDesktop = salvarImagemWebP($_FILES['desktop'], $pastaDestino);
$nomeBannerMobile = salvarImagemWebP($_FILES['mobile'], $pastaDestino);


// Remove banner antigo desktop, se existir
$filePathDesk = $pastaDestino . $nomeBannerDesktopDeletar;
if (!empty($nomeBannerDesktopDeletar) && file_exists($filePathDesk)) {
    unlink($filePathDesk);
}

// Remove banner antigo mobile, se existir
$filePathMob = $pastaDestino . $nomeBannerMobileDeletar;
if (!empty($nomeBannerMobileDeletar) && file_exists($filePathMob)) {
    unlink($filePathMob);
}

// Atualiza no banco de dados
$res = BannersRepository::update($refBannerDesktop, $refBannerMobile, $nomeBannerDesktop, $nomeBannerMobile);

// Redireciona com base no resultado
if ($res) {
    header('Location: ../../../../banners.php?success=true');
} else {
    header('Location: ../../../../banners.php?error=true');
}
