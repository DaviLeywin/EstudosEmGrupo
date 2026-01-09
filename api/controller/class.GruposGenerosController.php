<?php
require_once __DIR__ . '\..\service\class.GruposGenerosService.php';

class GruposGenerosController {
    static function BuscarGruposGeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposGenerosService::BuscarGruposGeneros($url);
    }
    
    static function ApagarGruposGeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposGenerosService::ApagarGruposGeneros($url);
    }

    static function AtualizarGruposGeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposGenerosService::AtualizarGruposGeneros($request->BODY, $url);
    }

    static function InserirGruposGeneros($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        GruposGenerosService::InserirGruposGeneros($request->BODY);
    }

    static function BuscarTodosGruposGeneros($request, $url){
        GruposGenerosService::BuscarTodosGruposGeneros();
    }
}
?>