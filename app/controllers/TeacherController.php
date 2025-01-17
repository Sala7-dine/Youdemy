<?php 
require_once (__DIR__.'/../models/User.php');


class TeacherController extends BaseController {
 
    private $UserModel;

    public function __construct(){
        $this->UserModel = new User();
    }


    public function showTeacherDashboard(){

        $this->render("enseignant/dashboard");

    }

    public function showTeacherCours(){

        $this->render("enseignant/mes_cours");

    }



}

