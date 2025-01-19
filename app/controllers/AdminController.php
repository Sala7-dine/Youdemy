<?php 
require_once (__DIR__.'/../models/User.php');
require_once (__DIR__.'/../models/Categorie.php');
require_once (__DIR__.'/../models/Tags.php');


class AdminController extends BaseController {
 
    private $UserModel;
    private $CategorieModel;
    private $TagModel;

    public function __construct(){

        $this->UserModel = new User();
        $this->CategorieModel = new Categorie();
        $this->TagModel = new Tags();
        
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


    public function showDashboard() {
        
        
        $this->checkSubmtion();
        

        if(empty($_SESSION["user_id"])){          

            header("Location: /login");
            
        }else if($this->getRoleUser() === "Administrateur"){

            $users = $this->UserModel->getAllUsers();
            $data = [
                'users' => $users
            ];
            $this->render('admin/dashboard', $data);

        }else {

            $this->render("layouts/page404");

        }

       

       

    }

    public function showUsers(){

        $this->checkSubmtion();


        if(empty($_SESSION["user_id"])){          

            header("Location: /login");
            
        }else if($this->getRoleUser() === "Administrateur"){
            
            $users = $this->UserModel->getAllUsers();
        
            $data = [
                'users' => $users
            ];

            $this->render("admin/users" , $data);

        }else {

            $this->render("layouts/page404");

        }
            
        



    }

    public function showCategorie(){

        $this->checkSubmtion();


        if(empty($_SESSION["user_id"])){          

            header("Location: /login");
            
        }else if($this->getRoleUser() === "Administrateur"){
            
                 
            $categories = $this->CategorieModel->getAllCategories();
            
            $data = [
                'categories' => $categories
            ];
            
            $this->render("admin/categorie", $data);

        }else {

            $this->render("layouts/page404");

        }
            
  
    }

    public function showTags(){

        $this->checkSubmtion();

        if(empty($_SESSION["user_id"])){          

            header("Location: /login");
            
        }else if($this->getRoleUser() === "Administrateur"){
            
                 
            $tags = $this->TagModel->getAllTags();
        
            $data = [
                'tags' => $tags
            ];
            
            $this->render("admin/tags", $data);

        }else {

            $this->render("layouts/page404");

        }
       
    }

    public function deleteUser() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'];
            if ($this->UserModel->deleteUser($userId)) {
                
                header('Location: /dashboard');
                exit();
            } else {
                
                echo "<script>alert('Erreur lors de la suppression de l\'utilisateur');</script>";
            }
        }
        header('Location: /dashboard');
        exit();
    }

    public function updateUserStatus() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id']) && isset($_POST['status'])) {
            $userId = $_POST['user_id'];
            $newStatus = $_POST['status'];
            
            if ($this->UserModel->updateStatus($userId, $newStatus)) {
                header('Location: /dashboard/users');
                exit();
            } else {
                echo "<script>alert('Erreur lors de la mise à jour du statut');</script>";
                header('Location: /dashboard/users');
                exit();
            }
        }
        header('Location: /dashboard/users');
        exit();
    }

    public function addCategory() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $title = $_POST['nom'];
            
            if ($this->CategorieModel->addCategory($title)) {
                header('Location: /dashboard/categorie');
                exit();
            } else {
                echo "<script>alert('Erreur lors de l\'ajout de la catégorie');</script>";
                header('Location: /dashboard/categorie');
                exit();
            }
        }
        header('Location: /dashboard/categorie');
        exit();
    }

    public function deleteCategory() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_id'])) {
            $categoryId = $_POST['category_id'];
            
            if ($this->CategorieModel->deleteCategory($categoryId)) {
                $_SESSION['success'] = "Catégorie supprimée avec succès";
            } else {
                $_SESSION['error'] = "Erreur lors de la suppression de la catégorie";
            }
            
            header('Location: /dashboard/categorie');
            exit();
        }
        
        header('Location: /dashboard/categorie');
        exit();
    }

    public function addTag() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'])) {
            $name = $_POST['nom'];
            $arrayTag = explode(",",$name);
            $succes = false;

            foreach($arrayTag as $tag){
                if($this->TagModel->addTag($tag)){
                    $succes = true;
                }
            }

            if ($succes) {
                $_SESSION['success'] = "Tag ajouté avec succès";
            } else {
                $_SESSION['error'] = "Erreur lors de l'ajout du tag";
            }
            
            header('Location: /dashboard/tags');
            exit();
        }
        
        header('Location: /dashboard/tags');
        exit();
    }

    public function deleteTag() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tag_id'])) {
            $tagId = $_POST['tag_id'];
            
            if ($this->TagModel->deleteTag($tagId)) {
                $_SESSION['success'] = "Tag supprimé avec succès";
            } else {
                $_SESSION['error'] = "Erreur lors de la suppression du tag";
            }
            
            header('Location: /dashboard/tags');
            exit();
        }
        
        header('Location: /dashboard/tags');
        exit();

    }
}

