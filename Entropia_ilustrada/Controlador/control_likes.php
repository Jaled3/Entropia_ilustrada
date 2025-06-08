<?php
require_once('../Modelo/class.db.php');


/*Subir like a la publicacion*/
function publicarLike(){
    require_once('../Modelo/class.likes.php');
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    $usu = new usuarios();
    $lik = new likes();

    $id_pub = $_GET['id'];
    $idUsu = $usu->obtenerIdUsu(get_session('registrado'));

    /*Se envía un like a la publicación, después envía al usuario a la publicación actual*/
    $lik->publicarLike($idUsu, $id_pub);
    header("Location: control_publicacion.php?action=postPublicacion&id=$id_pub");
    
}

/*Quitar like a la publicacion*/
function quitarLike(){
    require_once('../Modelo/class.likes.php');
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    $usu = new usuarios();
    $lik = new likes();

    $id_pub = $_GET['id'];
    $idUsu = $usu->obtenerIdUsu(get_session('registrado'));

    /*Se quita el like a la publicación, después envía al usuario a la publicación actual*/
    $lik->quitarLike($idUsu, $id_pub);
    header("Location: control_publicacion.php?action=postPublicacion&id=$id_pub");
    
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