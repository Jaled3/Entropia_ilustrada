<?php
require_once('../Modelo/class.db.php');


/*Subir comentario a la publicacion*/
function publicarComentario(){
    require_once('../Modelo/class.comentarios.php');
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    $usu = new usuarios();
    $com = new comentarios();

    $id_pub = $_GET['id'];
    $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
    $fechaHoy = date("Y-m-d");

    /*Se sube el comentario con la fecha de hoy, después de publicarse, envía al usuario a la publicación actual*/
    $com->publicarComentario($_POST["comentario"], $fechaHoy, $idUsu, $id_pub);
    header("Location: control_publicacion.php?action=postPublicacion&id=$id_pub");
    
}

/*Quitar comentario de la publicacion*/
function quitarComentario(){
    require_once('../Modelo/class.comentarios.php');
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    $usu = new usuarios();
    $com = new comentarios();

    $id_com = $_GET['id'];
    $id_pub = $_GET['idPub'];

    /*Se quita el comentario elegido de la publicación actual, después envía al usuario a la publicación actual*/
    $com->quitarComentario($id_com);
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