<?php
// Definir o fuso horário para Brasil/São Paulo (UTC-3)
date_default_timezone_set('America/Sao_Paulo');

require_once __DIR__ . '/../../../../../helpers/upload-webp.php';
require '../../../../config/config.php';

// Verificar se o arquivo foi enviado
if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['error' => 'Arquivo não enviado ou com erro']);
    exit;
}

// Verificar se os diretórios existem, caso contrário, criá-los
$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/blog/summernote/";
if (!is_dir($pastaDestino)) {
    mkdir($pastaDestino, 0777, true);
}

// Salvar a imagem
$nomeArquivo = salvarImagemWebP($_FILES['file'], $pastaDestino, 'summernote-');

if ($nomeArquivo) {
    // Retornar o URL da imagem
    $url = $base_url . 'assets/imagens/arquivos/blog/summernote/' . $nomeArquivo;
    
    // Para debug, incluir ambos URLs
    $response = [
        'url' => $url,
        'relativePath' => '/assets/imagens/arquivos/blog/summernote/' . $nomeArquivo
    ];
    
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Erro ao salvar a imagem']);
}
exit;