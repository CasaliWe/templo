<?php

require '../../../../config/bootstrap.php';
use Repositories\LancamentoRepository;

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
$youtube = filter_input(INPUT_POST, 'youtube', FILTER_SANITIZE_SPECIAL_CHARS);
$spotify = filter_input(INPUT_POST, 'spotify', FILTER_SANITIZE_SPECIAL_CHARS);
$deezer = filter_input(INPUT_POST, 'deezer', FILTER_SANITIZE_SPECIAL_CHARS);
$amazon = filter_input(INPUT_POST, 'amazon', FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] != UPLOAD_ERR_NO_FILE) {
    $pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/lancamento/";
    $dataHora = date('YmdHis');
    $nomeArquivo = $dataHora . basename($_FILES['imagem']['name']);
    $caminhoDestino = $pastaDestino . $nomeArquivo;

    move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino);


    $res = LancamentoRepository::update($titulo, $youtube, $spotify, $deezer, $amazon, $nomeArquivo);
    if ($res) {
        header('Location: ../../../../lancamento.php?create=true');
    } else {
        header('Location: ../../../../lancamento.php?error=true');
    }
}else{
    $res = LancamentoRepository::update($titulo, $youtube, $spotify, $deezer, $amazon, null);
    if ($res) {
        header('Location: ../../../../lancamento.php?create=true');
    } else {
        header('Location: ../../../../lancamento.php?error=true');
    }
}
