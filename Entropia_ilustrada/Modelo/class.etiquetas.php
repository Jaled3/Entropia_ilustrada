<?php
/*Archivo para realizar consultas a la tabla de etiquetas*/
class etiquetas{
    private $db;

    public function __construct(){
        $this->db= new db();
    }

    /*Cargar todas las etiquetas*/
    public function mostrarEtiquetas(){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT * FROM etiquetas;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_result($nom);
        $consulta->execute();

        $lista = array();

        while($consulta->fetch()){
            $lista[] = $nom;
        }

        $consulta->close();

        return $lista;
    }

}

?>