<?php
require_once __DIR__ . '\..\service\class.MateriaisService.php';

class MateriaisController {
    static function BuscarMateriais($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisService::BuscarMateriais($url);
    }
    
    static function ApagarMateriais($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisService::ApagarMateriais($url);
    }

    static function AtualizarMateriais($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MateriaisService::AtualizarMateriais($request->BODY, $url);
    }

    static function InserirMateriais($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        MateriaisService::InserirMateriais($request->BODY);
    }

    static function BuscarTodosMateriais($request, $url){
        MateriaisService::BuscarTodosMateriais();
    }
}
?>