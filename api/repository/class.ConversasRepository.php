<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class ConversasRepository {
    static function BuscarConversas($url){
        return DAO::Get()->Table('Conversas')->Where($url)->Execute();
    }
    
    static function ApagarConversas($url){
        return DAO::Delete()->Table('Conversas')->Where($url)->Execute();
    }

    static function AtualizarConversas(ConversasModel $dados, $url){
        return DAO::Put()->Table('Conversas')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirConversas(ConversasModel $dados){
        return DAO::Post()->Table('Conversas')->Dados($dados)->Execute();;
    }

    static function BuscarTodosConversas(){
        return DAO::Get()->Table('Conversas')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("Conversas")->Execute();   
    }
}
?>