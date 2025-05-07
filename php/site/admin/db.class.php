<?php

class db {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    private $dbname ="db_pweb1_2025_1";

    function conn(){

        try{
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"
                ]
            );

            return $conn;

        } catch(PDOException $e){
            echo "Erro: ". $e->getMessage();
        }
    }
}