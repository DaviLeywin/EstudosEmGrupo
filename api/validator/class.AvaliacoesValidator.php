<?php

class AvaliacoesValidator {
    static function ValidarNota(string $Nota){
        if($Nota < 1 or $Nota > 5){
            return false;
        }
        return true;
    }
}

?>