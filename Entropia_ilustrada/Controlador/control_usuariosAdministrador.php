<?php
require_once('../Modelo/class.db.php');

/*Ver todos los Usuarios de la aplicación*/
function cargarUsuariosAdminitrador(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    
    /*Variables de sesion para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');
 
    $usu = new usuarios();

    /*Id del administrador*/
    $idUsu = $usu->obtenerIdUsu(get_session('admin'));
    
    require_once('../Vista/General/cabecera.php');

    /*Se cargarán todos los usuarios de la plataforma*/
    $lista = $usu->usuariosAdminitrador(0, 10);

    require_once('../Vista/Admin/usuariosAdministrador.php');
    require_once('../Vista/General/pie.html');
}

// Manejo de AJAX para carga progresiva de usuarios
if (isset($_GET['action']) && $_GET['action'] === 'getUsuariosAjax') {
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    $usu = new usuarios();

    /*Id del administrador*/
    $idUsu = $usu->obtenerIdUsu(get_session('admin'));
   
    $offset = intval($_GET['offset'] ?? 0);
    $limit = 10;

    $usuarios = $usu->usuariosAdminitrador($offset, $limit);

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