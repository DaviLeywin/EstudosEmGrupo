<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class GruposRepository {
    static function BuscarGrupos($url){
        return DAO::Get()->Table('Grupos')->Where($url)->Execute();
    }
    
    static function ApagarGrupos($url){
        return DAO::Delete()->Table('Grupos')->Where($url)->Execute();
    }

    static function AtualizarGrupos(GruposModel $dados, $url){
        return DAO::Put()->Table('Grupos')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirGrupos(GruposModel $dados){
        return DAO::Post()->Table('Grupos')->Dados($dados)->Execute();;
    }

    static function BuscarTodosGrupos(){
        return DAO::Get()->Table('Grupos')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("Grupos")->Execute();   
    }
}
?>