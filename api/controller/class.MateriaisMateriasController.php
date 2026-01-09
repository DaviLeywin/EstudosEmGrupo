<?php
require_once __DIR__ . '\..\service\class.MateriaisMateriasService.php';

class MateriaisMateriasController {
    static function BuscarMateriaisMaterias($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisMateriasService::BuscarMateriaisMaterias($url);
    }
    
    static function ApagarMateriaisMaterias($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisMateriasService::ApagarMateriaisMaterias($url);
    }

    static function AtualizarMateriaisMaterias($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisMateriasService::AtualizarMateriaisMaterias($request->BODY, $url);
    }

    static function InserirMateriaisMaterias($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        MateriaisMateriasService::InserirMateriaisMaterias($request->BODY);
    }

    static function BuscarTodosMateriaisMaterias($request, $url){
        MateriaisMateriasService::BuscarTodosMateriaisMaterias();
    }
}
?>