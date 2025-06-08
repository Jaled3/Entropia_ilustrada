<?php
require_once('../Modelo/class.db.php');

/*Buscador publicaciones por categoria*/
function buscarPublicacionesCatego() {
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

    if(isset($_POST["BuscarPubliCatego"])){

        $buscaCat = $_POST["opcion"];

        /*Publicaciones que coincidan con el parámetro de categoría enviado*/
        $lista = $pub->publicacionesBuscaCatego($buscaCat, 0, 10);
    
    
        require_once('../Vista/General/cabecera.php');
        require_once('../Vista/General/inicioBuscarCatego.php');
        require_once('../Vista/General/pie.html');
    }
}

/*Manejo de AJAX para carga progresiva de publicaciones por buscador de categoría*/
if (isset($_GET['action']) && $_GET['action'] == 'getPosts') {
    require_once('../Modelo/class.publicaciones.php');
    $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
    $buscaCat = isset($_GET['opcion']) ? $_GET['opcion'] : '';
    $limit = 10;

    $pub = new publicaciones();
    $lista = $pub->publicacionesBuscaCatego($buscaCat, $offset, $limit);

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