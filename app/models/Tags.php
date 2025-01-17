<?php 
require_once(__DIR__.'/../config/db.php');
class Tags extends db {

public function __construct()
{
    parent::__construct();
}

public function addTag($name) {

    try {
        $query = "INSERT INTO tags (nom) VALUES (:name)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erreur d'ajout de tag: " . $e->getMessage());
        return false;
    }
}

public function getAllTags() {

    try {
        $query = "SELECT * FROM tags ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Erreur de récupération des tags: " . $e->getMessage());
        return [];
    }

}

public function deleteTag($id) {

    try {
        $query = "DELETE FROM tags WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erreur de suppression de tag: " . $e->getMessage());
        return false;
    }

}

}