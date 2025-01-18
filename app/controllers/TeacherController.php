<?php 
require_once (__DIR__.'/../models/User.php'); 
require_once (__DIR__.'/../models/Cours.php'); 
require_once (__DIR__.'/../models/Categorie.php'); 
require_once (__DIR__.'/../interfaces/CourseContent.php');

class TeacherController extends BaseController {
 
    private $UserModel;
    private $CoursModel;
    private $CategorieModel;

    public function __construct(){
        $this->UserModel = new User();
        $this->CoursModel = new Cours();
        $this->CategorieModel = new Categorie();
    }


    public function showTeacherDashboard(){

        $this->render("enseignant/dashboard");

    }

    public function showTeacherCours(){

        $user_id = $_SESSION['user_id'];

        $courses = $this->CoursModel->getAllCours($user_id);
        $categories = $this->CategorieModel->getAllCategories();

        $data = [
            'cours' => $courses,
            'categories' => $categories
        ];

        $this->render("enseignant/mes_cours" , $data);

    }

    public function addCours() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contentType = $_POST['content_type'];
            $content = null;
            
            // Création polymorphique du contenu
            if ($contentType === 'video') {
                $content = new VideoContent(
                    $_POST['video_url'],
                    $_POST['duration']
                );
            } else {
                // Gestion du téléchargement de fichier
                $file = $_FILES['document'];
                $uploadDir = 'uploads/documents/';
                $fileName = uniqid() . '_' . $file['name'];
                move_uploaded_file($file['tmp_name'], $uploadDir . $fileName);
                
                $content = new DocumentContent(
                    $uploadDir . $fileName,
                    pathinfo($fileName, PATHINFO_EXTENSION)
                );
            }

            $courseData = [
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'user_id' => $_SESSION['user_id'],
                'categorie_id' => $_POST['categorie_id']
            ];

            $result = $this->CoursModel->addCours($courseData, $content);

            if (is_numeric($result)) {
                // Succès
                header('Location: /dashboard/teacher/cours');
            } else {
                // Erreur
                echo "<script>alert('Erreur lors l'ajoute')</script>";
            }
        }
    }
}
