<?php
require_once __DIR__ . '\..\repository\class.UsuariosRepository.php';
require_once __DIR__ . '\..\model\class.UsuariosModel.php';
require_once __DIR__ . '\..\validator\class.BaseValidator.php';
require_once __DIR__ . '\..\validator\class.UsuarioValidator.php';

class UsuariosService {
    static function BuscarUsuario($url){
        return UsuariosRepository::BuscarUsuario($url);
    }
    
    static function ApagarUsuario($url){
        return UsuariosRepository::ApagarUsuario($url);
    }

    static function LogarUsuario($dados){
        $resposta = UsuariosValidator::ValidarLogin($dados);
        if($resposta) return $resposta;

        return UsuariosRepository::BuscarUsuario(["EMAIL" => $dados['EMAIL']]);
        return $usuario->GetSenhaHash(); 
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
        if($resposta) throw new InvalidArgumentExceptionWithData("nao foram encontradas metods referentes ao campos recebidos (camel to snake)",$resposta);
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

        $usuario->UpdateNome($dados['NOME']);
        $usuario->UpdateBiografia($dados['BIOGRAFIA']);
        $usuario->UpdateSobrenome($dados['SOBRENOME']);
        $usuario->UpdateSenhaHash($dados['SENHA_HASH']);
        $usuario->UpdateFotoDePerfil($dados['FOTO_DE_PERFIL']);
        $usuario->UpdateNomeDeExibicao($dados['NOME_DE_EXIBICAO']);
        $usuario->UpdateEmail($dados['EMAIL']);
        $usuario->UpdateDataDeNascimento($dados['DATA_DE_NASCIMENTO']);
        $usuario->UpdateNivelId($dados['NIVEL_ID']);

        return UsuariosRepository::InserirUsuario($usuario);
    }

    static function BuscarTodosUsuarios(){
        return UsuariosRepository::BuscarTodosUsuarios();
    }

}

// print_r(UsuariosService::BuscarTodosUsuarios());
// print_r(UsuariosService::BuscarUsuario(["id" => 1]));
// print_r(UsuariosService::ApagarUsuario(["id" => 3]));
// print_r(UsuariosService::AtualizarUsuario([
//     "NOME" => "Teste Atualizada",
//     "SOBRENOME" => "Teste Atualizado",
//     "EMAIL" => "David@testes.com",
//     "SENHA_HASH" => "Teste028Atualizado",
//     "DATA_DE_NASCIMENTO" => "2024-01-02",
//     "NIVEL_ID" => 2
// ], ["id" => 1]));
// print_r(UsuariosService::InserirUsuario([
//     "NOME" => "Teste",
//     "SOBRENOME" => "Teste",
//     "EMAIL" => "Teste",
//     "SENHA_HASH" => "Teste",
//     "DATA_DE_NASCIMENTO" => "2024-01-01",
//     "NIVEL_ID" => 1
// ]));
// print_r(Database::RecreateDatabase());

// UsuariosService::LogarUsuario([
//     "EMAIL" => "Teste",
//     "SENHA_HASH" => "Teste"
// ]);




?>