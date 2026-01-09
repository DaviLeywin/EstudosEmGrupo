<?php
require_once __DIR__ . '\..\service\class.UsuariosService.php';

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
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        UsuariosService::InserirUsuario($request->BODY);
    }

    static function BuscarTodosUsuarios($request, $url){
        UsuariosService::BuscarTodosUsuarios();
    }
}
?>