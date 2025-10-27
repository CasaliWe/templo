<?php
// Definir o fuso horário para Brasil/São Paulo (UTC-3)
date_default_timezone_set('America/Sao_Paulo');

require_once __DIR__ . '/../../../../../helpers/upload-webp.php';
require '../../../../config/config.php';
use Models\Blog;

// Verificar se todos os campos obrigatórios estão presentes
if (!isset($_POST['tag']) || !isset($_POST['titulo']) || !isset($_POST['mini_descricao']) || !isset($_POST['conteudo'])) {
    die("Campos obrigatórios não foram enviados");
}

// Dados enviados pelo formulário
$tag = $_POST['tag'];
$titulo = $_POST['titulo'];
$mini_descricao = $_POST['mini_descricao'];
$conteudo = $_POST['conteudo'];

// Limitar a mini descrição a 15 palavras
$palavras = explode(' ', trim($mini_descricao));
if (count($palavras) > 15) {
    $mini_descricao = implode(' ', array_slice($palavras, 0, 15));
}

// Substituir URLs absolutas no conteúdo por URLs relativas
// Isso garante que as imagens continuem funcionando em diferentes ambientes
$conteudo = str_replace($base_url, '/', $conteudo);

// Verificar se os diretórios existem, caso contrário, criá-los
$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/blog/";
if (!is_dir($pastaDestino)) {
    mkdir($pastaDestino, 0777, true);
}

// Inicializa variável para o nome do arquivo
$nomeCapa = null;

// Processar capa
if (isset($_FILES['capa']) && $_FILES['capa']['error'] === UPLOAD_ERR_OK) {
    $nomeCapa = salvarImagemWebP($_FILES['capa'], $pastaDestino, 'blog-');
}

// Criar notícia no banco de dados
$blog = new Blog();
$blog->tag = $tag;
$blog->titulo = $titulo;
$blog->mini_descricao = $mini_descricao;
$blog->capa = $nomeCapa;
$blog->conteudo = $conteudo;
$blog->save();

// Redirecionar de volta para a página de blog
header("Location: " . $base_url . "blog.php?success=true");
exit;