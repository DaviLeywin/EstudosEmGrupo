<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthMiddleware {
    static function ValidatToken(){
        $tokenBruto = getallheaders();
        $tokenLimpo = str_ireplace('Bearer ','',$tokenBruto);

        
    }

    static function CriarToken(){
        
    }
}

?>