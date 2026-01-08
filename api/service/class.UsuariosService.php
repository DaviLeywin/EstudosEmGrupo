<?php
require_once __DIR__ . '.\class.BaseService.php';
require_once __DIR__ . '\..\repository\class.UsuariosRepository.php';

class UsuariosService {
    static function BuscarUsuario($url){
        UsuariosService::BuscarUsuario($url);
    }
    
    static function ApagarUsuario($url){
        UsuariosService::ApagarUsuario($url);
    }

    static function AtualizarUsuario($dados, $url){
        UsuariosService::AtualizarUsuario($dados, $url);
    }

    static function InserirUsuario($dados){
        UsuariosService::InserirUsuario($dados);
    }

    static function BuscarTodosUsuarios(){
        UsuariosService::BuscarTodosUsuarios();
    }
}
?>