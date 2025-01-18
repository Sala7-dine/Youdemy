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

        $query = "SELECT c.*, cat.id as id_cat , cat.nom as categorie_nom FROM cours c LEFT JOIN categorie cat ON c.categorie_id = cat.id WHERE c.user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $user_id);

        try{

            $stmt->execute();
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($courses as &$course) {
                if (!empty($course['contenu'])) {
                    $content = json_decode($course['contenu'], true);
                    
                    if ($content && isset($content['type'])) {
                        if ($content['type'] === 'video') {
                            $course['content'] = new VideoContent(
                                $content['url'] ?? '',
                                $content['duration'] ?? 0
                            );
                        } else {
                            $course['content'] = new DocumentContent(
                                $content['path'] ?? '',
                                $content['file_type'] ?? ''
                            );
                        }
                    } else {
                        $course['content'] = new DocumentContent('', '');
                    }
                } else {
                    $course['content'] = new DocumentContent('', '');
                }
            }
            
            return $courses;

        }catch(PDOException $e){

            return $e->getMessage();

        }

    }

    private function isValidJson($string) {
        if (empty($string)) return false;
        json_decode($string);
        return (json_last_error() === JSON_ERROR_NONE);
    }

}


?>