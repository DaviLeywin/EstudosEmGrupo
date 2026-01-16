<?php
declare(strict_types=1);
require_once "class.Rotas.php";
require_once "class.Response.php";
require __DIR__ . '\..\vendor\autoload.php';

$rotas = new Rotas();

$rotas->post("/login","UsuariosController@LogarUsuario",false);

echo json_encode($rotas->executar());
