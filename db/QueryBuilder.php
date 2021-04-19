<?php

require 'App/ServerApi.php';

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;

    }

    function addServerInfo($table)
    {
        $queryInsert = $this->pdo->exec("INSERT INTO VirtualMachine (cpu, mem) VALUES ()");
        var_dump($queryInsert);
    }
    function selectAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM VirtualMachine WHERE cpu");
        $statement->execute();
        $serverStats = $statement->fetchAll(PDO::FETCH_CLASS);
        var_dump($serverStats);
    }
}