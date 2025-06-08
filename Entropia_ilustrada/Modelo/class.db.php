<?php
/*Creación de la conexión con la base de datos*/
class db{
    private $conn;

    public function __construct(){
        require_once('../cred.php');
        $this->conn= new mysqli("localhost",USU_CONN,PSW_CONN,"entropia");
        $this->conn->set_charset('utf8');
    }

    public function __get($nom){
        return $this->$nom;
    }
}

?>