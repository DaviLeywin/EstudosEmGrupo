<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class GruposMateriaisRepository {
    static function BuscarGruposMateriais($url){
        return DAO::Get()->Table('grupos_materiais')->Where($url)->Execute();
    }
    
    static function ApagarGruposMateriais($url){
        return DAO::Delete()->Table('grupos_materiais')->Where($url)->Execute();
    }

    static function AtualizarGruposMateriais(GruposMateriaisModel $dados, $url){
        return DAO::Put()->Table('grupos_materiais')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirGruposMateriais(GruposMateriaisModel $dados){
        return DAO::Post()->Table('grupos_materiais')->Dados($dados)->Execute();;
    }

    static function BuscarTodosGruposMateriais(){
        return DAO::Get()->Table('grupos_materiais')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("grupos_materiais")->Execute();   
    }
}
?>