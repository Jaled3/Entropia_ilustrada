<?php
/*Archivo para realizar consultas a la tabla de likes*/
class likes{
    private $db;

    public function __construct(){
        $this->db= new db();
    }

    /*Cargar la cantidad de likes que tiene una publicacion*/
    public function cargarCantidadLikes(Int $i){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT COUNT(*) FROM likes WHERE Idpublicacion = ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $i);
        $consulta->bind_result($i);
        $consulta->execute();

        $lista = array();

        if($consulta->fetch()){
            $cantidad= $i;
        }

        $consulta->close();

        return $cantidad;
    }

    /*Comprobar si el usuario ya le ha dado like a la publicacion*/
    public function compPublicacionLike(Int $idu, Int $idp){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT COUNT(*) FROM likes WHERE Idusuario = ? AND Idpublicacion = ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("ii", $idu, $idp);
        $consulta->bind_result($i);
        $consulta->execute();

        $lista = array();
        
        $cantidad = 0;

        if($consulta->fetch()){
            $cantidad = $i;
        }

        $consulta->close();

        return $cantidad;
    }

    /*Enviar like a la publicacion donde esté el usuario actual*/
    public function publicarLike(Int $idu, Int $idp){
        $conn = $this->db->__get("conn");
        $sentencia = "INSERT INTO likes(Idusuario, Idpublicacion) VALUES (?, ?);";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("ii", $idu, $idp);
            $consulta->execute();

            $consulta->close();

    }

    /*Borrar like de una publicacion*/
    public function quitarLike(Int $idu, Int $idp){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM likes WHERE Idusuario = ? AND Idpublicacion = ?;";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("ii", $idu, $idp);
            $consulta->execute();

            $consulta->close();

    }

    /*Borrar todos los likes de un usuario también, los likes de los usuarios que le han dado me gusta a las publicaciones del usuario original*/
    public function BorrarTodoLikeUsu(Int $idrep){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM likes WHERE Idusuario = ? OR Idpublicacion IN (Select Id from publicacion where Idusuario = ?);";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("ii", $idrep, $idrep);
            $consulta->execute();

            $consulta->close();

    }

    /*Borrar todos los likes de una publicacion*/
    public function BorrarTodoLikePubli(Int $idPub){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM likes WHERE Idpublicacion = ?;";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("i", $idPub);
            $consulta->execute();

            $consulta->close();

    }

}

?>