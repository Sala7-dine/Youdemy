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


    public function checkSubmtion(){

        if (empty($_SESSION["user_id"])) {

            header("Location: /login");
            exit;
        }

    }

    public function getRoleUser(){

        $user_id = $_SESSION["user_id"];

        $user = $this->UserModel->getUser($user_id);

        $role = $user["role"];

        return $role;
        
    }

    public function showTeacherDashboard(){

        $this->checkSubmtion();

        if(empty($_SESSION["user_id"])){          

            header("Location: /login");
            
        }else if($this->getRoleUser() === "Enseignant"){

            $this->render("enseignant/dashboard");

        }else {

            $this->render("layouts/page404");

        }

    }


    public function showTeacherCours(){

        $this->checkSubmtion();

        if(empty($_SESSION["user_id"])){          

            header("Location: /login");
            
        }else if($this->getRoleUser() === "Enseignant"){

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
            
        }else {

            $this->render("layouts/page404");

        }
        

    }

    public function addCours() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $contentType = $_POST['content_type'];
            $content = null;
            
            if ($contentType === 'video') {
                $content = new VideoContent(
                    $_POST['video_url']
                );
            } else {
                $content = new DocumentContent(
                    $_POST['text']
                );
            }

            $courseData = [
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'user_id' => $_SESSION['user_id'],
                'categorie_id' => $_POST['categorie_id']
            ];

            $coursId = $this->CoursModel->addCours($courseData, $content);

            if (isset($_POST['tags']) && is_array($_POST['tags'])) {
                foreach ($_POST['tags'] as $tagId) {
                    $this->CoursModel->addCoursTag($coursId, $tagId);
                }
            }

            header('Location: /dashboard/teacher/cours');
        }
    }

    public function deleteCours(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cours_id'])) {

            $coursId = $_POST['cours_id'];
        
            if ($this->CoursModel->deleteCours($coursId)) {
                header('Location: /dashboard/teacher/cours');
                exit;
            } else {
                header('Location: /dashboard/teacher/cours?error=delete_failed');
                exit;
            }
           
        }
    }

    public function editCours() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cours_id'])) {

            $coursId = $_POST['cours_id'];
            $user_id = $_SESSION['user_id'];
         
            // $cours = $this->CoursModel->getCoursByIdAndUser($coursId, $user_id);
            // if (!$cours) {
            //     header('Location: /dashboard/teacher/cours?error=unauthorized');
            //     exit;
            // }

            $courses = $this->CoursModel->getAllCours($user_id);
            $cours = $this->CoursModel->getCours($user_id , $coursId);
            $categories = $this->CategorieModel->getAllCategories();
            $tags = $this->TagsModel->getAllTags();
            $modal = true;

            $data = [
                'cours' => $courses,
                'editCourse' => $cours,
                'categories' => $categories,
                'tags' => $tags , 
                'modal' => $modal
            ];

            $this->render("enseignant/mes_cours", $data);
        }
    }

    public function updateCours() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $coursId = $_POST['cours_id'];
            $user_id = $_SESSION['user_id'];

            $cours = $this->CoursModel->getCoursByIdAndUser($coursId, $user_id);
            if (!$cours) {
                header('Location: /dashboard/teacher/cours?error=unauthorized');
                exit;
            }

            $courseData = [
                'id' => $coursId,
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'categorie_id' => $_POST['categorie_id']
            ];

            if ($this->CoursModel->updateCours($courseData)) {
    
                $this->CoursModel->updateCoursTags($coursId, $_POST['tags'] ?? []);
                header('Location: /dashboard/teacher/cours?success=update');
            } else {
                header('Location: /dashboard/teacher/cours?error=update_failed');
            }
            exit;
        }
    }

}
