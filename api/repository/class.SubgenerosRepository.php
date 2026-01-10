<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class SubgenerosRepository {
    static function BuscarSubgeneros($url){
        return DAO::Get()->Table('Subgeneros')->Where($url)->Execute();
    }
    
    static function ApagarSubgeneros($url){
        return DAO::Delete()->Table('Subgeneros')->Where($url)->Execute();
    }

    static function AtualizarSubgeneros(SubgenerosModel $dados, $url){
        return DAO::Put()->Table('Subgeneros')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirSubgeneros(SubgenerosModel $dados){
        return DAO::Post()->Table('Subgeneros')->Dados($dados)->Execute();;
    }

    static function BuscarTodosSubgeneros(){
        return DAO::Get()->Table('Subgeneros')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("Subgeneros")->Execute();   
    }
}
?>