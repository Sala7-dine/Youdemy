<?php 
require_once (__DIR__.'/../models/User.php'); 
require_once (__DIR__.'/../models/Cours.php'); 
require_once (__DIR__.'/../models/Categorie.php'); 
require_once (__DIR__.'/../interfaces/CourseContent.php');

class TeacherController extends BaseController {
 
    private $UserModel;
    protected $CoursModel;
    private $CategorieModel;
    private $TagsModel;

    public function __construct(){
        $this->UserModel = new User();
        $this->CoursModel = new Cours();
        $this->CategorieModel = new Categorie();
        $this->TagsModel = new Tags();
    }


    public function showTeacherDashboard(){

        $this->render("enseignant/dashboard");

    }

    public function showTeacherCours(){

        $user_id = $_SESSION['user_id'];

        $courses = $this->CoursModel->getAllCours($user_id);
        $categories = $this->CategorieModel->getAllCategories();
        $tags = $this->TagsModel->getAllTags();

        $data = [
            'cours' => $courses,
            'categories' => $categories,
            'tags' => $tags
        ];

        $this->render("enseignant/mes_cours", $data);

    }

    public function addCours() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contentType = $_POST['content_type'];
            $content = null;
            
            // Création du contenu selon le type
            if ($contentType === 'video') {
                $content = new VideoContent(
                    $_POST['video_url'],
                    $_POST['duration']
                );
            } else {
                $content = new DocumentContent(
                    $_POST['document'],
                    pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION)
                );
            }

            $courseData = [
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'user_id' => $_SESSION['user_id'],
                'categorie_id' => $_POST['categorie_id']
            ];

            // Ajout du cours et récupération de son ID
            $coursId = $this->CoursModel->addCours($courseData, $content);

            // Si des tags ont été sélectionnés, les associer au cours
            if (isset($_POST['tags']) && is_array($_POST['tags'])) {
                foreach ($_POST['tags'] as $tagId) {
                    $this->CoursModel->addCoursTag($coursId, $tagId);
                }
            }

            if (is_numeric($coursId)) {
                header('Location: /dashboard/teacher/cours?success=1');
            } else {
                header('Location: /dashboard/teacher/cours?error=' . urlencode($coursId));
            }
        }
    }

    public function deleteCours() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cours_id'])) {

            $coursId = $_POST['cours_id'];
            $user_id = $_SESSION['user_id'];

            // Vérifier que le cours appartient bien à l'enseignant
            $cours = $this->CoursModel->getCoursByIdAndUser($coursId, $user_id);
            
            if ($cours) {
                if ($this->CoursModel->deleteCours($coursId)) {
                    header('Location: /dashboard/teacher/cours?success=delete');
                    exit;
                } else {
                    header('Location: /dashboard/teacher/cours?error=delete_failed');
                    exit;
                }
            } else {
                header('Location: /dashboard/teacher/cours?error=unauthorized');
                exit;
            }
        }
        header('Location: /dashboard/teacher/cours?error=invalid_request');
        exit;
    }
}
