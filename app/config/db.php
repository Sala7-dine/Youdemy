<?php 

class db {

    protected $conn ;

    public function __construct()
    {
    
            $this->conn = new PDO("mysql:host=localhost;dbname=youdemy", "root", "1234");
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
    }

}