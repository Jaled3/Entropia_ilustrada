<?php
require_once('../Modelo/class.db.php');


/*Ver Reportes en el perfil del usuario*/
function cargarReportesUsuario(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    require_once('../Modelo/class.reportes.php');
    
    $usu = new usuarios();
    $rep = new reportes();
    
    /*Variable de sesiones para la cabecera*/
    $tipo = is_session('registrado');
    
    /*Variable inicializada para evitar errores*/
    $idUsu2=0;

    /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu2 = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu2);
            $NombreUsu = get_session('registrado');
        }

    /*Cargar todos los reportes hechos por un usuario en su perfil*/
    $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
    $lista = $rep->cargarReportesUsuario($idUsu);
    
    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/Registrado/perfilReportes.php');
    require_once('../Vista/General/pie.html');
}

// Manejo de AJAX para carga progresiva de reportes
if (isset($_GET['action']) && $_GET['action'] === 'getReportesAjax') {
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.reportes.php');
    require_once('../Modelo/class.usuarios.php');
    $usu = new usuarios();
    $rep = new reportes();

    $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
    $offset = intval($_GET['offset'] ?? 0);
    $limit = 6;

    $reportes = $rep->cargarReportesUsuario($idUsu, $offset, $limit);

    header('Content-Type: application/json');
    echo json_encode($reportes);
    exit;
}

/*Ver Un reporte en específico para los usuarios*/
function cargarReporteEspecifico(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    require_once('../Modelo/class.reportes.php');
  
    $usu = new usuarios();
    $rep = new reportes();

    /*Variables de sesiones para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
            $NombreUsu = get_session('registrado');
        }
    
    /*En caso de ser administrador, se podrá ver los botones de válido y anulado*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
    }elseif((isset($tipo2)) && ($tipo2 == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('admin'));
    }
    
    /*Se cargará los datos de un reporte en función de si es un reporte a un perfil o a una publicación*/
    if(isset($_GET['idPub'])){
        $id_pub = $_GET['idPub'];
        $lista = $rep->cargarReporteEspecifico($idUsu, $id_pub);
    }elseif(isset($_GET['id_PerfilAjeno'])){
        $iperf = $_GET['id_PerfilAjeno'];
        $lista = $rep->cargarReporteEspecificoPefil($idUsu, $iperf);
    }elseif(isset($_GET['id_Repor'])){
        $iRep = $_GET['id_Repor'];
        /*Esta función sirve para que el botón (ir al reporte) que sale al mostrar todos los reportes, funcione*/
        $lista = $rep->cargarReporteEspecificoIdReporte($iRep);
    }
    
    
    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/Registrado/perfilReporteEspecifico.php');
    require_once('../Vista/General/pie.html');
}

/*Cargar el formulario de Reportes*/
function cargarFormularioReporte(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');   
    $usu = new usuarios();

    /*Variable de sesiones para la cabecera*/
    $tipo = is_session('registrado');

    /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
            $NombreUsu = get_session('registrado');
        }

    /*Variables de la id de la Publicacion y de la Id del usuario Publicador*/
    $id_pub = $_GET['idPub'];
    $id_rep = $_GET['idPubUsu'];

    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/Registrado/formularioReporte.php');
    require_once('../Vista/General/pie.html');
}

/*Cargar el formulario de Reportes de Perfil*/
function cargarFormularioReportePerfil(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');

    $usu = new usuarios();

    /*Variable de sesiones para la cabecera*/
    $tipo = is_session('registrado');

    /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
            $NombreUsu = get_session('registrado');
        }

    /*Variable del nombre de perfil*/
    $nombrePerfil = $_GET['nombrePerfil'];

    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/Registrado/formularioReportePerfil.php');
    require_once('../Vista/General/pie.html');
}

/*Crear Reporte de un Perfil de usuario, lo cual pondrá el estado del reporte en activo*/
function crearReportePerfil(){
    require_once('../Modelo/class.reportes.php');
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    $usu = new usuarios();
    $rep = new reportes();

    if(isset($_POST["subirReporte"])){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));

        /*Si el usuario hace un reporte, he intenta volver a reportar al usuario, le saldrá un mensaje de error. En caso contrario, se creará el reporte*/
        if($rep->compPerfilRep($idUsu, $_POST["nomPerfi"])){
            $tipo = is_session('registrado');
            require_once('../Vista/General/cabecera.php');
            echo '<div class="z-3 mt-5 position-absolute top-0 start-50 translate-middle alert alert-danger" role="alert">
                        Ya has reportado esta publicacion.
                        <a class="nav-link" href="control_reportes.php?action=cargarReportesUsuario">Volver a reportes</a>
                        </div>';
            require_once('../Vista/General/pie.html');
        }else{          
            $estado = "activo";
            $fechaHoy = date("Y-m-d");
            $idReporPerfil = $usu->obtenerIdUsu($_POST["nomPerfi"]);
            
            $rep->subirReportePerfil($_POST["TituloReporte"], $_POST["DescripcionReporte"], $estado, $fechaHoy, $idUsu, $idReporPerfil);
            header("Location: control_reportes.php?action=cargarReportesUsuario");       
        }
    }   
    
}

/*Crear Reporte, lo cual pondrá el estado del reporte en activo*/
function crearReporte(){
    require_once('../Modelo/class.reportes.php');
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    $usu = new usuarios();
    $rep = new reportes();


    if(isset($_POST["subirReporte"])){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));

        /*Si el usuario hace un reporte, he intenta volver a reportar al usuario, le saldrá un mensaje de error. En caso contrario, se creará el reporte*/
        if($rep->compPublicacionRep($idUsu, $_POST["idPub"])){
            $tipo = is_session('registrado');
            require_once('../Vista/General/cabecera.php');
            echo '<div class="z-3 mt-5 position-absolute top-0 start-50 translate-middle alert alert-danger" role="alert">
                        Ya has reportado esta publicacion.
                        <a class="nav-link" href="control_reportes.php?action=cargarReportesUsuario">Volver a reportes</a>
                        </div>';
            require_once('../Vista/General/pie.html');
        }else{          
            $estado = "activo";
            $fechaHoy = date("Y-m-d");
            
            $rep->subirReporte($_POST["TituloReporte"], $_POST["DescripcionReporte"], $estado, $fechaHoy, $idUsu, $_POST["idPub"], $_POST["idRep"]);
            header("Location: control_reportes.php?action=cargarReportesUsuario");       
        }
    }   
    
}

/*
=======================
Controlador del action
=======================
*/
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
    $action();
}else{
    require_once('../Modelo/class.galletas.php');

    if(is_session('registrado')){
        $tipo = is_session('registrado');
        require_once('../Vista/General/cabecera.php');               
        require_once('../Vista/General/landing.php');
        require_once('../Vista/General/pie.html');
    }elseif(is_session('admin')){
        $tipo2 = is_session('admin');
        require_once('../Vista/General/cabecera.php');               
        require_once('../Vista/General/landing.php');
        require_once('../Vista/General/pie.html');
    }else{      
        require_once('../Vista/General/cabecera.php');
        require_once('../Vista/General/landing.php');
        require_once('../Vista/General/pie.html');
    }
}

?>