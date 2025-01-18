<?php 

require_once __DIR__ . "/../config/db.php";

class Cours extends db {

    public function __construct(){

        parent::__construct();

    }

    public function addCours($data, CourseContent $content) {

        $this->conn->beginTransaction();
        
        try {

            $query = "INSERT INTO cours (titre, description, contenu, user_id, categorie_id) VALUES (:titre, :description, :contenu, :user_id, :categorie_id)";
            
            $stmt = $this->conn->prepare($query);
            $contentData = json_encode($content->save());
            
            $stmt->bindParam(":titre", $data['titre']);
            $stmt->bindParam(":description", $data['description']);
            $stmt->bindParam(":contenu", $contentData);
            $stmt->bindParam(":user_id", $data['user_id']);
            $stmt->bindParam(":categorie_id", $data['categorie_id']);
            
            $stmt->execute();
            $coursId = $this->conn->lastInsertId();
            
            $this->conn->commit();
            return $coursId;
            
        }catch(PDOException $e) {

            $this->conn->rollBack();
            return $e->getMessage();

        }

    }

    public function getAllCours($user_id){

        $query = "SELECT c.*, cat.nom as categorie_nom 
                 FROM cours c 
                 LEFT JOIN categorie cat ON c.categorie_id = cat.id 
                 WHERE c.user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $user_id);

        try{

            $stmt->execute();
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Ajouter les tags pour chaque cours
            foreach ($courses as &$course) {
                $course['tags'] = $this->getCourseTags($course['id']);
            }
            
            return $courses;

        }catch(PDOException $e){

            return $e->getMessage();

        }

    }

    public function addCoursTag($coursId, $tagId) {
        try {
            $query = "INSERT INTO courstag (cours_id, tag_id) VALUES (:cours_id, :tag_id)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cours_id', $coursId, PDO::PARAM_INT);
            $stmt->bindParam(':tag_id', $tagId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch(PDOException $e) {
            error_log("Erreur d'association cours-tag: " . $e->getMessage());
            return false;
        }
    }

    public function getCourseTags($coursId) {
        try {
            $query = "SELECT t.* FROM tags t 
                     INNER JOIN courstag ct ON t.id = ct.tag_id 
                     WHERE ct.cours_id = :cours_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cours_id', $coursId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Erreur de récupération des tags du cours: " . $e->getMessage());
            return [];
        }
    }

    public function getCoursByIdAndUser($coursId, $userId) {
        try {
            $query = "SELECT * FROM cours WHERE id = :id AND user_id = :user_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $coursId, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Erreur de récupération du cours: " . $e->getMessage());
            return false;
        }
    }

    public function deleteCours($coursId) {
        $this->conn->beginTransaction();
        
        try {
            // Supprimer d'abord les associations avec les tags
            $query = "DELETE FROM courstag WHERE cours_id = :cours_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cours_id', $coursId, PDO::PARAM_INT);
            $stmt->execute();

            // Supprimer le cours
            $query = "DELETE FROM cours WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $coursId, PDO::PARAM_INT);
            $stmt->execute();

            $this->conn->commit();
            return true;
        } catch(PDOException $e) {
            $this->conn->rollBack();
            error_log("Erreur de suppression du cours: " . $e->getMessage());
            return false;
        }
    }

}


?>