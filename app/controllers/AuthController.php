<?php 
require_once (__DIR__.'/../models/User.php');
class AuthController extends BaseController {
 
    private $UserModel;
   public function __construct(){

      $this->UserModel = new User();
      
   }

   public function showRegister() {
      
    $this->render('auth/register');
   }
   public function showleLogin() {
      
    $this->render('auth/login');
   }
   
   public function handleRegister(){

      
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
         if (isset($_POST['submit'])) {
            
            $username = $_POST['username'];
            $email = $_POST['email'];
            $role = $_POST['account_type'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            
            if($password === $confirmpassword){

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                if($role === "Enseignant"){

                    $this->UserModel->register($username , $email , $hashed_password , $role , "inactive");
    
                 }else{
                    $this->UserModel->register($username , $email , $hashed_password , $role , "active");  
                 }

                header("Location: /login");

            }else{
                echo "<script>alert('Invalid password !!!')</script>";
            }
            
                //  $_SESSION['user_loged_in_id'] = $lastInsertId ;
                //  $_SESSION['user_loged_in_role'] = $role;
 
                //  if ($lastInsertId && $role == 1) {
                //      header('Location: admin/dashboard');
                //  } else if ($lastInsertId && $role == 2) {
                //      header('Location: client/dashboard');
                //  } else if ($lastInsertId && $role == 3) {
                //      header('Location: freelancer/dashboard');
                //  }                    
                 
                //  exit;
             
         }
     }
   }
       public function handleLogin(){


        if ($_SERVER["REQUEST_METHOD"] == "POST"){

          if (isset($_POST['submit'])) {

              $email = $_POST['email'];
              $password = $_POST['password'];
              
              $user = $this->UserModel->login($email, $password);
              
              if ($user) {
                  // Démarrer la session
                  session_start();
                  
                  // Stocker les informations de l'utilisateur
                  $_SESSION['user_id'] = $user['id'];
                  $_SESSION['user_role'] = $user['role'];
                  $_SESSION['user_name'] = $user['nom'];
                  
                  // Rediriger selon le rôle
                  if ($user['status'] === 'active') {
                      header("Location: /");
                  } else {
                      echo "<script>alert('Votre compte n\'est pas encore activé')</script>";
                      header("Location: /login");
                  }
                  exit();
              } else {
                  echo "<script>alert('Email ou mot de passe incorrect')</script>";
              }

            // var_dump($user);die();
            //   $_SESSION['user_loged_in_id'] = $user["id_utilisateur"];
            //   $_SESSION['user_loged_in_role'] = $role;
            //   $_SESSION['user_loged_in_nome'] = $user['nom_utilisateur'];
  
            //   if ($user && $role == 1) {
            //       header('Location: /admin/dashboard');
            //   } else if ($user && $role == 2) {
            //       header('Location: Client/dashboard.php');
            //   } else if ($user && $role == 3) {
            //       header('Location: Freelancer/dashboard.php');
            //   } 
             
          }
      }
 

   }

//    public function logout() {

      
//       // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
//       //  var_dump($_SESSION);die();
//         //  if (isset($_SESSION['user_loged_in_id']) && isset($_SESSION['user_loged_in_role'])) {
//         //      unset($_SESSION['user_loged_in_id']);
//         //      unset($_SESSION['user_loged_in_role']);
//         //      session_destroy();
            
//         //      header("Location: /login");
//         //      exit;
//         //  }
//    //   }
//    }



}