<?php
require_once('../Modelo/class.db.php');


/*Ver Todos los reportes de la aplicación*/
function cargarReportesAdministrador(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    require_once('../Modelo/class.reportes.php');
    
    /*Variables de sesion para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    $usu = new usuarios();
    $rep = new reportes();

    require_once('../Vista/General/cabecera.php');

    $idUsu = $usu->obtenerIdUsu(get_session('admin'));
    /*Cargar todos los reportes de la aplicación*/
    $lista = $rep->cargarReportes();

    require_once('../Vista/Admin/reportesAdministrador.php');
    require_once('../Vista/General/pie.html');
}

// Manejo de AJAX para carga progresiva de reportes
if (isset($_GET['action']) && $_GET['action'] === 'getReportesAjax') {
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.reportes.php');
    require_once('../Modelo/class.usuarios.php');
    $usu = new usuarios();
    $rep = new reportes();

    $idUsu = $usu->obtenerIdUsu(get_session('admin'));
    $offset = intval($_GET['offset'] ?? 0);
    $limit = 6;

    $reportes = $rep->cargarReportes($offset, $limit);

    header('Content-Type: application/json');
    echo json_encode($reportes);
    exit;
}

/*Cambiar el estado del reporte a Valido*/
function reporteEstadoValido(){
    require_once('../Modelo/class.reportes.php');
    $rep = new reportes();
    $idReporte = $_GET['idReporte'];
    $rep->repEstadoVal($idReporte);
    header("Location: control_reportes.php?action=cargarReporteEspecifico&id_Repor=$idReporte");
}

/*Cambiar el estado del reporte a Anulado*/
function reporteEstadoAnulado(){
    require_once('../Modelo/class.reportes.php');
    $rep = new reportes();
    $idReporte = $_GET['idReporte'];
    $rep->repEstadoAnu($idReporte);
    header("Location: control_reportes.php?action=cargarReporteEspecifico&id_Repor=$idReporte");
}

/*Cambiar el estado del reporte a Activo*/
function reporteEstadoActivo(){
    require_once('../Modelo/class.reportes.php');
    $rep = new reportes();
    $idReporte = $_GET['idReporte'];
    $rep->repEstadoAct($idReporte);
    header("Location: control_reportes.php?action=cargarReporteEspecifico&id_Repor=$idReporte");
}

/*Actualizar la respuesta de un reporte*/
function reporteCrearRespuesta(){
    require_once('../Modelo/class.reportes.php');
    $rep = new reportes();

    if(isset($_POST["actualizar"])){
        $idReporte = $_POST['idReporte'];
        $rep->repResponder($_POST["respuesta"], $idReporte);
        header("Location: control_reportes.php?action=cargarReporteEspecifico&id_Repor=$idReporte");
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