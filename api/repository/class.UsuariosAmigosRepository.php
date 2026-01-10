<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class UsuariosAmigosRepository {
    static function BuscarUsuariosAmigos($url){
        return DAO::Get()->Table('usuarios_amigos')->Where($url)->Execute();
    }
    
    static function ApagarUsuariosAmigos($url){
        return DAO::Delete()->Table('usuarios_amigos')->Where($url)->Execute();
    }

    static function AtualizarUsuariosAmigos(UsuariosAmigosModel $dados, $url){
        return DAO::Put()->Table('usuarios_amigos')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirUsuariosAmigos(UsuariosAmigosModel $dados){
        return DAO::Post()->Table('usuarios_amigos')->Dados($dados)->Execute();;
    }

    static function BuscarTodosUsuariosAmigos(){
        return DAO::Get()->Table('usuarios_amigos')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("usuarios_amigos")->Execute();   
    }
}
?>