<?php
/*Archivo para realizar consultas a la tabla de publicaciones*/
class publicaciones{
    private $db;

    public function __construct(){
        $this->db= new db();
    }

    /*Se cargarán todas las publicaciones en el inicio de la página, se irán mostrando de 10 en 10 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function publicacionesInicio(Int $offset, Int $limit) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT Id, nombre, foto FROM publicacion WHERE tipo='terminado' AND visualizacion='mostrar' ORDER BY Id DESC LIMIT ? OFFSET ?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("ii", $limit, $offset);
        $consulta->execute();
        $consulta->bind_result($i, $nom, $fot);
    
        $lista = array();
        while ($consulta->fetch()) {
            $lista[$i] = [$nom, $fot];
        }
        
        $consulta->close();
        return $lista;
    }

    /*Se cargarán todas las publicaciones que coincidan que lo introducido en la barra de búsqueda, se irán mostrando de 10 en 10 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function publicacionesBuscaNombre(Int $offset, Int $limit, String $nomb) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT Id, nombre, foto FROM publicacion WHERE tipo='terminado' AND nombre LIKE ? AND visualizacion='mostrar' ORDER BY Id DESC LIMIT ? OFFSET ?;";
    
        $buscador = "%$nomb%";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("sii", $buscador, $limit, $offset);
        $consulta->execute();
        $consulta->bind_result($i, $nom, $fot);
    
        $lista = array();
        while ($consulta->fetch()) {
            $lista[$i] = [$nom, $fot];
        }
        
        $consulta->close();
        return $lista;
    }

    /*Se cargarán todas las publicaciones que coincidan con la categoría, se irán mostrando de 10 en 10 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function publicacionesBuscaCatego(String $nomb, Int $offset, Int $limit) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT Id, nombre, foto FROM publicacion WHERE tipo='terminado' AND categoria = ? AND visualizacion='mostrar' ORDER BY Id DESC LIMIT ? OFFSET ?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("sii", $nomb, $limit, $offset);
        $consulta->execute();
        $consulta->bind_result($i, $nom, $fot);
    
        $lista = array();
        while ($consulta->fetch()) {
            $lista[$i] = [$nom, $fot];
        }
        
        $consulta->close();
        return $lista;
    }

    /*Se cargarán todas las publicaciones que pertenezcan a un usuario en específico, se irán mostrando de 10 en 10 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function publicacionesIdUsuario(Int $Idusu, Int $offset, Int $limit) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT Id, nombre, foto FROM publicacion WHERE tipo='terminado' AND Idusuario = ? AND visualizacion='mostrar' ORDER BY Id DESC LIMIT ? OFFSET ?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("iii", $Idusu, $limit, $offset);
        $consulta->execute();
        $consulta->bind_result($i, $nom, $fot);
    
        $lista = array();
        while ($consulta->fetch()) {
            $lista[$i] = [$nom, $fot];
        }
        
        $consulta->close();
        return $lista;
    }

    /*Se cargarán todas las publicaciones favoritas de un usuario en específico, se irán mostrando de 10 en 10 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function publicacionesFavoritasIdUsuario(Int $Idusu, Int $offset, Int $limit) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT publicacion.Id, publicacion.nombre, publicacion.foto FROM publicacion, likes WHERE likes.Idpublicacion = publicacion.Id AND tipo='terminado' AND likes.Idusuario = ? AND visualizacion='mostrar' ORDER BY likes.Id DESC LIMIT ? OFFSET ?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("iii", $Idusu, $limit, $offset);
        $consulta->execute();
        $consulta->bind_result($i, $nom, $fot);
    
        $lista = array();
        while ($consulta->fetch()) {
            $lista[$i] = [$nom, $fot];
        }
        
        $consulta->close();
        return $lista;
    }

    /*Se cargarán todas las publicaciones de tipo BOCETO de un usuario en específico, se irán mostrando de 10 en 10 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function publicacionesBocetoIdUsuario(Int $Idusu, Int $offset, Int $limit) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT Id, nombre, foto FROM publicacion WHERE tipo='boceto' AND Idusuario = ? AND visualizacion='mostrar' ORDER BY Id DESC LIMIT ? OFFSET ?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("iii", $Idusu, $limit, $offset);
        $consulta->execute();
        $consulta->bind_result($i, $nom, $fot);
    
        $lista = array();
        while ($consulta->fetch()) {
            $lista[$i] = [$nom, $fot];
        }
        
        $consulta->close();
        return $lista;
    }

    /*Se cargará toda la información de la publicación*/
    public function cargarPost(Int $id){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT publicacion.Id, usuarios.foto, usuarios.nombre, publicacion.nombre, descripcion, publicacion.foto, categoria, DATE_FORMAT(publicacion.fecha, '%d-%m-%Y'), publicacion.Idusuario, publicacion.visualizacion FROM publicacion, usuarios WHERE publicacion.Idusuario=usuarios.Id AND publicacion.Id = ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $id);
        $consulta->bind_result($i, $fotUsu, $nomUsu, $nomPub, $desc, $fot, $cat, $fec, $pubUsu, $tip);
        $consulta->execute();

