<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class FavoritosRepository {
    static function BuscarFavoritos($url){
        return DAO::Get()->Table('Favoritos')->Where($url)->Execute();
    }
    
    static function ApagarFavoritos($url){
        return DAO::Delete()->Table('Favoritos')->Where($url)->Execute();
    }

    static function AtualizarFavoritos(FavoritosModel $dados, $url){
        return DAO::Put()->Table('Favoritos')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirFavoritos(FavoritosModel $dados){
        return DAO::Post()->Table('Favoritos')->Dados($dados)->Execute();;
    }

    static function BuscarTodosFavoritos(){
        return DAO::Get()->Table('Favoritos')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("Favoritos")->Execute();   
    }
}
?>