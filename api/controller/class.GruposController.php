<?php
require_once __DIR__ . '\..\service\class.GruposService.php';

class GruposController {
    static function BuscarGrupos($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposService::BuscarGrupos($url);
    }
    
    static function ApagarGrupos($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposService::ApagarGrupos($url);
    }

    static function AtualizarGrupos($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposService::AtualizarGrupos($request->BODY, $url);
    }

    static function InserirGrupos($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        GruposService::InserirGrupos($request->BODY);
    }

    static function BuscarTodosGrupos($request, $url){
        GruposService::BuscarTodosGrupos();
    }
}
?>