        $lista = array();

        if($consulta->fetch()){
            $lista = [$i, $fotUsu, $nomUsu, $nomPub, $desc, $fot, $cat, $fec, $pubUsu, $tip];
        }

        $consulta->close();

        return $lista;
    } 
    
    /*Se obtendrá los datos de la publicacion para posteriormente, ser editados*/
    public function datosPublicacion(Int $id_pub) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT foto, nombre, descripcion FROM publicacion WHERE Id = ?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $id_pub);
        $consulta->execute();
        $consulta->bind_result($fot, $nom, $des);
    
        $lista2 = array();
        while ($consulta->fetch()) {
            $lista2 = [$fot, $nom, $des];
        }
        
        $consulta->close();
        return $lista2;
    }

    /*Obtener la foto de la publicación a través de la Id*/
    public function publiFoto(Int $idu) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT foto FROM publicacion WHERE Id = ?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $idu);
        $consulta->bind_result($res);
        $consulta->execute();
        $nomFot = "";

        if($consulta->fetch()){
            $nomFot = $res;
        }
        
        $consulta->close();
        return $nomFot;
    }

    /*Comprobar si existe la publicación*/
    public function publiId(Int $i) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT COUNT(*) FROM publicacion WHERE Id = ?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $i);
        $consulta->bind_result($count);

        $consulta->execute();
        $consulta->fetch();
        $res = false;

        if($count==1){
            $res = true;
        }
        
        $consulta->close();
        return $res;
    }

    /*Comprobar que la publicación no esté oculta*/
    public function publiCompVisualizacion(Int $i) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT COUNT(*) FROM publicacion WHERE Id = ? AND visualizacion='mostrar';";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $i);
        $consulta->bind_result($count);

        $consulta->execute();
        $consulta->fetch();
        $res = false;

        if($count==1){
            $res = true;
        }
        
        $consulta->close();
        return $res;
    }

    /*Subir una Publicacion*/
    public function subPubli(String $nom, String $des, String $fot, String $tip, String $cate, Int $due, String $fec){
        $conn = $this->db->__get("conn");
        $sentencia = "INSERT INTO publicacion(nombre, descripcion, foto, tipo, categoria, Idusuario, fecha, visualizacion) VALUES (?, ?, ?, ?, ?, ?, ?, 'mostrar');";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("sssssis", $nom, $des, $fot, $tip, $cate, $due, $fec);
            $consulta->execute();

            $consulta->close();
    }

    /*Se actualizarán los datos de una publicacion*/
    public function actualizarPublicacion(String $nom, String $des, String $ti, String $cat, Int $id_pub) {
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE publicacion SET nombre=?, descripcion=?, tipo=?, categoria=? WHERE Id=?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("ssssi", $nom, $des, $ti, $cat, $id_pub);
        $consulta->execute();
        
        $consulta->close();
    }

    /*La publicacion se ocultará*/
    public function ocultarPublicacion(Int $id_pub) {
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE publicacion SET visualizacion='oculta' WHERE Id=?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $id_pub);
        $consulta->execute();
        
        $consulta->close();
    }

    /*La publicacion se mostrará*/
    public function mostrarPublicacion(Int $id_pub) {
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE publicacion SET visualizacion='mostrar' WHERE Id=?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $id_pub);
        $consulta->execute();
        
        $consulta->close();
    }

    /*Todas las publicaciones de un usuario se ocultarán*/
    public function ocultarTodaPublicacionUsu(Int $idu) {
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE publicacion SET visualizacion='oculta' WHERE Idusuario=?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $idu);
        $consulta->execute();
        
        $consulta->close();
    }

    /*Todas las publicaciones de un usuario se volverán a mostrar*/
    public function mostrarTodaPublicacionUsu(Int $idu) {
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE publicacion SET visualizacion='mostrar' WHERE Idusuario=?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $idu);
        $consulta->execute();
        
        $consulta->close();
    }

    /*Borrar todas las publicaciones hechas por un usuario*/
    public function BorrarTodaPubliUsu(Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM publicacion WHERE Idusuario = ?;";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("i", $idUsu);
            $consulta->execute();

            $consulta->close();
    }

    /*Borrar publicacion específica de un usuario*/
    public function BorrarPubliUsu(Int $idpub){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM publicacion WHERE Id = ?;";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("i", $idpub);
            $consulta->execute();

            $consulta->close();
    }

}

?>