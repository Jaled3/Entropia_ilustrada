<?php
require_once('../Modelo/class.db.php');


/*Buscador de los reportes de la aplicación*/
function cargarReportesAdministradorBuscador(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    require_once('../Modelo/class.reportes.php');
    
    /*Variables de sesion para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');
    $usu = new usuarios();
    $rep = new reportes();

    if(isset($_POST["BuscarReporte"])){
       
        require_once('../Vista/General/cabecera.php');
    
        $buscaNom = $_POST["nombre"];
        $comp = $usu->compUsuario($buscaNom);
        $idRepor = 0;

        if($comp == 1){
            $idRepor = $usu->obtenerIdUsu($buscaNom);
        }

        $estad = $_POST["estado"];

        /*En caso de que el usuario no exista, envia de vuelta a los reportes*/
        if($idRepor == 0){
            require_once('../Vista/General/paginaDeError.php');
            require_once('../Vista/General/pie.html');
        }else{
            $idUsu = $usu->obtenerIdUsu(get_session('admin'));

            /*Se cargará la lista de los reportes dónde se encuentre el usuario que se ha pasado como parámetro*/
            $lista = $rep->cargarReportesBuscador($idRepor, $estad);
        
            require_once('../Vista/Admin/reportesAdministradorBuscador.php');
            require_once('../Vista/General/pie.html');
        }
        
    }
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
    $buscaNom = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $estad = isset($_GET['estado']) ? $_GET['estado'] : '';

    $idRepor = $usu->obtenerIdUsu($buscaNom);
    $limit = 6;

    $reportes = $rep->cargarReportesBuscador($idRepor, $estad, $offset, $limit);

    header('Content-Type: application/json');
    echo json_encode($reportes);
    exit;
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