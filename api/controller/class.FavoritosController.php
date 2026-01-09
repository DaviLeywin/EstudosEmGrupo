<?php
require_once __DIR__ . '\..\service\class.FavoritosService.php';

class FavoritosController {
    static function BuscarFavoritos($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        FavoritosService::BuscarFavoritos($url);
    }
    
    static function ApagarFavoritos($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        FavoritosService::ApagarFavoritos($url);
    }

    static function AtualizarFavoritos($request, $url){
        if(!is_numeric($url['id'])) return Response::Fail('Id tem que ser um numero!');
        $url['id'] = (int) $url['id'];
        FavoritosService::AtualizarFavoritos($request->BODY, $url);
    }

    static function InserirFavoritos($request, $url){
        if(empty($request->BODY))return Response::Fail('Dados de insert nao podem estar vazios!');
        FavoritosService::InserirFavoritos($request->BODY);
    }

    static function BuscarTodosFavoritos($request, $url){
        FavoritosService::BuscarTodosFavoritos();
    }
}
?>