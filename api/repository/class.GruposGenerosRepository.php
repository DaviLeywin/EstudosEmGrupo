<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class GruposGenerosRepository {
    static function BuscarGruposGeneros($url){
        return DAO::Get()->Table('grupos_generos')->Where($url)->Execute();
    }
    
    static function ApagarGruposGeneros($url){
        return DAO::Delete()->Table('grupos_generos')->Where($url)->Execute();
    }

    static function AtualizarGruposGeneros(GruposGenerosModel $dados, $url){
        return DAO::Put()->Table('grupos_generos')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirGruposGeneros(GruposGenerosModel $dados){
        return DAO::Post()->Table('grupos_generos')->Dados($dados)->Execute();;
    }

    static function BuscarTodosGruposGeneros(){
        return DAO::Get()->Table('grupos_generos')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("grupos_generos")->Execute();   
    }
}
?>