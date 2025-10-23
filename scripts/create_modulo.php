<?php

if ($argc < 2) {
    die("Uso: php scripts/create_modulo.php nome-do-modulo\n");
}

$nomeModulo = $argv[1];
$caminhoModulo = __DIR__ . "/../modulos/$nomeModulo";

// Criar a pasta do módulo e subpastas
$pastas = ["php", "modais", "js", "css"];
foreach ($pastas as $pasta) {
    mkdir("$caminhoModulo/$pasta", 0777, true);
}

// Criar arquivos vazios dentro de php e modais
file_put_contents("$caminhoModulo/php/readme.md", "");
file_put_contents("$caminhoModulo/modais/readme.md", "");

// Criar arquivo style.css dentro de css
file_put_contents("$caminhoModulo/css/style.css", "/* Estilos para o módulo $nomeModulo */");

// Criar arquivo app.js dentro de js
file_put_contents("$caminhoModulo/js/app.js", "// JavaScript para o módulo $nomeModulo");

// Criar index.php com o conteúdo correto
$conteudoIndex = "<link rel=\"stylesheet\" href=\"<?= \$base_url; ?>modulos/$nomeModulo/css/style.css\">

<section class=\"py-5\">
    <div class=\"container mx-auto py-5\">

    </div>
</section>

<script src=\"<?= \$base_url; ?>modulos/$nomeModulo/js/app.js\"></script>";

file_put_contents("$caminhoModulo/index.php", $conteudoIndex);

echo "Módulo '$nomeModulo' criado em: $caminhoModulo\n";
