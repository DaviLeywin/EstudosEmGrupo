<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class MateriasRepository {
    static function BuscarMaterias($url){
        return DAO::Get()->Table('Materias')->Where($url)->Execute();
    }
    
    static function ApagarMaterias($url){
        return DAO::Delete()->Table('Materias')->Where($url)->Execute();
    }

    static function AtualizarMaterias(MateriasModel $dados, $url){
        return DAO::Put()->Table('Materias')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirMaterias(MateriasModel $dados){
        return DAO::Post()->Table('Materias')->Dados($dados)->Execute();;
    }

    static function BuscarTodosMaterias(){
        return DAO::Get()->Table('Materias')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("Materias")->Execute();   
    }
}
?>