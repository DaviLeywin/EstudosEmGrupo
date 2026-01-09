<?php
require_once __DIR__ . '\..\service\class.ConversasService.php';

class ConversasController {
    static function BuscarConversas($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        ConversasService::BuscarConversas($url);
    }
    
    static function ApagarConversas($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        ConversasService::ApagarConversas($url);
    }

    static function AtualizarConversas($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        ConversasService::AtualizarConversas($request->BODY, $url);
    }

    static function InserirConversas($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        ConversasService::InserirConversas($request->BODY);
    }

    static function BuscarTodosConversas($request, $url){
        ConversasService::BuscarTodosConversas();
    }
}
?>