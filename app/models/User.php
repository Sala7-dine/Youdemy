<?php 
require_once(__DIR__.'/../config/db.php');
class User extends db {

public function __construct()
{
    parent::__construct();
}

public function register($username , $email , $password , $role , $status){

     // Prepare and execute the insertion query
     $result = $this->conn->prepare("INSERT INTO utilisateur (nom, email , mot_de_passe , role , status) VALUES (:username , :email, :password , :role , :status)");
     $result->bindParam(":username" , $username);
     $result->bindParam(":email" , $email);
     $result->bindParam(":password" , $password);
     $result->bindParam(":role" , $role);
     $result->bindParam(":status" , $status);
   
    try {
       
        $result->execute();
        return $this->conn->lastInsertId();
        
       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

public function login($email , $password){
    
    $result = $this->conn->prepare("SELECT * FROM utilisateur WHERE email=:email");
    $result->bindParam(":email" , $email);

    try {
        $result->execute();
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password , $user["mot_de_passe"])){
           return  $user;
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

public function getStatistics() {
    $statistics = [];

    // Total number of users
    $query = $this->conn->prepare("SELECT COUNT(*) AS total_users FROM utilisateurs");
    $query->execute();
    $statistics['total_users'] = $query->fetch(PDO::FETCH_ASSOC)['total_users'];

    // Total number of published projects
    $query = $this->conn->prepare("SELECT COUNT(*) AS total_projects FROM projets");
    $query->execute();
    $statistics['total_projects'] = $query->fetch(PDO::FETCH_ASSOC)['total_projects'];

    // Total number of freelancers
    $query = $this->conn->prepare("SELECT COUNT(*) AS total_freelancers FROM utilisateurs WHERE role = '3'");
    $query->execute();
    $statistics['total_freelancers'] = $query->fetch(PDO::FETCH_ASSOC)['total_freelancers'];

    // Number of ongoing offers (status = 2)
    $query = $this->conn->prepare("SELECT COUNT(*) AS ongoing_offers FROM offres WHERE status = 2");
    $query->execute();
    $statistics['ongoing_offers'] = $query->fetch(PDO::FETCH_ASSOC)['ongoing_offers'];

    return $statistics;
}

public function getAllUsers($filter, $userToSearch =''){


      
        $query = "SELECT * FROM utilisateurs WHERE role != 1"; // by default we show all users except admins
        
        // add filter to query
        if ($filter == 'clients') {
            $query .= " AND role = 2";
        } elseif ($filter == 'freelancers') {
            $query .= " AND role = 3";
        }
        
        // add search condition to query
        if ($userToSearch) {
            $query .= " AND nom_utilisateur LIKE ?";
        }
        
        $resul = $this->conn->prepare($query);
        $resul->execute($userToSearch ? ["%$userToSearch%"] : []);
        
        // Fetch and return results
        $users = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $users;
   

}

}