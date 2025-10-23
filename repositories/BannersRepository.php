<?php
namespace Repositories;

use Core\Logger;
use Models\Banners;

class BannersRepository {
    // pegando todos os banners
    public static function getAll() {
        return Banners::all();
    }

    // pegando os banners
    public static function getBanners() {
        return Banners::where('idbanners', '1')->first();
    }

    // atualizando banner
    public static function update($refDesk, $refMob, $nomeDesk, $nomeMob) {
        try {
            $update = Banners::where('idbanners', '1')->update([
                $refDesk => $nomeDesk,
                $refMob => $nomeMob
            ]);

            if($update) {
                Logger::log("Banner atualizado!", "INFO");
                return true; 
            } else {
                Logger::log("Erro ao atualizar o banner. Nenhuma alteração feita.", "ERROR");
                return false; 
            }
        } catch (\Exception $e) {
            Logger::log("Erro ao atualizar o banner: " . $e->getMessage(), "ERROR");
            return false; 
        }
    }
}