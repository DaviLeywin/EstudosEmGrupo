<?php
require_once __DIR__ . '\..\service\class.MateriaisSubgenerosService.php';

class MateriaisSubgenerosController {
    static function BuscarMateriaisSubgeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisSubgenerosService::BuscarMateriaisSubgeneros($url);
    }
    
    static function ApagarMateriaisSubgeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisSubgenerosService::ApagarMateriaisSubgeneros($url);
    }

    static function AtualizarMateriaisSubgeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisSubgenerosService::AtualizarMateriaisSubgeneros($request->BODY, $url);
    }

    static function InserirMateriaisSubgeneros($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        MateriaisSubgenerosService::InserirMateriaisSubgeneros($request->BODY);
    }

    static function BuscarTodosMateriaisSubgeneros($request, $url){
        MateriaisSubgenerosService::BuscarTodosMateriaisSubgeneros();
    }
}
?>