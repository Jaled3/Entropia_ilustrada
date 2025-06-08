<?php
/*Archivo para realizar consultas a la tabla de reportes*/
class reportes{
    private $db;

    public function __construct(){
        $this->db= new db();
    }

    /*Cargar todos los reportes de la aplicación, se irán mostrando de 6 en 6 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function cargarReportes(Int $offset = 0, Int $limit = 6){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT reportes.Id, reportado.foto, publicacion.foto, reportes.titulo, reportes.descripcion, reportes.estado, DATE_FORMAT(reportes.fecha, '%d-%m-%Y'), reportes.Idpublicacion, reportes.Idreportado, reportado.nombre AS nombre_reportado, reportante.nombre AS nombre_reportante, reportante.foto AS foto_reportante, reportes.Idusuario FROM reportes LEFT JOIN usuarios AS reportante ON reportes.Idusuario = reportante.Id LEFT JOIN usuarios AS reportado ON reportes.Idreportado = reportado.Id LEFT JOIN publicacion ON reportes.Idpublicacion = publicacion.Id WHERE reportes.estado = 'activo' ORDER BY reportes.Id DESC LIMIT ? OFFSET ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("ii", $limit, $offset);
        $consulta->bind_result($i, $fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante);
        $consulta->execute();

        $lista = array();

        while($consulta->fetch()){
            $lista[$i] = [$fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante];
        }

        $consulta->close();

        return $lista;
    }

    /*Cargar reportes de la aplicación de un usuario específico, se irán mostrando de 6 en 6 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function cargarReportesBuscador(Int $idReporta, String $esta, Int $offset = 0, Int $limit = 6){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT reportes.Id, reportado.foto, publicacion.foto, reportes.titulo, reportes.descripcion, reportes.estado, DATE_FORMAT(reportes.fecha, '%d-%m-%Y'), reportes.Idpublicacion, reportes.Idreportado, reportado.nombre AS nombre_reportado, reportante.nombre AS nombre_reportante, reportante.foto AS foto_reportante, reportes.Idusuario FROM reportes LEFT JOIN usuarios AS reportante ON reportes.Idusuario = reportante.Id LEFT JOIN usuarios AS reportado ON reportes.Idreportado = reportado.Id LEFT JOIN publicacion ON reportes.Idpublicacion = publicacion.Id WHERE reportes.Idreportado = ? AND reportes.estado = ? ORDER BY reportes.Id DESC LIMIT ? OFFSET ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("isii", $idReporta, $esta, $limit, $offset);
        $consulta->bind_result($i, $fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante);
        $consulta->execute();

        $lista = array();

        while($consulta->fetch()){
            $lista[$i] = [$fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante];
        }

        $consulta->close();

        return $lista;
    }

    /*Cargar todos los reportes del usuario en su Perfil, se irán mostrando de 6 en 6 a medida que se vaya haciendo arrastrando hacia abajo*/
    public function cargarReportesUsuario(Int $idu, Int $offset = 0, Int $limit = 6){
        $conn = $this->db->__get("conn");
              
        $sentencia = "SELECT reportes.Id, reportado.foto, publicacion.foto, reportes.titulo, reportes.descripcion, reportes.estado, DATE_FORMAT(reportes.fecha, '%d-%m-%Y'), reportes.Idpublicacion, reportes.Idreportado, reportado.nombre AS nombre_reportado, reportante.nombre AS nombre_reportante, reportante.foto AS foto_reportante, reportes.Idusuario FROM reportes LEFT JOIN usuarios AS reportante ON reportes.Idusuario = reportante.Id LEFT JOIN usuarios AS reportado ON reportes.Idreportado = reportado.Id LEFT JOIN publicacion ON reportes.Idpublicacion = publicacion.Id WHERE reportes.Idusuario = ? ORDER BY reportes.Id DESC LIMIT ? OFFSET ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("iii", $idu, $limit, $offset);
        $consulta->bind_result($i, $fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante);
        $consulta->execute();

        $lista = array();

        while($consulta->fetch()){
            $lista[$i] = [$fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante];
        }

        $consulta->close();

        return $lista;
    }

