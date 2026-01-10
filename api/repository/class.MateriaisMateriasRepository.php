<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class MateriaisMateriasRepository {
    static function BuscarMateriaisMaterias($url){
        return DAO::Get()->Table('materiais_materias')->Where($url)->Execute();
    }
    
    static function ApagarMateriaisMaterias($url){
        return DAO::Delete()->Table('materiais_materias')->Where($url)->Execute();
    }

    static function AtualizarMateriaisMaterias(MateriaisMateriasModel $dados, $url){
        return DAO::Put()->Table('materiais_materias')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirMateriaisMaterias(MateriaisMateriasModel $dados){
        return DAO::Post()->Table('materiais_materias')->Dados($dados)->Execute();;
    }

    static function BuscarTodosMateriaisMaterias(){
        return DAO::Get()->Table('materiais_materias')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("materiais_materias")->Execute();   
    }
}
?>