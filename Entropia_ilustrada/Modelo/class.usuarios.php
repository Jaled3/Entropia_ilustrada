<?php
/*Archivo para realizar consultas a la tabla de usuarios*/
class usuarios{
    private $db;

    public function __construct(){
        $this->db= new db();
    }

    /*Se cargarán todas los usuarios en la parte de Administrador, se irán mostrando de 10 en 10 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function usuariosAdminitrador(Int $offset, Int $limit) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT Id, nombre, tipo, foto, DATE_FORMAT(fecha, '%d-%m-%Y'), correo FROM usuarios ORDER BY Id DESC LIMIT ? OFFSET ?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("ii", $limit, $offset);
        $consulta->execute();
        $consulta->bind_result($i, $nom, $tip, $fot, $fec, $cor);
    
        $lista = array();
        while ($consulta->fetch()) {
            $lista[$i] = [$nom, $tip, $fot, $fec, $cor];
        }
        
        $consulta->close();
        return $lista;
    }

    /*Se cargarán todas los usuarios en la parte de Administrador según el nombre insertado, se irán mostrando de 10 en 10 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function usuariosAdminitradorBuscar(Int $offset, Int $limit, String $nomb) {
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT Id, nombre, tipo, foto, DATE_FORMAT(fecha, '%d-%m-%Y'), correo FROM usuarios WHERE nombre LIKE ? ORDER BY Id DESC LIMIT ? OFFSET ?;";
    
        $buscador = "%$nomb%";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("sii", $buscador, $limit, $offset);
        $consulta->execute();
        $consulta->bind_result($i, $nom, $tip, $fot, $fec, $cor);
    
        $lista = array();
        while ($consulta->fetch()) {
            $lista[$i] = [$nom, $tip, $fot, $fec, $cor];
        }
        
        $consulta->close();
        return $lista;
    }

    /*Obtener los datos del perfil de usuario*/
    public function perfilUsuario(Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT nombre, foto, biografia, DATE_FORMAT(fecha, '%d-%m-%Y'), Id FROM usuarios WHERE Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_result($nombre, $fot, $bio, $fec, $i);
        $consulta->bind_param("i", $idUsu);
        $consulta->execute();
        
        $lista = array();
        if ($consulta->fetch()) {
            $lista = [$nombre, $fot, $bio, $fec, $i];
        }

        $consulta->close();

        return $lista;
    }

    /*Obtener los datos del perfil de usuario para posteriormente ser modificados*/
    public function modificarPerfUsu(Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT foto, nombre, biografia, correo FROM usuarios WHERE Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_result($fot, $nombre, $bio, $cor);
        $consulta->bind_param("i", $idUsu);
        $consulta->execute();
        
        $lista = array();
        if ($consulta->fetch()) {
            $lista = [$fot, $nombre, $bio, $cor];
        }

        $consulta->close();

        return $lista;
    }

    /*Obtener los datos del perfil de usuario, para ser modificados en la parte de Administrador*/
    public function modificarPerfUsuAdministrador(Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT foto, nombre, biografia, correo, tipo, Id FROM usuarios WHERE Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_result($fot, $nombre, $bio, $cor, $tip, $idUsuario);
        $consulta->bind_param("i", $idUsu);
        $consulta->execute();
        
        $lista = array();
        if ($consulta->fetch()) {
            $lista = [$fot, $nombre, $bio, $cor, $tip, $idUsuario];
        }

        $consulta->close();

        return $lista;
    }

    /*Obtener la foto del usuario actual*/
    public function obtenerUrlImagen(Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT foto FROM usuarios WHERE Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_result($fot);
        $consulta->bind_param("i", $idUsu);
        $consulta->execute();
        
        if ($consulta->fetch()) {
            $fotoUsu = $fot;
        }

        $consulta->close();

        return $fotoUsu;
    }

    /*Obtener el id del usuario*/
    public function obtenerIdUsu(String $nom){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT Id FROM usuarios WHERE nombre=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_result($nom);
        $consulta->bind_param("s", $nom);
        $consulta->execute();
        
        if($consulta->fetch()){
            $idUsu = $nom;
        }

        $consulta->close();

        return $idUsu;
    }

    /*Obtener el correo del usuario mediante el Id*/
    public function obtenerCorreoUsu(Int $Iusu){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT correo FROM usuarios WHERE Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_result($corrU);
        $consulta->bind_param("i", $Iusu);
        $consulta->execute();
        
        if($consulta->fetch()){
            $correUsu = $corrU;
        }

        $consulta->close();

        return $correUsu;
    }

    /*Obtener el nombre del usuario mediante el Id*/
    public function obtenerNombUsu(Int $Iusu){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT nombre FROM usuarios WHERE Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_result($nom);
        $consulta->bind_param("i", $Iusu);
        $consulta->execute();
        
        if($consulta->fetch()){
            $NombUsu = $nom;
        }

        $consulta->close();

        return $NombUsu;
    }

    /*Obtener la Id del usuario mediante el la Id de una publicacion*/
    public function obtenerIdUsuPublicacion(Int $Ipub){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT usuarios.Id FROM usuarios, publicacion WHERE usuarios.Id=publicacion.Idusuario AND publicacion.Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_result($res);
        $consulta->bind_param("i", $Ipub);
        $consulta->execute();
        
        if($consulta->fetch()){
            $idUsu = $res;
        }

        $consulta->close();

        return $idUsu;
    }

