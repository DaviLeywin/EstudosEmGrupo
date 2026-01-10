<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class MensagensRepository {
    static function BuscarMensagens($url){
        return DAO::Get()->Table('Mensagens')->Where($url)->Execute();
    }
    
    static function ApagarMensagens($url){
        return DAO::Delete()->Table('Mensagens')->Where($url)->Execute();
    }

    static function AtualizarMensagens(MensagensModel $dados, $url){
        return DAO::Put()->Table('Mensagens')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirMensagens(MensagensModel $dados){
        return DAO::Post()->Table('Mensagens')->Dados($dados)->Execute();;
    }

    static function BuscarTodosMensagens(){
        return DAO::Get()->Table('Mensagens')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("Mensagens")->Execute();   
    }
}
?>