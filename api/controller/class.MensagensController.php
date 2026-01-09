<?php
require_once __DIR__ . '\..\service\class.MensagensService.php';

class MensagensController {
    static function BuscarMensagens($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MensagensService::BuscarMensagens($url);
    }
    
    static function ApagarMensagens($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MensagensService::ApagarMensagens($url);
    }

    static function AtualizarMensagens($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        MensagensService::AtualizarMensagens($request->BODY, $url);
    }

    static function InserirMensagens($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        MensagensService::InserirMensagens($request->BODY);
    }

    static function BuscarTodosMensagens($request, $url){
        MensagensService::BuscarTodosMensagens();
    }
}
?>