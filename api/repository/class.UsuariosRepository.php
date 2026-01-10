<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class UsuariosRepository {
    static function BuscarUsuario($url){
        return DAO::Get()->Table('usuarios')->Where($url)->Execute();
    }
    
    static function ApagarUsuario($url){
        return DAO::Delete()->Table('usuarios')->Where($url)->Execute();
    }

    static function AtualizarUsuario(UsuariosModel $dados, $url){
        return DAO::Put()->Table('usuarios')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirUsuario($dados){
        return DAO::Post()->Table('usuarios')->Dados($dados)->Execute();;
    }

    static function BuscarTodosUsuarios(){
        return DAO::Get()->Table('usuarios')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("usuarios")->Execute();   
    }
}
?>