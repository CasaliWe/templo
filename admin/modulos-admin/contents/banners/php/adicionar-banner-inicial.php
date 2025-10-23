<?php
require_once __DIR__ . '/../../../../../helpers/upload-webp.php';

require '../../../../config/config.php';
require '../../../../helpers/verifica-auth.php';

use Repositories\BannerInicialRepository;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Caminho onde os arquivos serão salvos
    $pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/banners/";
    
    // Verificar se o diretório existe, se não, criar
    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0777, true);
    }
    
    // Upload e conversão para WebP
    $bannerDesktop = salvarImagemWebP($_FILES['desktop'], $pastaDestino, 'banner_inicial_desktop_');
    $bannerMobile = salvarImagemWebP($_FILES['mobile'], $pastaDestino, 'banner_inicial_mobile_');
    
    // Verificar se ambos os uploads foram bem-sucedidos
    if ($bannerDesktop && $bannerMobile) {
        // Salvar no banco de dados (apenas os nomes dos arquivos)
        $result = BannerInicialRepository::create($bannerDesktop, $bannerMobile);
        
        if ($result) {
            echo "<script>
                alert('Banner inicial adicionado com sucesso!');
                window.location.href = '../../../../banners.php';
            </script>";
        } else {
            // Se falhou no banco, remover os arquivos
            if (file_exists($pastaDestino . $bannerDesktop)) {
                unlink($pastaDestino . $bannerDesktop);
            }
            if (file_exists($pastaDestino . $bannerMobile)) {
                unlink($pastaDestino . $bannerMobile);
            }
            
            echo "<script>
                alert('Erro ao salvar no banco de dados!');
                window.location.href = '../../../../banners.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Erro no upload dos arquivos! Verifique se ambos os arquivos foram selecionados.');
            window.location.href = '../../../../banners.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Método não permitido!');
        window.location.href = '../../../../banners.php';
    </script>";
}
?>