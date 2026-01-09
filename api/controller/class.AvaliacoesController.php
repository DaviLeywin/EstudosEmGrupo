<?php
require_once __DIR__ . '\..\service\class.AvaliacoesService.php';

class AvaliacoesController {
    static function BuscarAvaliacoes($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        AvaliacoesService::BuscarAvaliacoes($url);
    }
    
    static function ApagarAvaliacoes($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        AvaliacoesService::ApagarAvaliacoes($url);
    }

    static function AtualizarAvaliacoes($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        AvaliacoesService::AtualizarAvaliacoes($request->BODY, $url);
    }

    static function InserirAvaliacoes($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        AvaliacoesService::InserirAvaliacoes($request->BODY);
    }

    static function BuscarTodosAvaliacoes($request, $url){
        AvaliacoesService::BuscarTodosAvaliacoes();
    }
}
?>