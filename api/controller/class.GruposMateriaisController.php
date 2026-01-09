<?php
require_once __DIR__ . '\..\service\class.GruposMateriaisService.php';

class GruposMateriaisController {
    static function BuscarGruposMateriais($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposMateriaisService::BuscarGruposMateriais($url);
    }
    
    static function ApagarGruposMateriais($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposMateriaisService::ApagarGruposMateriais($url);
    }

    static function AtualizarGruposMateriais($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposMateriaisService::AtualizarGruposMateriais($request->BODY, $url);
    }

    static function InserirGruposMateriais($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        GruposMateriaisService::InserirGruposMateriais($request->BODY);
    }

    static function BuscarTodosGruposMateriais($request, $url){
        GruposMateriaisService::BuscarTodosGruposMateriais();
    }
}
?>