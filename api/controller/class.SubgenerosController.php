<?php
require_once __DIR__ . '\..\service\class.SubgenerosService.php';

class SubgenerosController {
    static function BuscarSubgeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        SubgenerosService::BuscarSubgeneros($url);
    }
    
    static function ApagarSubgeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        SubgenerosService::ApagarSubgeneros($url);
    }

    static function AtualizarSubgeneros($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        SubgenerosService::AtualizarSubgeneros($request->BODY, $url);
    }

    static function InserirSubgeneros($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        SubgenerosService::InserirSubgeneros($request->BODY);
    }

    static function BuscarTodosSubgeneros($request, $url){
        SubgenerosService::BuscarTodosSubgeneros();
    }
}
?>