<?php

class UsuariosAmigosValidator {
    static function ValidarOrdem(array $dados): bool {
        if($dados['USUARIO_1'] >= $dados['USUARIO_2']){
            return false;
        }
        return true;
    }
}

?>