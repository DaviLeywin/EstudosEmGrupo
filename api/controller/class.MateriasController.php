<?php
require_once __DIR__ . '\..\service\class.MateriasService.php';

class MateriasController {
    static function BuscarMaterias($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriasService::BuscarMaterias($url);
    }
    
    static function ApagarMaterias($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriasService::ApagarMaterias($url);
    }

    static function AtualizarMaterias($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriasService::AtualizarMaterias($request->BODY, $url);
    }

    static function InserirMaterias($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        MateriasService::InserirMaterias($request->BODY);
    }

    static function BuscarTodosMaterias($request, $url){
        MateriasService::BuscarTodosMaterias();
    }
}
?>