<?php
require_once __DIR__ . '/../../../../config/bootstrap.php';

use Models\Plataformas;

header('Content-Type: application/json');

try {
    $plataforma = Plataformas::find(1);
    
    if (!$plataforma) {
        // Se não existe, cria um registro vazio
        $plataforma = new Plataformas();
        $plataforma->id = 1;
        $plataforma->youtube = '';
        $plataforma->spotify = '';
        $plataforma->save();
    }

    echo json_encode([
        'success' => true,
        'data' => [
            'youtube' => $plataforma->youtube ?? '',
            'spotify' => $plataforma->spotify ?? ''
        ],
        'debug' => [
            'found_record' => $plataforma ? true : false,
            'id' => $plataforma->id ?? null
        ]
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erro ao buscar plataformas: ' . $e->getMessage(),
        'error_details' => $e->getTraceAsString()
    ]);
}
?>