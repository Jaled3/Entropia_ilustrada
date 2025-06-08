<?php
/*Archivo para realizar consultas a la tabla de comentarios*/
class comentarios{
    private $db;

    public function __construct(){
        $this->db= new db();
    }

    /*Se cargarán todos los comentarios de la publicación, se irán cargando de 10 en 10*/
    public function cargarComentariosPost(Int $i, Int $offset, Int $limit){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT comentarios.Id, comentarios.texto, DATE_FORMAT(comentarios.fecha, '%d-%m-%Y'), usuarios.nombre, usuarios.foto, comentarios.Idusuario, comentarios.Idpublicacion FROM comentarios, usuarios WHERE comentarios.Idusuario=usuarios.Id AND comentarios.Idpublicacion = ? ORDER BY comentarios.fecha DESC LIMIT ? OFFSET ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("iii", $i, $limit, $offset);
        $consulta->bind_result($iComenPost, $tex, $fec, $nom, $fot, $idu, $ipub);
        $consulta->execute();

        $lista = array();

        while($consulta->fetch()){
            $lista[$iComenPost] = [$fot, $nom, $fec, $tex, $idu, $ipub];
        }

        $consulta->close();

        return $lista;
    }

    /*Subir comentario a la publicacion*/
    public function publicarComentario(String $tex, String $fec, Int $Iusu, Int $Ipub){
        $conn = $this->db->__get("conn");
        $sentencia = "INSERT INTO comentarios(texto, fecha, Idusuario, Idpublicacion) VALUES (?, ?, ?, ?);";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("ssii", $tex, $fec, $Iusu, $Ipub);
            $consulta->execute();

            $consulta->close();
    }

    /*Borrar comentario en una publicacion*/
    public function quitarComentario(Int $idcom){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM comentarios WHERE Id = ?;";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("i", $idcom);
            $consulta->execute();

            $consulta->close();

    }

    /*Borrar todos los comentarios de un usuario, también se eliminará, los comentarios de otros usuarios que hayan comentado en las publicaciones del usuario original*/
    public function BorrarTodoComentarioUsu(Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM comentarios WHERE Idusuario = ? OR Idpublicacion IN (Select Id from publicacion where Idusuario = ?);";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("ii", $idUsu, $idUsu);
            $consulta->execute();

            $consulta->close();

    }

    /*Borrar todos los comentarios de una publicacion específica*/
    public function BorrarTodoComentarioPubli(Int $idPub){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM comentarios WHERE Idpublicacion = ?;";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("i", $idPub);
            $consulta->execute();

            $consulta->close();

    }

}

?>