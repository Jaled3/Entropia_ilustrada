<?php
require_once('../Modelo/class.db.php');

/*Cargar formulario para elegir si buscar por nombre o categoría*/
function buscarPubliNombre(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    require_once('../Modelo/class.etiquetas.php');

    $usu = new usuarios();
    $categoria = new etiquetas();

    /*Variables de sesiones para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    /*Etiquetas*/
    $lista2 = $categoria->mostrarEtiquetas();

    /*Foto de perfil del usuario en el menú navbar*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
        $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
        $NombreUsu = get_session('registrado');
    }

    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/General/buscadorPubli.php');
    require_once('../Vista/General/pie.html');
}

/*Buscador publicaciones por nombre*/
function buscarPublicacionesNombre() {
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.publicaciones.php');
    require_once('../Modelo/class.etiquetas.php');
    require_once('../Modelo/class.usuarios.php');
    
    $usu = new usuarios();   
    $pub = new publicaciones();
    $categoria = new etiquetas();

    /*Cargar todas las categorías*/
    $lista2 = $categoria->mostrarEtiquetas();

    /*Variables de sesiones para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    /*Foto de perfil del usuario en el menú navbar*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
        $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
        $NombreUsu = get_session('registrado');
    }

    if(isset($_POST["BuscarPubliNombre"])){
        $buscaNom = $_POST['nom'];

        /*Publicaciones que coincidan con el parámetro de nombre enviado*/
        $lista = $pub->publicacionesBuscaNombre(0, 10, $buscaNom);
      
        require_once('../Vista/General/cabecera.php');
        require_once('../Vista/General/inicioBuscarNombre.php');
        require_once('../Vista/General/pie.html');
    }
}

/*Manejo de AJAX para carga progresiva de publicaciones por buscador de nombre*/
if (isset($_GET['action']) && $_GET['action'] == 'getPosts') {
    require_once('../Modelo/class.publicaciones.php');
    $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
    $buscaNom = isset($_GET['nom']) ? $_GET['nom'] : '';
    $limit = 10;

    $pub = new publicaciones();
    $lista = $pub->publicacionesBuscaNombre($offset, $limit, $buscaNom);

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