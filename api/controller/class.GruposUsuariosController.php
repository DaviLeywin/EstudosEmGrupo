<?php
require_once __DIR__ . '\..\service\class.GruposUsuariosService.php';

class GruposUsuariosController {
    static function BuscarGruposUsuarios($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposUsuariosService::BuscarGruposUsuarios($url);
    }
    
    static function ApagarGruposUsuarios($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposUsuariosService::ApagarGruposUsuarios($url);
    }

    static function AtualizarGruposUsuarios($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposUsuariosService::AtualizarGruposUsuarios($request->BODY, $url);
    }

    static function InserirGruposUsuarios($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        GruposUsuariosService::InserirGruposUsuarios($request->BODY);
    }

    static function BuscarTodosGruposUsuarios($request, $url){
        GruposUsuariosService::BuscarTodosGruposUsuarios();
    }
}
?>