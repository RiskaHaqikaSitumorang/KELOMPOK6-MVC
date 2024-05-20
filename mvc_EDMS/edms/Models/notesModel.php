<?php
class NotesModel {
    private $conn;

    function __construct() {
        // Create connection
        $this->conn = new mysqli("localhost", "root", "", "edmsdb");
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function execute($query, $params = [], $types = "") {
        $stmt = $this->conn->prepare($query);
        if ($params && $types) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        return $stmt;
    }

    function addNote($category, $title, $description, $createdBy) {
        $query = "INSERT INTO tblnotes (noteCategory, noteTitle, noteDescription, createdBy) VALUES (?, ?, ?, ?)";
        $stmt = $this->execute($query, [$category, $title, $description, $createdBy], "ssss");
        return $stmt->affected_rows > 0;
    }

    function deleteNoteById($noteId, $userId) {
        $query = "DELETE FROM tblnotes WHERE id=? AND createdBy=?";
        $stmt = $this->execute($query, [$noteId, $userId], "ii");
        return $stmt->affected_rows > 0;
    }

    function searchNotes($userId, $searchData) {
        $query = "SELECT * FROM tblnotes WHERE createdBy=? AND noteTitle LIKE ?";
        $searchData = "%$searchData%";
        $stmt = $this->execute($query, [$userId, $searchData], "is");
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function getNotesByUserId($userId) {
        $query = "SELECT * FROM tblnotes WHERE createdBy=?";
        $stmt = $this->execute($query, [$userId], "i");
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function getNoteById($noteId, $userId) {
        $query = "SELECT * FROM tblnotes WHERE id=? AND createdBy=?";
        $stmt = $this->execute($query, [$noteId, $userId], "ii");
        return $stmt->get_result()->fetch_assoc();
    }

    function addNoteHistory($noteId, $userId, $details) {
        $query = "INSERT INTO tblnoteshistory (noteId, userId, noteDetails) VALUES (?, ?, ?)";
        $stmt = $this->execute($query, [$noteId, $userId, $details], "iis");
        return $stmt->affected_rows > 0;
    }

    function deleteNoteHistoryById($historyId, $userId) {
        $query = "DELETE FROM tblnoteshistory WHERE id=? AND userId=?";
        $stmt = $this->execute($query, [$historyId, $userId], "ii");
        return $stmt->affected_rows > 0;
    }

    function getNoteHistory($noteId, $userId) {
        $query = "SELECT * FROM tblnoteshistory WHERE noteId=? AND userId=?";
        $stmt = $this->execute($query, [$noteId, $userId], "ii");
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function __destruct() {
        $this->conn->close();
    }
}
?>
