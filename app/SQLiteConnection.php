<?php


namespace App;
use PDO;

class SQLiteConnection {

    public $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return PDO
     */
    public function connect() {
        if ($this->pdo == null) {
            echo 'Connected to the SQLite database successfully!';
            $this->pdo = new PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
        }  else
            echo 'Whoops, could not connect to the SQLite database!';
        return $this->pdo;
    }

}
$SQLiteConnection = new SQLiteConnection();
$SQLiteConnection->connect();