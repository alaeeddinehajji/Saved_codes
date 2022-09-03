<?php

class Database
{
    private $servername = "localhost";
    private $username = "u999326062_test";
    private $password = "";
    private $connection;

    public function connect()
    {
        $this->connection = null;
        try {
            $this->connection = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->username . "", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

}
