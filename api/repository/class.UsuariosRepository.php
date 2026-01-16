<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';
require_once __DIR__ . '\..\model\class.UsuariosModel.php';

class UsuariosRepository {
    static function BuscarUsuario($url){
        $usuarioArray = DAO::Get()->Table('usuarios')->Where($url)->Execute();
        if(is_null($usuarioArray)) return null;
        $usuario = new UsuariosModel();
        $resposta = BaseValidator::InserirNoModel($usuario, $usuarioArray);
        return $resposta;
    }
    
    static function ApagarUsuario($url){
        return DAO::Delete()->Table('usuarios')->Where($url)->Execute();
    }

    static function AtualizarUsuario(UsuariosModel $dados, $url){
        return DAO::Put()->Table('usuarios')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirUsuario(UsuariosModel $dados){
        return DAO::Post()->Table('usuarios')->Dados($dados)->Execute();;
    }

    static function BuscarTodosUsuarios(){
        return DAO::Get()->Table('usuarios')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("usuarios")->Execute();   
    }
}
// print_r(UsuariosRepository::Describe());
?>