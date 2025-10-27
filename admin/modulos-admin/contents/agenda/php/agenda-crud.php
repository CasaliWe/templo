<?php
// Desabilitar exibição de erros no output
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Limpar qualquer output anterior
if (ob_get_level()) {
    ob_clean();
}

require_once __DIR__ . '/../../../../config/config.php';

use Models\Agenda;

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';
        
        switch ($action) {
            case 'create':
                $data = [
                    'titulo' => $_POST['titulo'] ?? '',
                    'data' => $_POST['data'] ?? '',
                    'hora' => $_POST['hora'] ?? '',
                    'local_1' => $_POST['local_1'] ?? '',
                    'local_2' => $_POST['local_2'] ?? '',
                    'programacao' => $_POST['programacao'] ?? ''
                ];
                
                $agenda = Agenda::create($data);
                echo json_encode(['success' => true, 'message' => 'Agenda criada com sucesso!']);
                break;
                
            case 'update':
                $id = $_POST['id'] ?? 0;
                $data = [
                    'titulo' => $_POST['titulo'] ?? '',
                    'data' => $_POST['data'] ?? '',
                    'hora' => $_POST['hora'] ?? '',
                    'local_1' => $_POST['local_1'] ?? '',
                    'local_2' => $_POST['local_2'] ?? '',
                    'programacao' => $_POST['programacao'] ?? ''
                ];
                
                $agenda = Agenda::findOrFail($id);
                $agenda->update($data);
                echo json_encode(['success' => true, 'message' => 'Agenda atualizada com sucesso!']);
                break;
                
            case 'delete':
                $id = $_POST['id'] ?? 0;
                
                $agenda = Agenda::findOrFail($id);
                $agenda->delete();
                echo json_encode(['success' => true, 'message' => 'Agenda deletada com sucesso!']);
                break;
                
            case 'get':
                $id = $_POST['id'] ?? 0;
                
                $agenda = Agenda::findOrFail($id);
                echo json_encode(['success' => true, 'data' => $agenda]);
                break;
            
            case 'toggle_realizado':
                $id = $_POST['id'] ?? 0;
                // valor: '1' ou '0'
                $valor = isset($_POST['valor']) ? (int) $_POST['valor'] : null;
                if ($id == 0 || $valor === null) {
                    echo json_encode(['success' => false, 'message' => 'Parâmetros inválidos']);
                    break;
                }
                
                $agenda = Agenda::findOrFail($id);
                $agenda->realizado = $valor ? 1 : 0;
                $agenda->save();
                echo json_encode([
                    'success' => true,
                    'message' => $agenda->realizado ? 'Agenda marcada como realizada.' : 'Agenda desmarcada como realizada.',
                    'realizado' => (bool)$agenda->realizado,
                    'id' => $agenda->id
                ]);
                break;
                
            default:
                echo json_encode(['success' => false, 'message' => 'Ação inválida']);
                break;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Método não permitido']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro: ' . $e->getMessage()]);
}
?>