    /*Cargar un reporte en específico en el perfil de usuario*/
    public function cargarReporteEspecifico(Int $idu, Int $ipub){
        $conn = $this->db->__get("conn");
              
        $sentencia = "SELECT reportes.Id, reportado.foto, publicacion.foto, reportes.titulo, reportes.descripcion, reportes.estado, DATE_FORMAT(reportes.fecha, '%d-%m-%Y'), reportes.Idpublicacion, reportes.Idreportado, reportado.nombre AS nombre_reportado, reportante.nombre AS nombre_reportante, reportante.foto AS foto_reportante, reportes.Idusuario, reportes.respuesta FROM reportes LEFT JOIN usuarios AS reportante ON reportes.Idusuario = reportante.Id LEFT JOIN usuarios AS reportado ON reportes.Idreportado = reportado.Id LEFT JOIN publicacion ON reportes.Idpublicacion = publicacion.Id WHERE reportes.Idusuario = ? AND publicacion.Id = ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("ii", $idu, $ipub);
        $consulta->bind_result($i, $fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado , $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante, $respues);
        $consulta->execute();

        $lista = array();

        if($consulta->fetch()){
            $lista = [$i, $fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante, $respues];
        }

        $consulta->close();

        return $lista;
    }

    /*Cargar un reporte hecho a un PERFIL en específico en el perfil de usuario*/
    public function cargarReporteEspecificoPefil(Int $idu, Int $iperf){
        $conn = $this->db->__get("conn");
              
        $sentencia = "SELECT reportes.Id, reportado.foto, publicacion.foto, reportes.titulo, reportes.descripcion, reportes.estado, DATE_FORMAT(reportes.fecha, '%d-%m-%Y'), reportes.Idpublicacion, reportes.Idreportado, reportado.nombre AS nombre_reportado, reportante.nombre AS nombre_reportante, reportante.foto AS foto_reportante, reportes.Idusuario, reportes.respuesta FROM reportes LEFT JOIN usuarios AS reportante ON reportes.Idusuario = reportante.Id LEFT JOIN usuarios AS reportado ON reportes.Idreportado = reportado.Id LEFT JOIN publicacion ON reportes.Idpublicacion = publicacion.Id WHERE reportes.Idpublicacion IS NULL AND reportes.Idusuario = ? AND reportes.Idreportado = ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("ii", $idu, $iperf);
        $consulta->bind_result($i, $fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante, $respues);
        $consulta->execute();

        $lista = array();

        if($consulta->fetch()){
            $lista = [$i, $fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante, $respues];
        }

        $consulta->close();

        return $lista;
    }

    /*Cargar un reporte específico solo con la ID del reporte*/
    public function cargarReporteEspecificoIdReporte(Int $idRep){
        $conn = $this->db->__get("conn");
              
        $sentencia = "SELECT reportes.Id, reportado.foto, publicacion.foto, reportes.titulo, reportes.descripcion, reportes.estado, DATE_FORMAT(reportes.fecha, '%d-%m-%Y'), reportes.Idpublicacion, reportes.Idreportado, reportado.nombre AS nombre_reportado, reportante.nombre AS nombre_reportante, reportante.foto AS foto_reportante, reportes.Idusuario, reportes.respuesta FROM reportes LEFT JOIN usuarios AS reportante ON reportes.Idusuario = reportante.Id LEFT JOIN usuarios AS reportado ON reportes.Idreportado = reportado.Id LEFT JOIN publicacion ON reportes.Idpublicacion = publicacion.Id WHERE reportes.Id = ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $idRep);
        $consulta->bind_result($i, $fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante, $respues);
        $consulta->execute();

        $lista = array();

        if($consulta->fetch()){
            $lista = [$i, $fot, $fotPubli, $tit, $des, $est, $fec, $repIdpub, $idRepor, $nomReportado, $nomUsuarioReportante, $fotUsuarioReportante, $IdUsuarioReportante, $respues];
        }

        $consulta->close();

        return $lista;
    }

