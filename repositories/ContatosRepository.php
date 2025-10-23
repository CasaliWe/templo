<?php
namespace Repositories;

use Core\Logger;
use Models\Contatos;

class ContatosRepository {
    // pegando contatos
    public static function getContatos() {
        return Contatos::where('idcontatos', '1')->first();
    }

    // atualizando contatos
    public static function update($data) {

        try {
            $updated = Contatos::where('idcontatos', '1')->update([
                'instagram' => $data['instagram'],
                '_instagram' => $data['@_instagram'],
                'facebook' => $data['facebook'],
                '_facebook' => $data['@_facebook'],
                'linkedin' => $data['linkedin'],
                '_linkedin' => $data['@_linkedin'],
                'email' => $data['email'],
                'telefone' => $data['telefone'],
                'wpp' => $data['wpp']
            ]);
    
            // Log de sucesso
            if ($updated) {
                Logger::log("Contatos atualizados com sucesso: " . json_encode($data), "INFO");
                return true;
            } else {
                Logger::log("Erro ao atualizar os contatos. Nenhuma alteração feita.", "ERROR");
                return false;
            }
    
        } catch (\Exception $e) {
            // Log de erro
            Logger::log("Erro ao atualizar os contatos: " . $e->getMessage(), "ERROR");
            return false;
        }

    }
}