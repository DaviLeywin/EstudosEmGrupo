<?php
require_once __DIR__ . '..\class.BaseService.php';
require_once __DIR__ . '\..\repository\class.UsuariosRepository.php';
require_once __DIR__ . '\..\model\class.UsuariosModel.php';

class UsuariosService {
    static function BuscarUsuario($url){
        UsuariosService::BuscarUsuario($url);
    }
    
    static function ApagarUsuario($url){
        UsuariosService::ApagarUsuario($url);
    }

    static function AtualizarUsuario($dados, $url){
        $descricao = UsuariosRepository::Describe();

        $resposta = BaseValidator::CampoSobrando($dados, $descricao);
        if($resposta) return Response::Error("Campos extras!",$resposta); 
        $resposta = BaseValidator::ValidarTipoArray($dados, $descricao,"Usuarios");
        if($resposta) return Response::Error("Erro ao validar tipo dos campos",$resposta);    
        $resposta = BaseValidator::ValidarTamanhoArray($dados, $descricao);
        if($resposta) return Response::Error("Erro ao validar tamanho dos campos",$resposta);

        $usuario = new UsuariosModel();

        $resposta = BaseValidator::InserirNoModel($usuario, $dados);
        if($resposta){
            throw new InvalidArgumentExceptionWithData("nao foram encontradas metods referentes ao campos recebidos (camel to snake)",$resposta);
        }
        return $usuario;
        return UsuariosRepository::AtualizarUsuario($usuario, $url);
    }

    static function InserirUsuario($dados){
        $descricao = UsuariosRepository::Describe();

        $resposta = BaseValidator::CampoSobrando($dados, $descricao);
        if($resposta) return Response::Error("Campos extras!",$resposta);
        $resposta = BaseValidator::ValidarNotNull($dados, $descricao);
        if($resposta) return Response::Error("Erro ao validar campos nao nulos!",$resposta);    
        $resposta = BaseValidator::ValidarTipoArray($dados, $descricao,"Usuarios");
        if($resposta) return Response::Error("Erro ao validar tipo dos campos",$resposta);    
        $resposta = BaseValidator::ValidarTamanhoArray($dados, $descricao);
        if($resposta) return Response::Error("Erro ao validar tamanho dos campos",$resposta);

        $usuario = new UsuariosModel();
        $resposta = BaseValidator::InserirNoModel($usuario, $dados);
        if($resposta) throw new InvalidArgumentExceptionWithData("nao foram encontradas metods referentes ao campos recebidos (camel to snake)",$resposta);
        return $usuario;

        return UsuariosRepository::InserirUsuario($usuario);
    }

    static function BuscarTodosUsuarios(){
        UsuariosService::BuscarTodosUsuarios();
    }
}
// print_r(UsuariosService::AtualizarUsuario([
//     'NOME' => 'loganiltonpintons',
//     'BIOGRAFIA' => '',
//     'SOBRENOME' => 'lopez',
//     'SENHA_HASH' => 'olamundo12',
//     'FOTO_DE_PERFIL' => 'EstudosEmGrupo/public/assets/images/vermelho.jpg',
//     'NOME_DE_EXIBICAO' => 'Logan L.',
//     'EMAIL' => 'davirralmeigcgva@example.com',
//     'DATA_DE_NASCIMENTO' => '2008-11-11',
//     'NIVEL_ID' => 1
// ],['id' => 1]));
?>