<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class GruposMateriasRepository {
    static function BuscarGruposMaterias($url){
        return DAO::Get()->Table('grupos_materias')->Where($url)->Execute();
    }
    
    static function ApagarGruposMaterias($url){
        return DAO::Delete()->Table('grupos_materias')->Where($url)->Execute();
    }

    static function AtualizarGruposMaterias(GruposMateriasModel $dados, $url){
        return DAO::Put()->Table('grupos_materias')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirGruposMaterias(GruposMateriasModel $dados){
        return DAO::Post()->Table('grupos_materias')->Dados($dados)->Execute();;
    }

    static function BuscarTodosGruposMaterias(){
        return DAO::Get()->Table('grupos_materias')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("grupos_materias")->Execute();   
    }
}
?>