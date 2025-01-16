<?php 
require_once (__DIR__.'/../models/User.php');


class AdminController extends BaseController {
 
    private $UserModel;

    public function __construct(){
        $this->UserModel = new User();
    }

    public function showDashboard() {
        // Récupérer tous les utilisateurs
        $users = $this->UserModel->getAllUsers();
        
        // Passer les données à la vue
        $data = [
            'users' => $users
        ];
        
        $this->render('admin/dashboard', $data);
    }

    public function showUsers(){
         // Récupérer tous les utilisateurs
         $users = $this->UserModel->getAllUsers();
        
         // Passer les données à la vue
         $data = [
             'users' => $users
         ];

        $this->render("admin/users" , $data);

    }

    public function showCategorie(){
        // Récupérer toutes les catégories
        $categories = $this->UserModel->getAllCategories();
        
        // Compter le nombre total de catégories
        $totalCategories = count($categories);
        
        // Passer les données à la vue
        $data = [
            'categories' => $categories,
            'totalCategories' => $totalCategories
        ];
        
        $this->render("admin/categorie", $data);
    }

    public function deleteUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'];
            if ($this->UserModel->deleteUser($userId)) {
                // Redirection vers le dashboard après suppression réussie
                header('Location: /dashboard');
                exit();
            } else {
                // En cas d'échec de suppression
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
            
            if ($this->UserModel->addCategory($title)) {
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
            
            if ($this->UserModel->deleteCategory($categoryId)) {
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
}

