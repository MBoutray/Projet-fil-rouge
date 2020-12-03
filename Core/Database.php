<?php
namespace Core;

class Database {
    /**
     * PDO object that holds connection to database
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Connection to database
     *
     * @return PDO
     */
    public function __construct() {
        try {
            require "Config/config.php";

            $this->host = $dbConfig["host"];
            $this->dbname = $dbConfig["dbname"];
            $this->dbuser = $dbConfig["dbuser"];
            $this->dbpass = $dbConfig["dbpass"];
            $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Method to receive data from the database
     *
     * @param string $statement
     * @param boolean $one
     * @return array
     */
    protected function query($statement, $one = false) : array {
        $query = $this->pdo->query($statement);

        if($one){
            return $query->fetch(\PDO::FETCH_OBJ);
        } else {
            return $query->fetchAll(\PDO::FETCH_OBJ);
        }
    }

    /**
     * Method to send data to the database
     *
     * @param string $statement
     * @param array $data
     * @return bool
     */
    protected function prepare($statement, $data = array()) {
        $prepare = $this->pdo->prepare($statement);
        return $prepare->execute($data);
    }

    /**
     * Method to get the id of the last data inserted in the database
     *
     * @return int
     */
    public function getLastInsertId() {
        return $this->pdo->lastInsertId();
    }
}