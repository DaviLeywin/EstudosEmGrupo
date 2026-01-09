<?php
require_once __DIR__ . '\..\service\class.UsuariosAmigosService.php';

class UsuariosAmigosController {
    static function BuscarUsuariosAmigos($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        UsuariosAmigosService::BuscarUsuariosAmigos($url);
    }
    
    static function ApagarUsuariosAmigos($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        UsuariosAmigosService::ApagarUsuariosAmigos($url);
    }

    static function AtualizarUsuariosAmigos($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        UsuariosAmigosService::AtualizarUsuariosAmigos($request->BODY, $url);
    }

    static function InserirUsuariosAmigos($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        UsuariosAmigosService::InserirUsuariosAmigos($request->BODY);
    }

    static function BuscarTodosUsuariosAmigos($request, $url){
        UsuariosAmigosService::BuscarTodosUsuariosAmigos();
    }
}
?>