<?php

class UsuariosModel {
    public string $NOME;
    public string $BIOGRAFIA;
    public string $SOBRENOME;
    public string $SENHA_HASH;
    public string $FOTO_DE_PERFIL;
    public string $NOME_DE_EXIBICAO;
    public string $EMAIL;
    public string $DATA_DE_NASCIMENTO;
    public int $NIVEL_ID;

    public function UpdateNome(string $Nome){
        if(!BaseValidator::ValidarTamanho($Nome, 100)){
            throw new InvalidArgumentException('O campo Nome deve conter no maximo 100 caracteres!');
        }   
        $this->NOME = $Nome;     
    }

    public function UpdateBiografia(string $Biografia){
        $this->BIOGRAFIA = $Biografia;     
    }

    public function UpdateSobrenome(string $Sobrenome){
        if(!BaseValidator::ValidarTamanho($Sobrenome, 100)){
            throw new InvalidArgumentException('O campo Sobrenome deve conter no maximo 100 caracteres!');
        }   
        $this->SOBRENOME = $Sobrenome;     
    }

    public function UpdateSenhaHash(string $Senha){
        if(!UsuariosValidator::ValidarSenha($Senha)){
            throw new InvalidArgumentException('O campo Senha deve conter entre 6 e 8 caracteres!');
        }
        if(!BaseValidator::ValidarCaracteres($Senha, '0-9a-zA-Z\-\_\@\.')){
            throw new InvalidArgumentException('O campo Senha deve conter apenas os seguintes caracteres: 0-9 a-z A-Z - _ @ .');
        }         
        $this->SENHA_HASH = UsuariosValidator::CodificarSenha($Senha);
    }

    public function UpdateFotoDePerfil(string $FotoDePerfil){
        if(!BaseValidator::ValidarTamanho($FotoDePerfil, 150)){
            throw new InvalidArgumentException('O campo FotoDePerfil deve conter no maximo 150 caracteres!');
        }   
        $this->FOTO_DE_PERFIL = $FotoDePerfil;     
    }

    public function UpdateNomeDeExibicao(string $NomeDeExibicao){
        if(!BaseValidator::ValidarTamanho($NomeDeExibicao, 200)){
            throw new InvalidArgumentException('O campo NomeDeExibicao deve conter no maximo 200 caracteres!');
        }   
        $this->NOME_DE_EXIBICAO = $NomeDeExibicao;     
    }

    public function UpdateEmail(string $Email){
        if(!BaseValidator::ValidarTamanho($Email, 100)){
            throw new InvalidArgumentException('O campo Email deve conter no maximo 100 caracteres!');
        }
        if (!UsuariosValidator::ValidarEmail($Email)) {
            throw new InvalidArgumentException('O campo Email esta em um formato invalido!');
        }
        $this->EMAIL = $Email;     
    }

    public function UpdateDataDeNascimento(string $DataDeNascimento){
        if(!BaseValidator::ValidarData($DataDeNascimento)){
            throw new InvalidArgumentException('O campo DataDeNascimento deve obedecer esse formato yyyy-mm-dd!');
        }   
        $this->DATA_DE_NASCIMENTO = $DataDeNascimento;
    }

    public function UpdateNivelId(int $NivelId){
        if(!BaseValidator::ValidarPositivoInteiro($NivelId)){
            throw new InvalidArgumentException('O campo NivelId deve ser um numero inteiro positivo!');
        }   
        $this->NIVEL_ID = $NivelId;
    }
    
    public function GetNome(){ 
        return $this->NOME ;
    }

    public function GetBiografia(){ 
        return $this->BIOGRAFIA ;
    }

    public function GetSobrenome(){ 
        return $this->SOBRENOME ;
    }

    public function GetSenhaHash(){ 
        return $this->SENHA_HASH ;
    }

    public function GetFotoDePerfil(){ 
        return $this->FOTO_DE_PERFIL ;
    }

    public function GetNomeDeExibicao(){ 
        return $this->NOME_DE_EXIBICAO ;
    }

    public function GetEmail(){ 
        return $this->EMAIL ;
    }

    public function GetDataDeNascimento(){ 
        return $this->DATA_DE_NASCIMENTO ;
    }

    public function GetNivelId(){ 
        return $this->NIVEL_ID ;
    } 
}
?>