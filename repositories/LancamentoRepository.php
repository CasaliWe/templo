<?php
namespace Repositories;

use Models\Lancamento;

class LancamentoRepository {

    public static function getAll(){
        return Lancamento::all();
    }

    public static function update($titulo, $youtube, $spotify, $deezer, $amazon, $imagem){

        if($imagem === null){
            $lancamentoAtual = Lancamento::where('id', 1)->first();
            $imagem = $lancamentoAtual->imagem;
        }

        $dados = [
            'titulo' => $titulo,
            'youtube' => $youtube,
            'spotify' => $spotify,
            'deezer' => $deezer,
            'amazon' => $amazon,
            'imagem' => $imagem
        ];
        
        $res = Lancamento::where('id', 1)->update($dados);

        if($res){
            return true;
        } else {
            return false;
        }

    }
    
}