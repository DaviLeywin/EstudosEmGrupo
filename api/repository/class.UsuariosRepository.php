<?php
require_once __DIR__ . '..\class.BaseRepository.php';
require_once __DIR__ . '\..\database\class.Database.php';

class UsuariosRepository {
    static function BuscarUsuario($url){
        return DAO::Get()->Table('usuarios')->Where($url)->Execute();
    }
    
    static function ApagarUsuario($url){
        return DAO::Delete()->Table('usuarios')->Where($url)->Execute();
    }

    static function AtualizarUsuario(UsuariosModel $dados, $url){
        return $dados;
        return DAO::Put()->Table('usuarios')->Dados($dados)->Where($url)->Execute();
    }

    static function InserirUsuario($dados){
        return DAO::Post()->Table('usuarios')->Dados($dados)->Execute();;
    }

    static function BuscarTodosUsuarios(){
        return DAO::Get()->Table('usuarios')->Execute(); 
    }

    static function Describe(){
        return DAO::Describe()->Table("usuarios")->Execute();   
    }
}
// print_r(UsuariosRepository::InserirUsuario([
//     'NOME' => 'loganiltonpintons',
//     'BIOGRAFIA' => 'gosto de culinaria',
//     'SOBRENOME' => 'lopez',
//     'SENHA_HASH' => '\$2y\$10\$iyWF5OM9zAhwpDNhD10AiOKSs9VIvpFB5xQIg5bkas5oP34/mXeaa',
//     'FOTO_DE_PERFIL' => 'EstudosEmGrupo/public/assets/images/vermelho.jpg',
//     'NOME_DE_EXIBICAO' => 'Logan L.',
//     'EMAIL' => 'davirralmeigcgvda@example.com',
//     'DATA_DE_NASCIMENTO' => '2008-11-11',
//     'NIVEL_ID' => 1
// ]));
?>