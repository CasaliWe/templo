<?php

namespace Core;

class RoutesSite {
    private static $routes = [
        '/index'   => 'Início',
        '/projetos-shows'   => 'Projetos e Shows',
        '/agenda'   => 'Agenda',
        '/galeria'   => 'Galeria',
        '/news'   => 'Notícia',
        '/' => 'Início'
    ];

    public static function getPageTitle() {
        $urlAtual = $_SERVER['REQUEST_URI'];
        foreach (self::$routes as $slug => $titulo) {
            if (strpos($urlAtual, $slug) !== false) {
                return $_ENV['NOME_SITE'] . ' | ' . $titulo;
            }
        }
        return $_ENV['NOME_SITE'] . ' | Página Desconhecida';
    }

    public static function isActive($pagina) {        
        return strpos($_SERVER['REQUEST_URI'], $pagina) !== false ? 'active-link' : 'text-white';
    }
}
