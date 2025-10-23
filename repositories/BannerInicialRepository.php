<?php
namespace Repositories;

use Core\Logger;
use Models\BannerInicial;

class BannerInicialRepository {
    // pegando todos os banners iniciais
    public static function getAll() {
        return BannerInicial::all();
    }

    // criando novo banner inicial
    public static function create($bannerDesktop, $bannerMobile) {
        try {
            $banner = BannerInicial::create([
                'banner_desktop' => $bannerDesktop,
                'banner_mobile' => $bannerMobile
            ]);

            if($banner) {
                Logger::log("Banner inicial criado com sucesso!", "INFO");
                return true; 
            } else {
                Logger::log("Erro ao criar o banner inicial.", "ERROR");
                return false; 
            }
        } catch (\Exception $e) {
            Logger::log("Erro ao criar o banner inicial: " . $e->getMessage(), "ERROR");
            return false; 
        }
    }

    // deletando banner inicial
    public static function delete($id) {
        try {
            $banner = BannerInicial::find($id);
            
            if($banner) {
                $banner->delete();
                Logger::log("Banner inicial deletado com sucesso!", "INFO");
                return true; 
            } else {
                Logger::log("Banner inicial não encontrado.", "ERROR");
                return false; 
            }
        } catch (\Exception $e) {
            Logger::log("Erro ao deletar o banner inicial: " . $e->getMessage(), "ERROR");
            return false; 
        }
    }
}