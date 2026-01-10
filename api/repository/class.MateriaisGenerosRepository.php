<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class MateriaisGenerosRepository {
    static function BuscarMateriaisGeneros($url){
        return DAO::Get()->Table('materiais_generos')->Where($url)->Execute();
    }
    
    static function ApagarMateriaisGeneros($url){
        return DAO::Delete()->Table('materiais_generos')->Where($url)->Execute();
    }

    static function AtualizarMateriaisGeneros(MateriaisGenerosModel $dados, $url){
        return DAO::Put()->Table('materiais_generos')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirMateriaisGeneros(MateriaisGenerosModel $dados){
        return DAO::Post()->Table('materiais_generos')->Dados($dados)->Execute();;
    }

    static function BuscarTodosMateriaisGeneros(){
        return DAO::Get()->Table('materiais_generos')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("materiais_generos")->Execute();   
    }
}
?>