<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class MateriaisSubgenerosRepository {
    static function BuscarMateriaisSubgeneros($url){
        return DAO::Get()->Table('materiais_subgeneros')->Where($url)->Execute();
    }
    
    static function ApagarMateriaisSubgeneros($url){
        return DAO::Delete()->Table('materiais_subgeneros')->Where($url)->Execute();
    }

    static function AtualizarMateriaisSubgeneros(MateriaisSubgenerosModel $dados, $url){
        return DAO::Put()->Table('materiais_subgeneros')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirMateriaisSubgeneros(MateriaisSubgenerosModel $dados){
        return DAO::Post()->Table('materiais_subgeneros')->Dados($dados)->Execute();;
    }

    static function BuscarTodosMateriaisSubgeneros(){
        return DAO::Get()->Table('materiais_subgeneros')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("materiais_subgeneros")->Execute();   
    }
}
?>