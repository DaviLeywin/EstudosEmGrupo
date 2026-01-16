<?php
require_once __DIR__ . '/../class.Response.php';
class Database {
    static private $host;
    static private $password;
    static private $user;
    static private $database;
    static private $create;
    static private $insert;

    static function init(){
        $config = require __DIR__ . '/../config/config.php';
        $sql = require __DIR__ . '/../config/sqlDatabase.php';
        self::$password = $config['db']['password'];
        self::$database = $config['db']['database'];
        self::$host = $config['db']['host'];
        self::$user = $config['db']['user'];
        self::$create = $sql['create'];
        self::$insert = $sql['insert'];
    }

    static function CreateDatabase(){
        try{
            self::init();
            $conn = new PDO("mysql:host=".self::$host,self::$user,self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            $conn->exec('CREATE DATABASE IF NOT EXISTS '.self::$database);
            return Response::Success('banco criado com sucesso!');
        }catch(Exception $e){
            throw new DatabaseException('Falha ao criar banco');
        }
    }

    static function DeleteDatabase(){
        try{
            self::init();
            $conn = new PDO("mysql:host=".self::$host,self::$user,self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            $conn->exec('DROP DATABASE IF EXISTS '.self::$database);
            return Response::Success('Banco apagado com sucesso!');
        }catch(Exception $e){
            throw new DatabaseException('Falha ao apagar banco!');
        }
    }

    static function GetConnection(){
        try{
            self::init(); 
            $conn = new PDO("mysql:host=".self::$host.";dbname=".self::$database,self::$user,self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            return $conn;
        }catch(Exception $e){
            throw new DatabaseException('Falha ao buscar conexao!');
        }
    }

    static function CreateSql(){
        try{
            $conn = self::GetConnection();          
            foreach(self::$create as $create){
                $conn->exec($create);
            }
            foreach(self::$insert as $insert){
                $conn->exec($insert);
            }
            return Response::Success('SQL criado com sucesso!');
        }catch(Exception $e){
            throw new DatabaseException('Falha ao apagar banco!');
        }
    }

    static function RecreateDatabase(){
        try{
            self::DeleteDatabase();
            self::CreateDatabase();
            self::CreateSql();
            return Response::Success('Banco recriado com sucesso!');
        }catch(Exception $e){
            throw new DatabaseException('Falha ao recriar banco!');
        }
    }
}
// print_r(Database::RecreateDatabase());
?>