<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class AvaliacoesRepository {
    static function BuscarAvaliacoes($url){
        return DAO::Get()->Table('Avaliacoes')->Where($url)->Execute();
    }
    
    static function ApagarAvaliacoes($url){
        return DAO::Delete()->Table('Avaliacoes')->Where($url)->Execute();
    }

    static function AtualizarAvaliacoes(AvaliacoesModel $dados, $url){
        return DAO::Put()->Table('Avaliacoes')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirAvaliacoes(AvaliacoesModel $dados){
        return DAO::Post()->Table('Avaliacoes')->Dados($dados)->Execute();;
    }

    static function BuscarTodosAvaliacoes(){
        return DAO::Get()->Table('Avaliacoes')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("Avaliacoes")->Execute();   
    }
}
?>