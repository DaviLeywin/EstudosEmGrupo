<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class GenerosRepository {
    static function BuscarGeneros($url){
        return DAO::Get()->Table('Generos')->Where($url)->Execute();
    }
    
    static function ApagarGeneros($url){
        return DAO::Delete()->Table('Generos')->Where($url)->Execute();
    }

    static function AtualizarGeneros(GenerosModel $dados, $url){
        return DAO::Put()->Table('Generos')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirGeneros(GenerosModel $dados){
        return DAO::Post()->Table('Generos')->Dados($dados)->Execute();;
    }

    static function BuscarTodosGeneros(){
        return DAO::Get()->Table('Generos')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("Generos")->Execute();   
    }
}
?>