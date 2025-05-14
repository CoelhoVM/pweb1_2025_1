<?php

class db
{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    private $dbname = "db_pweb1_2025_1";

    private $table_name;

    public function __construct($table_name)
    {
        $this->table_name = $table_name;
        return $this->conn();
    }

    function conn()
    {

        try {
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]
            );

            return $conn;

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function all(): array
    {
        $conn = $this->conn();

        $sql = "SELECT * FROM usuario";

        $st = $conn->prepare(query: $sql);

        $st->execute();

        return $st->fetchAll(PDO::FETCH_CLASS);

    }

    public function store($dados): void
    {

        $conn = $this->conn();

        $sql = "INSERT INTO $this->table_name (";

        $flag = 0;

        $arrayDados = [];

        foreach($dados as $campo =>$valor){

            if($flag ==0){
                $sql .= "$campo";
            }else{
                $sql .= ", $campo";
            }
            $flag = 1;
        }

        $sql .=") VALUES (";

        $flag = 0;

        foreach($dados as $campo =>$valor){

            if($flag ==0){
                $sql .= "?";
            }else{
                $sql .= ", ?";
            }
            $flag = 1;
            $arrayDados[] = $valor;
        }

        $sql .=") (";

        $st = $conn->prepare(query: $sql);

        $st->execute(params: $arrayDados);

    }
}