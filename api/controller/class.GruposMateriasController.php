<?php
require_once __DIR__ . '\..\service\class.GruposMateriasService.php';

class GruposMateriasController {
    static function BuscarGruposMaterias($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposMateriasService::BuscarGruposMaterias($url);
    }
    
    static function ApagarGruposMaterias($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposMateriasService::ApagarGruposMaterias($url);
    }

    static function AtualizarGruposMaterias($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        GruposMateriasService::AtualizarGruposMaterias($request->BODY, $url);
    }

    static function InserirGruposMaterias($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        GruposMateriasService::InserirGruposMaterias($request->BODY);
    }

    static function BuscarTodosGruposMaterias($request, $url){
        GruposMateriasService::BuscarTodosGruposMaterias();
    }
}
?>