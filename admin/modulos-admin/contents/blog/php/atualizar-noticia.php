<?php
// Definir o fuso horário para Brasil/São Paulo (UTC-3)
date_default_timezone_set('America/Sao_Paulo');

require_once __DIR__ . '/../../../../../helpers/upload-webp.php';
require '../../../../config/config.php';
use Models\Blog;

// Verificar se o ID foi enviado
if (!isset($_POST['id'])) {
    die("ID da notícia não foi enviado");
}

$id = $_POST['id'];
$blog = Blog::find($id);

if (!$blog) {
    die("Notícia não encontrada");
}

// Dados enviados pelo formulário
$blog->tag = $_POST['tag'];
$blog->titulo = $_POST['titulo'];

// Limitar a mini descrição a 15 palavras
$mini_descricao = $_POST['mini_descricao'];
$palavras = explode(' ', trim($mini_descricao));
if (count($palavras) > 15) {
    $mini_descricao = implode(' ', array_slice($palavras, 0, 15));
}
$blog->mini_descricao = $mini_descricao;

// Substituir URLs absolutas no conteúdo por URLs relativas
// Isso garante que as imagens continuem funcionando em diferentes ambientes
$conteudo = $_POST['conteudo'];
$conteudo = str_replace($base_url, '/', $conteudo);
$blog->conteudo = $conteudo;

// Verificar se os diretórios existem, caso contrário, criá-los
$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/blog/";
if (!is_dir($pastaDestino)) {
    mkdir($pastaDestino, 0777, true);
}

// Processar capa
if (isset($_FILES['capa']) && $_FILES['capa']['error'] === UPLOAD_ERR_OK) {
    // Apagar imagem antiga se existir
    if ($blog->capa && file_exists($pastaDestino . $blog->capa)) {
        unlink($pastaDestino . $blog->capa);
    }
    $blog->capa = salvarImagemWebP($_FILES['capa'], $pastaDestino, 'blog-');
}

// Salvar alterações
$blog->save();

// Redirecionar de volta para a página de blog
header("Location: " . $base_url . "blog.php?success=noticia_atualizada");
exit;