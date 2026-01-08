<?php
require_once __DIR__ . ".\class.BaseController.php";
require_once __DIR__ . "\..\service\class.UsuariosService.php";

class UsuariosController {
    static function BuscarUsuario($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        UsuariosService::BuscarUsuario($url);
    }
    
    static function ApagarUsuario($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        UsuariosService::ApagarUsuario($url);
    }

    static function AtualizarUsuario($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        UsuariosService::AtualizarUsuario($request->BODY, $url);
    }

    static function InserirUsuario($request, $url){
        UsuariosService::InserirUsuario($request->BODY);
    }

    static function BuscarTodosUsuarios($request, $url){
        UsuariosService::BuscarTodosUsuarios();
    }
}
?>