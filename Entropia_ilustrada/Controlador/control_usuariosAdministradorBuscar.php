<?php
require_once('../Modelo/class.db.php');

/*Ver todos los Usuarios de la aplicación*/
function cargarUsuariosAdminitradorBuscar(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    
    /*Variables de sesion para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');
    $usu = new usuarios();

    /*Id del administrador*/
    $idUsu = $usu->obtenerIdUsu(get_session('admin'));

    if(isset($_POST["BuscarUsuario"])){
        require_once('../Vista/General/cabecera.php');
    
        $buscaNom = $_POST["nombre"];

        /*Lista con los datos de los usuarios que coincidan con el nombre enviado*/
        $lista = $usu->usuariosAdminitradorBuscar(0, 10, $buscaNom);
    
        require_once('../Vista/Admin/usuariosAdministradorBuscar.php');
        require_once('../Vista/General/pie.html');
    }
}

// Manejo de AJAX para carga progresiva de usuarios
if (isset($_GET['action']) && $_GET['action'] === 'getUsuariosAjax') {
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    $usu = new usuarios();

    /*Id del administrador*/
    $idUsu = $usu->obtenerIdUsu(get_session('admin'));

    $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
    $buscaNom = isset($_GET['nom']) ? $_GET['nom'] : '';
    $limit = 10;

    $usuarios = $usu->usuariosAdminitradorBuscar($offset, $limit, $buscaNom);

    
    echo json_encode($usuarios);
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