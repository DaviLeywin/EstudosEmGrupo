<?php
require_once __DIR__ . '\..\service\class.GruposSubgenerosService.php';

class GruposSubgenerosController {
    static function BuscarGruposSubgeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposSubgenerosService::BuscarGruposSubgeneros($url);
    }
    
    static function ApagarGruposSubgeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposSubgenerosService::ApagarGruposSubgeneros($url);
    }

    static function AtualizarGruposSubgeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposSubgenerosService::AtualizarGruposSubgeneros($request->BODY, $url);
    }

    static function InserirGruposSubgeneros($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        GruposSubgenerosService::InserirGruposSubgeneros($request->BODY);
    }

    static function BuscarTodosGruposSubgeneros($request, $url){
        GruposSubgenerosService::BuscarTodosGruposSubgeneros();
    }
}
?>