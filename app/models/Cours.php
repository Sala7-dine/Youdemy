<?php 

require_once __DIR__ . "/../config/db.php";

class Cours extends db {

    public function __construct(){

        parent::__construct();

    }

    public function addCours($data, CourseContent $content) {
        
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
            
            return $coursId;
            
        }catch(PDOException $e) {

            return $e->getMessage();

        }

    }

    public function getAllCours($user_id){

        $query = "SELECT c.* , cat.nom as categorie_nom FROM cours c JOIN categorie cat ON c.categorie_id = cat.id WHERE c.user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $user_id);

        try{

            $stmt->execute();
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($courses as &$course) {
                $course['tags'] = $this->getCourseTags($course['id']);
            }
            
            return $courses;

        }catch(PDOException $e){

            return $e->getMessage();

        }

    }


    public function getCours($user_id , $cours_id){

        $query = "SELECT c.* , cat.nom as categorie_nom FROM cours c JOIN categorie cat ON c.categorie_id = cat.id WHERE c.user_id = :id AND c.id = :coursId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $user_id);
        $stmt->bindParam(":coursId", $cours_id);

        try{

            $stmt->execute();
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
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
        
        try {
            
            $query = "DELETE FROM courstag WHERE cours_id = :cours_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cours_id', $coursId, PDO::PARAM_INT);
            $stmt->execute();

            $query = "DELETE FROM cours WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $coursId, PDO::PARAM_INT);
            $stmt->execute();


            return true;
        } catch(PDOException $e) {
            error_log("Erreur de suppression du cours: " . $e->getMessage());
            return false;
        }
    }

    public function updateCours($data) {
        try {
            $query = "UPDATE cours SET 
                      titre = :titre,
                      description = :description,
                      categorie_id = :categorie_id
                      WHERE id = :id";
                      
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':titre', $data['titre']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->bindParam(':categorie_id', $data['categorie_id']);
            $stmt->bindParam(':id', $data['id']);
            
            return $stmt->execute();
        } catch(PDOException $e) {
            error_log("Erreur de mise à jour du cours: " . $e->getMessage());
            return false;
        }
    }

    public function updateCoursTags($coursId, $newTags) {
        try {
            $this->conn->beginTransaction();

            $query = "DELETE FROM courstag WHERE cours_id = :cours_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cours_id', $coursId);
            $stmt->execute();

            if (!empty($newTags)) {
                $query = "INSERT INTO courstag (cours_id, tag_id) VALUES (:cours_id, :tag_id)";
                $stmt = $this->conn->prepare($query);
                
                foreach ($newTags as $tagId) {
                    $stmt->bindParam(':cours_id', $coursId);
                    $stmt->bindParam(':tag_id', $tagId);
                    $stmt->execute();
                }
            }

            $this->conn->commit();
            return true;
        } catch(PDOException $e) {
            $this->conn->rollBack();
            error_log("Erreur de mise à jour des tags: " . $e->getMessage());
            return false;
        }
    }

}


?>