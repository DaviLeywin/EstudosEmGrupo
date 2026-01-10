<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class GruposUsuariosRepository {
    static function BuscarGruposUsuarios($url){
        return DAO::Get()->Table('grupos_usuarios')->Where($url)->Execute();
    }
    
    static function ApagarGruposUsuarios($url){
        return DAO::Delete()->Table('grupos_usuarios')->Where($url)->Execute();
    }

    static function AtualizarGruposUsuarios(GruposUsuariosModel $dados, $url){
        return DAO::Put()->Table('grupos_usuarios')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirGruposUsuarios(GruposUsuariosModel $dados){
        return DAO::Post()->Table('grupos_usuarios')->Dados($dados)->Execute();;
    }

    static function BuscarTodosGruposUsuarios(){
        return DAO::Get()->Table('grupos_usuarios')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("grupos_usuarios")->Execute();   
    }
}
?>