    /*Obtener la contraseña encriptada de la bd para después compararla con la insertada en el login*/
    public function loginUsuario(String $nombre){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT contrasenia FROM usuarios WHERE BINARY nombre=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("s",$nombre);
        $consulta->bind_result($hashAlmacenado);

        $consulta->execute();
        $consulta->fetch();

        $consulta->close();

        return $hashAlmacenado;
    }

    /*Obtener la contraseña encriptada de la bd para comprobar que el usuario sabe su contraseña actual*/
    public function contraActualUsuario(Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT contrasenia FROM usuarios WHERE Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i",$idUsu);
        $consulta->bind_result($hashAlmacenado);

        $consulta->execute();
        $consulta->fetch();

        $consulta->close();

        return $hashAlmacenado;
    }

    /*Comprobar que el usuario es el dueño de ese correo*/
    public function compCorreoUsu(String $corre, Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT COUNT(*) FROM usuarios WHERE correo=? AND Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_result($count);
        $consulta->bind_param("si", $corre, $idUsu);
        $consulta->execute();
        $consulta->fetch();
        
        $existe=false;

        if($count==1){
            $existe = true;
        }

        $consulta->close();

        return $existe;
    }

    /*Actualizar el perfil del usuario*/
    public function actualizarPerfUsu(String $nom, String $fot, String $bio, String $cor, Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE usuarios SET nombre=?, foto=?, biografia=?, correo=? WHERE Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("ssssi", $nom, $fot, $bio, $cor, $idUsu);
        $consulta->execute();
        
        $consulta->close();
    }

    /*Actualizar el perfil del usuario de la parte de Administrador*/
    public function actualizarPerfUsuAdministrador(String $nom, String $fot, String $bio, String $cor, String $tip, Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE usuarios SET nombre=?, foto=?, biografia=?, correo=?, tipo=? WHERE Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("sssssi", $nom, $fot, $bio, $cor, $tip, $idUsu);
        $consulta->execute();
        
        $consulta->close();
    }

    /*Actualizar la contraseña del usuario*/
    public function modificarContraUsu(String $con, Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE usuarios SET contrasenia=? WHERE Id=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("si", $con, $idUsu);
        $consulta->execute();
       
        $consulta->close();
    }

    /*Comprobar si el tipo de usuario es suspendido, se le negará el acceso a la aplicacion*/
    public function compTipo(String $nombre){
        $acceso = false;

        $conn = $this->db->__get("conn");
        $sentencia = "SELECT tipo FROM usuarios WHERE nombre=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("s", $nombre);
        $consulta->bind_result($estado);

        $consulta->execute();      
        $consulta->fetch();
        
        if(strcmp($estado, "suspendido") == 0){
            $acceso = true;
        }

        $consulta->close();

        return $acceso;
    }

    /*Si el usuario es admin, se cargará la vista de admin*/
    public function compAdmin(String $nombre){
        $acceso = false;

        $conn = $this->db->__get("conn");
        $sentencia = "SELECT tipo FROM usuarios WHERE nombre=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("s", $nombre);
        $consulta->bind_result($estado);

        $consulta->execute();      
        $consulta->fetch();
        
        if(strcmp($estado, "administrador") == 0){
            $acceso = true;
        }

        $consulta->close();

        return $acceso;
    }

    /*Comprobar que el nombre de usuario no esté registrado*/
    public function compUsuario(String $nombre){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT COUNT(*) FROM usuarios WHERE BINARY nombre=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("s",$nombre);
        $consulta->bind_result($count);

        $consulta->execute();
        $consulta->fetch();

        $existe=false;

        if($count==1){
            $existe = true;
        }

        $consulta->close();

        return $existe;
    }

    /*Comprobar que el correo del usuario no esté registrado*/
    public function compUsuarioCorreo(String $cor){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT COUNT(*) FROM usuarios WHERE BINARY correo=?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("s",$cor);
        $consulta->bind_result($count);

        $consulta->execute();
        $consulta->fetch();

        $existe=false;

        if($count==1){
            $existe = true;
        }

        $consulta->close();

        return $existe;
    }

    /*Inserción de un nuevo usuario*/
    public function inserUsuario(String $nom, String $con, String $fot, String $bio, String $fec, String $corre){
        $conn = $this->db->__get("conn");
        $sentencia = "INSERT INTO usuarios(nombre, contrasenia, tipo, foto, biografia, fecha, correo) VALUES (?, ?, 'registrado', ?, ?, ?, ?);";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("ssssss", $nom, $con, $fot, $bio, $fec, $corre);
            $consulta->execute();

            $consulta->close();
    }

    /*Inserción de un nuevo usuario incluyendo el tipo de usuario*/
    public function inserUsuarioAdministrador(String $nom, String $con, String $fot, String $tip, String $bio, String $fec, String $corre){
        $conn = $this->db->__get("conn");
        $sentencia = "INSERT INTO usuarios(nombre, contrasenia, tipo, foto, biografia, fecha, correo) VALUES (?, ?, ?, ?, ?, ?, ?);";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("sssssss", $nom, $con, $fot, $tip, $bio, $fec, $corre);
            $consulta->execute();

            $consulta->close();
    }

    /*Borrar a un usuario*/
    public function BorrarUsu(Int $idrep){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM usuarios WHERE Id = ?;";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("i", $idrep);
            $consulta->execute();

            $consulta->close();
    }

}

?>