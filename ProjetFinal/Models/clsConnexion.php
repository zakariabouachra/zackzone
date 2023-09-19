<?php

class Connexion{

    private $servername = 'localhost';
    private $username = "root";
    private $password = "";
    private $dbname = "projet_cm2";
    public $con;


    //database connexion
    public function __construct()
    {
        $this->con =new mysqli($this->servername, $this->username, $this->password,$this->dbname);
        if($this->con->connect_error){
            die('problème de connexion avec la base de données ' .$this->con->connect_error);
        } 
        else{
            return $this->con;
        }
    }

    public function getConnexion(){
        if($this->con == null){
            new Connexion();
        }

        return $this->con;
    }
    
}




?>