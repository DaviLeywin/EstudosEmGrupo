<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class GruposSubgenerosRepository {
    static function BuscarGruposSubgeneros($url){
        return DAO::Get()->Table('grupos_subgeneros')->Where($url)->Execute();
    }
    
    static function ApagarGruposSubgeneros($url){
        return DAO::Delete()->Table('grupos_subgeneros')->Where($url)->Execute();
    }

    static function AtualizarGruposSubgeneros(GruposSubgenerosModel $dados, $url){
        return DAO::Put()->Table('grupos_subgeneros')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirGruposSubgeneros(GruposSubgenerosModel $dados){
        return DAO::Post()->Table('grupos_subgeneros')->Dados($dados)->Execute();;
    }

    static function BuscarTodosGruposSubgeneros(){
        return DAO::Get()->Table('grupos_subgeneros')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("grupos_subgeneros")->Execute();   
    }
}
?>