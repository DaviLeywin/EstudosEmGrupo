<?php
class DAO {
    public $tipo;
    public $pdo;
    public $tabela;
    public $groupBy;
    public $orderBy;
    public $wheres = [];
    public $dados = [];
    public $dadosGet = [];


    public function init(){
        $this->pdo = Banco::BuscarConexao();
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
        $pdo = $this->init();
        global $ConnB;
        $banco = $GLOBALS['conn']["banco"];
        $tabela = strtolower($tabela);
        $SqlValTabela = 'SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = :banco AND table_name = :tabela';
        $stmt = $this->pdo->prepare($SqlValTabela);
        $stmt->execute([':banco' =>$banco,  ':tabela' =>$tabela, ]);
        if(!(bool) $stmt->fetchColumn()){
            throw new InvalidArgumentException("Tabela $tabela nao existe no banco $banco");
        }
        $this->tabela = $tabela;
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

    public function Dados(object $dados = null){
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

    function CriarGet(){
        $sql = "SELECT * FROM ".$this->tabela;
        $sql .=  $this->CriarWhere($this->wheres);
        $stmt = $this->CriarBind($sql, $this->wheres);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($resultado) return Response::Success("Dados encontrados com sucesso!",$resultado);
        return Response::Fail("Nenhum registro encontrado!");
    }

    static function CriarWhere($wheres){
        if(empty($wheres))return "";
        $array = [];
        foreach($wheres as $index => $value){
            $index = strtoupper($index);
            $array[] = " $index = :$index ";
        }
        $sql = ' WHERE'. implode("and",$array);
        return $sql;
    }

    static function CriarBind($sql, $wheres){
        $pdo = Banco::BuscarConexao();
        $stmt = $pdo->prepare($sql);
        if(empty($wheres))return $stmt;
        foreach($wheres as $index => $value){
            $index = strtoupper($index);
            $stmt->BindValue(":$index",$value);
        }
        return $stmt;
    }

    function CriarDelete(){
        if(empty($this->wheres['id'])) throw new InvalidArgumentException("Dados do where nao pode estar vazio!");
        $sql = "DELETE FROM ".$this->tabela." WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id",$this->wheres['id'],PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->rowCount() > 0) return Response::Success("Dados apagados com sucesso!");
        return Response::Fail("Falha ao apagar os dados!");
    }

    function CriarDescribe(){
        $sql = "DESCRIBE ".$this->tabela.";";
        $stmt = $this->pdo->query($sql);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($resultado) return Response::Success("Descricao encontrada com sucesso!",$resultado);
        return Response::Success("Falha ao buscar descricao!");
    }

    function GetById($tabela, $pdo, $id = null){
        $id = !is_null($id) ? $id : $pdo->lastInsertId();
        $sql = "SELECT * FROM $tabela WHERE ID = :ID;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":ID",$id);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    function CriarPost(){
        $dados = $this->dados;
        if(is_null($dados)) throw new InvalidArgumentException("Campo dados e obrigatorio para tipo post!");
        $campos = implode(',',array_keys($dados));
        $valores = array_map(function($valor){
            if(is_string($valor)) return "'".$valor."'";
            return $valor;
        },array_values($dados));
        $tabela = $this->tabela;
        $pdo = $this->pdo;
        $sql = "INSERT INTO $tabela ($campos) VALUES (". implode(',',$valores) .")";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $this->GetById($tabela, $pdo);
        if($resultado) return Response::Success("Insercao feita com sucesso!",$resultado);
        return Response::Fail("Falha ao inserir dados!");

    }

    function CriarPut(){
        $dados = $this->dados;
        if(is_null($dados)) throw new InvalidArgumentException("Campo dados e obrigatorio para tipo post!");
        if(empty($this->wheres)) throw new InvalidArgumentException("Campo where e obrigatorio para tipo post!");
        $tabela = $this->tabela;
        $set = [];
        foreach($dados as $index => $valor){  $set[] = " $index = :$index";}
        $sql = "UPDATE $tabela SET " . implode(",",$set) . " WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        foreach($dados as $index => $value){ $stmt->BindValue(":$index",$value);}
        $stmt->BindParam(":id",$this->wheres['id']);
        $stmt->execute();
        $linhas = $stmt->rowCount();
        $resultado = $this->GetById($tabela, $this->pdo, $this->wheres['id']);
        if($linhas > 0) return Response::Success("atualizacao feita com sucesso!",$resultado);
        else return Response::Fail("nenhuma linha foi atualizada!");
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