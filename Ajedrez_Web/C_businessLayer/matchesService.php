<?php
require_once 'db.php';

class MatchesService {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllPlayers() {
        $conn = $this->db->connect();

        $sql = "SELECT ID, name FROM T_Players";
        $result = $conn->query($sql);

        $players = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $players[] = $row;
            }
        }

        $conn->close();

        return $players;
    }

    public function createNewGame($whitePlayerID, $blackPlayerID, $gameTitle) {
        $conn = $this->db->connect();

        $sql = "INSERT INTO T_Matches (startDate, white, black, title, state)
                VALUES (NOW(), ?, ?, ?, 'In progress')";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('iss', $whitePlayerID, $blackPlayerID, $gameTitle);

        if ($stmt->execute()) {
            $newGameID = $conn->insert_id;
            $stmt->close();
            $conn->close();
            return $newGameID;
        } else {
            echo "Error: " . $stmt->error;
            $stmt->close();
            $conn->close();
            return false;
        }
    }

    public function getGameInfo($gameID) {
        $conn = $this->db->connect();

        $sql = "SELECT ID, white, black, title, state FROM T_Matches WHERE ID = ?";
        
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param('i', $gameID);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        $gameInfo = $result->fetch_assoc();
        
        $stmt->close();
        $conn->close();
        
        return $gameInfo;
    }

    public function getFilteredMatches($order, $status) {
        $conn = $this->db->connect();
    
        $sql = "SELECT ID, title, startDate FROM T_Matches";
    
        if (!empty($status)) {
            $sql .= " WHERE state = '{$status}'";
        }
    
        $sql .= " ORDER BY {$order} DESC";
    
        $result = $conn->query($sql);
    
        $matches = array();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $matches[] = $row;
            }
        }
    
        $conn->close();
    
        return $matches;
    }
}
?>
