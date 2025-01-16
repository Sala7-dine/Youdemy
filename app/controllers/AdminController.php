<?php 
require_once (__DIR__.'/../models/User.php');


class AdminController extends BaseController {
 
    private $UserModel;
    private $AdminModel;

    public function __construct(){

      $this->UserModel = new User();
      
   }

   public function showDashboard() {
      
    $this->render('admin/dashboard');
    
   }

   
 

}

