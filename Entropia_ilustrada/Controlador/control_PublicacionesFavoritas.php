<?php
require_once('../Modelo/class.db.php');

/*Cargar solo las publicaciones FAVORITAS del Usuario Seleccionado*/
function cargarPublicacionesFavoritasUsuario() {
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.publicaciones.php');
    require_once('../Modelo/class.usuarios.php');  
     
    $usu = new usuarios();
    $pub = new publicaciones();
    
    $idUsu = $_GET['idPerfil'];

    /*Cargar todas las publicaciones favoritas de un usuario*/
    $lista = $pub->publicacionesFavoritasIdUsuario($idUsu, 0, 10);
    
    /*Variables de sesion para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    /*Variable inicializada para evitar errores*/
    $idUsu2=0;

    /*Foto Usuario y nombre encima del navbar*/
    $fotoUsuarioNav = $usu->obtenerUrlImagen($idUsu);
    $nombreUsuarioNav = $usu->obtenerNombUsu($idUsu);

    /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu2 = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu2);
            $NombreUsu = get_session('registrado');
        }
    
    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/General/publicacionesFavoritasUsuario.php');
    require_once('../Vista/General/pie.html');
    
}

// Manejo de AJAX para carga progresiva de publicaciones
if (isset($_GET['action']) && $_GET['action'] == 'getPosts') {
    require_once('../Modelo/class.publicaciones.php');
    $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
    $idUsu = isset($_GET['idPerfil']) ? $_GET['idPerfil'] : '';
    $limit = 10;

    $pub = new publicaciones();
    $lista = $pub->publicacionesFavoritasIdUsuario($idUsu, $offset, $limit);

    echo json_encode($lista);
    exit();
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