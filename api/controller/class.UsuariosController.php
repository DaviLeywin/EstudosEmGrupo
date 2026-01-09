<?php
require_once __DIR__ . '\..\service\class.UsuariosService.php';

class UsuariosController {
    static function BuscarUsuarios($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        UsuariosService::BuscarUsuarios($url);
    }
    
    static function ApagarUsuarios($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        UsuariosService::ApagarUsuarios($url);
    }

    static function AtualizarUsuarios($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        UsuariosService::AtualizarUsuarios($request->BODY, $url);
    }

    static function InserirUsuarios($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        UsuariosService::InserirUsuarios($request->BODY);
    }

    static function BuscarTodosUsuarios($request, $url){
        UsuariosService::BuscarTodosUsuarios();
    }
}
?>