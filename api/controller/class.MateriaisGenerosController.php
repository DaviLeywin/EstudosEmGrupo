<?php
require_once __DIR__ . '\..\service\class.MateriaisGenerosService.php';

class MateriaisGenerosController {
    static function BuscarMateriaisGeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisGenerosService::BuscarMateriaisGeneros($url);
    }
    
    static function ApagarMateriaisGeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisGenerosService::ApagarMateriaisGeneros($url);
    }

    static function AtualizarMateriaisGeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisGenerosService::AtualizarMateriaisGeneros($request->BODY, $url);
    }

    static function InserirMateriaisGeneros($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        MateriaisGenerosService::InserirMateriaisGeneros($request->BODY);
    }

    static function BuscarTodosMateriaisGeneros($request, $url){
        MateriaisGenerosService::BuscarTodosMateriaisGeneros();
    }
}
?>