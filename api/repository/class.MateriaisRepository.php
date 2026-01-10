<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class MateriaisRepository {
    static function BuscarMateriais($url){
        return DAO::Get()->Table('Materiais')->Where($url)->Execute();
    }
    
    static function ApagarMateriais($url){
        return DAO::Delete()->Table('Materiais')->Where($url)->Execute();
    }

    static function AtualizarMateriais(MateriaisModel $dados, $url){
        return DAO::Put()->Table('Materiais')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirMateriais(MateriaisModel $dados){
        return DAO::Post()->Table('Materiais')->Dados($dados)->Execute();;
    }

    static function BuscarTodosMateriais(){
        return DAO::Get()->Table('Materiais')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("Materiais")->Execute();   
    }
}
?>