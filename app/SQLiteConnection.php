<?php


namespace App;
use PDO;
use PDOException;

class SQLiteConnection {

    public $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return PDO
     */
    public function connect() {
        try {
            return $this->pdo = new PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
$SQLiteConnection = new SQLiteConnection();
$SQLiteConnection->connect();