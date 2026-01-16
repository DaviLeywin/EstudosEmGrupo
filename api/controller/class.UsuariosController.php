<?php
require_once __DIR__ . '\..\service\class.UsuariosService.php';

class UsuariosController {
    static function BuscarUsuarios($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        return UsuariosService::BuscarUsuarios($url);
    }
    
    static function LogarUsuario($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de login nao podem estar vazios!');
        return UsuariosService::LogarUsuario($request->BODY);
    }
    
    static function ApagarUsuarios($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        return UsuariosService::ApagarUsuarios($url);
    }

    static function AtualizarUsuarios($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        return UsuariosService::AtualizarUsuarios($request->BODY, $url);
    }

    static function InserirUsuarios($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        return UsuariosService::InserirUsuarios($request->BODY);
    }

    static function BuscarTodosUsuarios($request, $url){
        return UsuariosService::BuscarTodosUsuarios();
    }
}
?>