<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "chess_game";
    private $conn;

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Conexion error: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
?>
