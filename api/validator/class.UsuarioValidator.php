<?php

class UsuariosValidator {
    static function ValidarLogin($dados):array{
        $erros = [];
        if(!isset($dados['EMAIL']) || empty($dados['EMAIL'])){
            $erros[] = Response::Error("VALIDATION_MISSING_EMAIL_ERROR");
        }
        else if(!self::ValidarEmail($dados['EMAIL'])){
            $erros[] = Response::Error("VALIDATION_INVALID_EMAIL_ERROR");
        }

        if(!isset($dados['SENHA_HASH']) || empty($dados['SENHA_HASH'])){
            $erros[] = Response::Error("VALIDATION_MISSING_PASSWORD_ERROR");
        }
        else if(!self::ValidarSenha($dados['SENHA_HASH'])){
            $erros[] = Response::Error("VALIDATION_INVALID_PASSWORD_ERROR");
        }
        else if(!BaseValidator::ValidarCaracteres($dados['SENHA_HASH'],'0-9a-zA-Z\-\_\@\.')){
            $erros[] = Response::Error("VALIDATION_INVALID_PASSWORD_ERROR");
        }

        return $erros;
    }

    static function ValidarSenha(string $Senha){
        if(strlen($Senha) > 8 || strlen($Senha) < 6){
            return false;
        }
        return true;
    }

    static function ValidarEmail(string $Email){
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }

    static function CodificarSenha(string $Senha){
        $hash = password_hash($Senha, PASSWORD_DEFAULT);      
        return str_ireplace('$','\$',$hash);
    }
}

?>