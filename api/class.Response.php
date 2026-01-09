<?php

class Response {
    static function Success(string $mensagem, array|object|null $dados = null) :array{
        $resposta = [
            'erro' => false,
            'mensagem' => $mensagem,
        ];
        if(!is_null($dados)){
            $resposta['resposta'] = (array) $dados;
        }
        http_response_code(200);
        return $resposta;
    }

    static function Error(string $mensagem, array|object|null $dados = null) :array{
        $resposta = [
            'erro' => true,
            'mensagem' => $mensagem,
        ];
        if(!is_null($dados)){
            $resposta['resposta'] = (array) $dados;
        }
        http_response_code(400);
        return $resposta;
    }
}

class InvalidArgumentExceptionWithData extends InvalidArgumentException {
    public $data;
    public function __construct(string $message, array $data, int $code = 0, ?Throwable $previous = null){
        $this->data = $data;
        parent::__construct($message, $code, $previous);
    }
    public function getData() :array{ return $this->data;} 
}

class DatabaseException extends Exception {
    public function __construct(string $message, int $code = 0, ?Throwable $previous = null){
        parent::__construct($message, $code, $previous);
    } 
}

set_exception_handler(function(Throwable $e){
    if (!headers_sent()) header('Content-Type: application/json; charset=utf-8');

    $code = 500;
    $tipo = 'ERRO_INTERNO';
    $mensagem = 'Erro inesperado';
    $data = [];

    if ($e instanceof TypeError || $e instanceof ValueError) {
        $code = 400;
        $tipo = 'ERRO_DE_TIPO';
        $mensagem = 'Tipo de dado inválido';
    }
    elseif($e instanceof InvalidArgumentExceptionWithData){
        $code = 422;
        $tipo = 'ERRO_DE_REGRA';
        $mensagem = $e->getMessage();
        $data = $e->getData();
    }
    elseif ($e instanceof InvalidArgumentException || $e instanceof DomainException) {
        $code = 422;
        $tipo = 'ERRO_DE_REGRA';
        $mensagem = $e->getMessage();
    }
    elseif ($e instanceof PDOException || $e instanceof DatabaseException) {
        $code = 500;
        $tipo = 'ERRO_DE_BANCO';
        $mensagem = 'Erro ao acessar o banco de dados';
    }
    elseif ($e instanceof LogicException) {
        $code = 500;
        $tipo = 'ERRO_DE_LOGICA';
        $mensagem = 'Erro interno de lógica';
    }
    elseif ($e instanceof Error) {
        $code = 500;
        $tipo = 'ERRO_DE_EXECUCAO';
        $mensagem = 'Erro interno de execução';
    }

    http_response_code($code);

    echo json_encode([
        'erro' => true,
        'tipo' => $tipo,
        'mensagem' => $mensagem,
        'dados' => $data,
        'detalhes' => [
            'mensagem' => $e->getMessage(),
            'arquivo' => $e->getFile(),
            'linha' => $e->getLine(),
        ]
    ], JSON_PRETTY_PRINT);

    exit;
})
?>