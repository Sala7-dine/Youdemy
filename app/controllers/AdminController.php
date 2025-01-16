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
                header('Location: /dashboard');
                exit();
            } else {
                echo "<script>alert('Erreur lors de la mise à jour du statut');</script>";
                header('Location: /dashboard');
                exit();
            }
        }
        header('Location: /dashboard');
        exit();
    }
}

