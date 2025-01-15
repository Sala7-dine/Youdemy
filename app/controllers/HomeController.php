<?php 
require_once (__DIR__.'/../models/User.php');
class HomeController extends BaseController {
 
    private $UserModel;
//    public function __construct(){

//       $this->UserModel = new User();

      
//    }

   public function showHome() {
      
    $this->render('courses/index');
    
   }
   
   


}