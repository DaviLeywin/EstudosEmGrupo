<?php
class DAO {
    public $tipo;
    public $pdo;
    public $tabela;
    public $groupBy;
    public $orderBy;
    public $wheres = [];
    public $dados = [];
    public $descricao;


    public function init(){
        $this->pdo = Database::GetConnection();
        if (!$this->pdo) throw new InvalidArgumentException("me matei n deu!");
        return $this->pdo;
    }


    public static function __callStatic($metodo,$params){
        $valido = ['get','put','post','delete','describe'];
        $metodo = strtolower($metodo);
        $inst = new self();
        if(in_array($metodo,$valido)){
            $inst->tipo = $metodo;    
            foreach($params as $param){
                if($param)$inst->dadosGet = $params;    
            }
            return $inst;
        }else {  
            throw new InvalidArgumentException("Nenhum metodo $metodo encontrado!");
        } 
    }
    
    public function Table(string $tabela){
        $this->init();
        $this->tabela = strtolower($tabela);
        $this->descricao = $this->CriarDescribe();
        return $this;
    }

    public function OrderBy(string $campo = null, Ordem $tipo = Ordem::ASC){
        $campo = strtolower($campo);
        if (!preg_match('/^[a-z0-9_]+$/', $campo)) throw new InvalidArgumentException("Order by: aceita apenas um campo válido");
        $this->orderBy = " ORDER BY $campo {$tipo->value};";
        return $this;
    }

    public function GroupBy($groupBy = null){
        $groupBy = strtolower($groupBy);
        if(!preg_match('/^[a-z0-9_]+$/',$groupBy))throw new InvalidArgumentException("Group by deve conter uma string/campo!");
        $this->groupBy = " GROUP BY $groupBy;";
        return $this;
    }

    public function Dados(object|array $dados = null){
        if(empty($dados)) throw new InvalidArgumentException("Dados nao podem estar vazios!");
        $dados = (array) $dados;
        foreach($dados as $nome => $value){
            $this->dados[$nome] = $value;
        }
        return $this;
    }

    public function Where(array $dados = []){
        if(empty($dados)) throw new InvalidArgumentException("Dados do where nao pode estar vazio!");
        foreach($dados as $index => $value){
            $this->wheres[$index] = $value;
        }
        return $this;
    }
    
    function CriarDelete(){
        $wheres = $this->wheres;
        if(empty($wheres)) throw new InvalidArgumentException("Where nao pode estar vazio para metodo delete!");
        $sql = "DELETE FROM ".$this->tabela;
        $sql .= $this->CriarDadosSql($wheres, "and","WHERE");
        $stmt = $this->CriarBind($sql, $wheres);
        $stmt->execute();
        if($stmt->rowCount() > 0) return true;
        return false;
    }
    
    function CriarGet(){
        $sql = "SELECT * FROM ".$this->tabela;
        $sql .= $this->CriarDadosSql($this->wheres, "and","WHERE");
        $stmt = $this->CriarBind($sql, $this->wheres);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($resultado) return $resultado;
        else return null;
    }

    function CriarDescribe(){
        $sql = "DESCRIBE ".$this->tabela.";";
        $stmt = $this->pdo->query($sql);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($resultado) return $resultado;
        else return null;
    }

    function SqlPost($dados){
        $sql = "INSERT INTO ".$this->tabela."(" . implode(', ', array_keys($dados)) . ")";
        return $sql .= " VALUES(:" . implode(', :', array_keys($dados)) . ");";
    }

    function RespostaPostPut(){
        $id = $this->pdo->lastInsertId();
        $this->wheres = $id ? ['id' => $id] : array_merge($this->wheres, $this->dados);
        $dados = $this->CriarGet()[0] ?? null;
        $resposta = [];
        foreach($this->descricao as $campos){
            if($campos['Key'] != 'PRI') continue;
            $resposta[$campos['Field']] = $dados[$campos['Field']];
        }
        return $resposta;
    }
    
    function CriarPost(){
        $dados = $this->dados;
        if(is_null($dados)) throw new InvalidArgumentException("Campo dados e obrigatorio para tipo post!");
        $sql = $this->SqlPost($dados);
        $stmt = $this->CriarBind($sql, $dados);
        $stmt->execute();
        $resposta = $this->RespostaPostPut();
        if($stmt->rowCount() > 0) return $resposta;
        else return null;
    }

    function CriarBind($sql, $dados, $stmt = null){
        $stmt = $stmt ?: $this->pdo->prepare($sql);
        if(empty($dados))return $stmt;
        foreach($dados as $index => $value){
            $index = strtoupper($index);
            $stmt->BindValue(":$index",$value);
        }
        return $stmt;
    }

    static function CriarDadosSql($dados, string $separacao ,string $inicio){
        if(empty($dados))return "";
        $array = [];
        foreach($dados as $index => $value){
            $index = strtoupper($index);
            $array[] = " $index = :$index ";
        }
        return " $inicio " . implode($separacao, $array);
    }

    function CriarPut(){
        if(is_null($this->dados)) throw new InvalidArgumentException("Campo dados e obrigatorio para tipo post!");
        if(empty($this->wheres)) throw new InvalidArgumentException("Campo where e obrigatorio para tipo post!");

        $sql = "UPDATE ".$this->tabela;
        $sql .= $this->CriarDadosSql($this->dados,",","SET");
        $sql .= $this->CriarDadosSql($this->wheres,"and","WHERE");
        $stmt = $this->CriarBind($sql, $this->dados);
        $stmt = $this->CriarBind($sql, $this->wheres, $stmt);
        
        $stmt->execute();
        $resposta = $this->RespostaPostPut();
        if($stmt->rowCount() > 0) return $resposta;
        else return null;
    }


    public function Execute(){
        if(is_null($this->tabela)) throw new InvalidArgumentException("Campo tabela e obrigatório!");
        if(is_null($this->tipo)) throw new InvalidArgumentException("Campo tipo e obrigatório!");
        return match($this->tipo){
            'put' => $this->CriarPut(),
            'delete' => $this->CriarDelete(),
            'get' => $this->CriarGet(),
            'post' => $this->CriarPost(),
            'describe' => $this->CriarDescribe(),
        };
    }

}
?>