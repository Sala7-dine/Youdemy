<?php 
require_once(__DIR__.'/../config/db.php');
class Categorie extends db {

public function __construct()
{
    parent::__construct();
}

public function addCategory($title) {
    
    try {
        $query = "INSERT INTO categorie (nom) VALUES (:title)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erreur d'ajout de catégorie: " . $e->getMessage());
        return false;
    }
}

public function getAllCategories() {
    try {
        $query = "SELECT * FROM categorie";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Erreur de récupération des catégories: " . $e->getMessage());
        return [];
    }
}

public function deleteCategory($id) {
    try {
        $query = "DELETE FROM categorie WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erreur de suppression de catégorie: " . $e->getMessage());
        return false;
    }
}

}