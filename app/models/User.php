<?php 
require_once(__DIR__.'/../config/db.php');
class User extends db {

public function __construct()
{
    parent::__construct();
}

public function register($username , $email , $password , $role , $status){

     // Prepare and execute the insertion query
     $result = $this->conn->prepare("INSERT INTO utilisateur (nom, email , mot_de_passe , role , status) VALUES (:username , :email, :password , :role , :status)");
     $result->bindParam(":username" , $username);
     $result->bindParam(":email" , $email);
     $result->bindParam(":password" , $password);
     $result->bindParam(":role" , $role);
     $result->bindParam(":status" , $status);
   
    try {
       
        $result->execute();
        return $this->conn->lastInsertId();
        
       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

public function login($email , $password){
    
    $result = $this->conn->prepare("SELECT * FROM utilisateur WHERE email=:email");
    $result->bindParam(":email" , $email);

    try {
        $result->execute();
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password , $user["mot_de_passe"])){
           return  $user;
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

public function getAllUsers() {
    try {
        $query = "SELECT * FROM utilisateur";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

public function deleteUser($id) {
    try {
        $query = "DELETE FROM utilisateur WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    } catch (PDOException $e) {
        error_log("Erreur de suppression d'utilisateur: " . $e->getMessage());
        return false;
    }
}

public function updateStatus($userId, $newStatus) {
    try {
        $query = "UPDATE utilisateur SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $newStatus, PDO::PARAM_STR);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erreur de mise à jour du statut: " . $e->getMessage());
        return false;
    }
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