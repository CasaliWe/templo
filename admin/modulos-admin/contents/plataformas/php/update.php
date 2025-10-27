<?php
require_once __DIR__ . '/../../../../config/bootstrap.php';

use Models\Plataformas;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $youtube = $_POST['youtube'] ?? '';
        $spotify = $_POST['spotify'] ?? '';

        // Busca o registro com ID 1 ou cria se não existir
        $plataforma = Plataformas::find(1);
        
        if (!$plataforma) {
            $plataforma = new Plataformas();
            $plataforma->id = 1;
        }

        $plataforma->youtube = $youtube;
        $plataforma->spotify = $spotify;
        $plataforma->save();

        echo json_encode([
            'success' => true,
            'message' => 'Plataformas atualizadas com sucesso!'
        ]);

    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Erro ao atualizar plataformas: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Método não permitido'
    ]);
}
?>