<?php
require '../../../../config/config.php';
require '../../../../helpers/verifica-auth.php';

use Repositories\BannerInicialRepository;
use Models\BannerInicial;

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    
    $id = (int)$_GET['id'];
    
    // Buscar o banner antes de deletar para remover os arquivos
    $banner = BannerInicial::find($id);
    
    if ($banner) {
        $pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/banners/";
        
        // Remover arquivos do servidor
        $desktopFile = $pastaDestino . $banner->banner_desktop;
        $mobileFile = $pastaDestino . $banner->banner_mobile;
        
        if (file_exists($desktopFile)) {
            unlink($desktopFile);
        }
        
        if (file_exists($mobileFile)) {
            unlink($mobileFile);
        }
        
        // Deletar do banco de dados
        $result = BannerInicialRepository::delete($id);
        
        if ($result) {
            echo "<script>
                alert('Banner inicial deletado com sucesso!');
                window.location.href = '../../../../banners.php';
            </script>";
        } else {
            echo "<script>
                alert('Erro ao deletar o banner inicial!');
                window.location.href = '../../../../banners.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Banner inicial não encontrado!');
            window.location.href = '../../../../banners.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Parâmetros inválidos!');
        window.location.href = '../../../../banners.php';
    </script>";
}
?>