    /*Comprobar si el usuario ya le ha hecho un reporte a un Usuario específico*/
    public function compPerfilRep(Int $idu, String $nomUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT COUNT(*) FROM reportes, usuarios WHERE reportes.Idreportado=usuarios.Id AND reportes.Idpublicacion IS NULL AND reportes.Idusuario = ? AND usuarios.nombre = ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("is", $idu, $nomUsu);
        $consulta->bind_result($i);
        $consulta->execute();
       
        $cantidad = 0;

        if($consulta->fetch()){
            $cantidad = $i;
        }

        $consulta->close();

        return $cantidad;
    }

    /*Comprobar si el usuario ya le ha hecho un reporte publicacion*/
    public function compPublicacionRep(Int $idu, Int $idp){
        $conn = $this->db->__get("conn");
        $sentencia = "SELECT COUNT(*) FROM reportes WHERE Idusuario = ? AND Idpublicacion = ?;";

        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("ii", $idu, $idp);
        $consulta->bind_result($i);
        $consulta->execute();
        
        $cantidad = 0;

        if($consulta->fetch()){
            $cantidad = $i;
        }

        $consulta->close();

        return $cantidad;
    }

    /*Subir un nuevo reporte de un Perfil*/
    public function subirReportePerfil(String $tit, String $des, String $est, String $fec, Int $Idu, Int $Irepor){
        $conn = $this->db->__get("conn");
        $sentencia = "INSERT INTO reportes(titulo, descripcion, estado, fecha, Idusuario, Idreportado) VALUES (?, ?, ?, ?, ?, ?);";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("ssssii", $tit, $des, $est, $fec, $Idu, $Irepor);
            $consulta->execute();

            $consulta->close();
    }

    /*Subir un nuevo reporte*/
    public function subirReporte(String $tit, String $des, String $est, String $fec, Int $Idu, Int $Ipub, Int $Irepor){
        $conn = $this->db->__get("conn");
        $sentencia = "INSERT INTO reportes(titulo, descripcion, estado, fecha, Idusuario, Idpublicacion, Idreportado) VALUES (?, ?, ?, ?, ?, ?, ?);";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("ssssiii", $tit, $des, $est, $fec, $Idu, $Ipub, $Irepor);
            $consulta->execute();

            $consulta->close();
    }


    /*Actualizar el estado de reporte a Válido*/
    public function repEstadoVal(Int $id_rep) {
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE reportes SET estado = 'valido' WHERE Id=?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $id_rep);
        $consulta->execute();
        
        $consulta->close();
    }

    /*Actualizar el estado de reporte a Anulado*/
    public function repEstadoAnu(Int $id_rep) {
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE reportes SET estado = 'anulado' WHERE Id=?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $id_rep);
        $consulta->execute();
        
        $consulta->close();
    }

    /*Actualizar el estado de reporte a Activo*/
    public function repEstadoAct(Int $id_rep) {
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE reportes SET estado = 'activo' WHERE Id=?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("i", $id_rep);
        $consulta->execute();
        
        $consulta->close();
    }

    /*Actualizar la respuesta de un reporte*/
    public function repResponder(String $resp, Int $id_rep) {
        $conn = $this->db->__get("conn");
        $sentencia = "UPDATE reportes SET respuesta = ? WHERE Id=?;";
    
        $consulta = $conn->prepare($sentencia);
        $consulta->bind_param("si", $resp, $id_rep);
        $consulta->execute();
        
        $consulta->close();
    }

    /*Borrar todos los reportes de un usuario, incluyendo los reportes donde el usuario sea el reportado*/
    public function BorrarTodoReporteUsu(Int $idUsu){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM reportes WHERE Idusuario = ? OR Idreportado = ?;";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("ii", $idUsu, $idUsu);
            $consulta->execute();

            $consulta->close();
    }

    /*Borrar todos los reportes de una publicacion específica*/
    public function BorrarReportePubli(Int $idrep){
        $conn = $this->db->__get("conn");
        $sentencia = "DELETE FROM reportes WHERE Idpublicacion = ?;";

            $consulta = $conn->prepare($sentencia);
            $consulta->bind_param("i", $idrep);
            $consulta->execute();

            $consulta->close();
    }

}

?>