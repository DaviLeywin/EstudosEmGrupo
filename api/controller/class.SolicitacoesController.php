<?php
require_once __DIR__ . '\..\service\class.SolicitacoesService.php';

class SolicitacoesController {
    static function BuscarSolicitacoes($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        SolicitacoesService::BuscarSolicitacoes($url);
    }
    
    static function ApagarSolicitacoes($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        SolicitacoesService::ApagarSolicitacoes($url);
    }

    static function AtualizarSolicitacoes($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        SolicitacoesService::AtualizarSolicitacoes($request->BODY, $url);
    }

    static function InserirSolicitacoes($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        SolicitacoesService::InserirSolicitacoes($request->BODY);
    }

    static function BuscarTodosSolicitacoes($request, $url){
        SolicitacoesService::BuscarTodosSolicitacoes();
    }
}
?>