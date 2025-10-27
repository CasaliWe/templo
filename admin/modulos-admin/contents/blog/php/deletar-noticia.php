<?php
// Definir o fuso horário para Brasil/São Paulo (UTC-3)
date_default_timezone_set('America/Sao_Paulo');

require '../../../../config/config.php';
use Models\Blog;

// Verificar se o ID foi enviado
if (!isset($_GET['id'])) {
    die("ID da notícia não foi enviado");
}

$id = $_GET['id'];
$blog = Blog::find($id);

if (!$blog) {
    die("Notícia não encontrada");
}

// Caminho das imagens
$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/blog/";

// Apagar imagem se existir
if ($blog->capa && file_exists($pastaDestino . $blog->capa)) {
    unlink($pastaDestino . $blog->capa);
}

// Deletar a notícia
$blog->delete();

// Redirecionar de volta para a página de blog
header("Location: " . $base_url . "blog.php?success=noticia_deletada");
exit;