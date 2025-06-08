<?php
require_once('../Modelo/class.db.php');


/*Carga las publicaciones del Inicio*/
function cargarPublicacionesInicio() {
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.publicaciones.php');
    require_once('../Modelo/class.etiquetas.php');
    require_once('../Modelo/class.usuarios.php');

    $pub = new publicaciones();
    $categoria = new etiquetas();
    $usu = new usuarios();

    $lista2 = $categoria->mostrarEtiquetas();
    
    /*Se cargarán las publicaciones de inicio*/
    $lista = $pub->publicacionesInicio(0, 10);

    /*Variables de sesiones para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    /*Foto de perfil del usuario en el menú navbar*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
        $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
        $NombreUsu = get_session('registrado');
    }

    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/General/inicio.php');
    require_once('../Vista/General/pie.html');
}

// Manejo de AJAX para carga progresiva de publicaciones
if (isset($_GET['action']) && $_GET['action'] == 'getPosts') {
    require_once('../Modelo/class.publicaciones.php');
    $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
    $limit = 10;

    $pub = new publicaciones();
    $lista = $pub->publicacionesInicio($offset, $limit);

    echo json_encode($lista);
    exit();
}

/*Carga la publicacion con los datos del creador*/
function postPublicacion(){
    require_once('../Modelo/class.publicaciones.php');
    require_once('../Modelo/class.usuarios.php');
    require_once('../Modelo/class.comentarios.php');
    require_once('../Modelo/class.likes.php');
    require_once('../Modelo/class.reportes.php');
    require_once('../Modelo/class.galletas.php');
    $pub = new publicaciones();
    $usu = new usuarios();
    $com = new comentarios();
    $lik = new likes();
    $rep = new reportes();

    $id_pub = $_GET['id'];
    
    /*Variables de sesiones para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    /*Si la publicación existe y no está oculta se proseguirá con la carga de datos*/
    if($pub->publiId($id_pub)){
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
            $nUsu = get_session('registrado');
    
            //Comprobar si el usuario le ha dado like a la publicacion
            $CompLike = $lik->compPublicacionLike($idUsu, $id_pub);
    
            if($CompLike >= 1){
                $estaLike = true;
            }
    
            //Comprobar si el usuario ha reportado la publicacion
            $CompRep = $rep->compPublicacionRep($idUsu, $id_pub);
    
            if($CompRep >= 1){
                $estaRep = true;
            }
    
        }elseif((isset($tipo2)) && ($tipo2 == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('admin'));
            $nUsu = get_session('admin');
        }else{
            $idUsu = 0;
        }
    
        //Variable inizializada a 0 para que no de error en crear reporte
        $idPubUsu = 0;
    
        //Carga de likes totales de la publicacion
        $cantidad = $lik->cargarCantidadLikes($id_pub);
    
        //Carga todos los datos de la publicacion
        $lista = $pub->cargarPost($id_pub);
    
        //Carga de comentarios
        $lista2 = $com->cargarComentariosPost($id_pub, 0, 10);

        /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
            $NombreUsu = get_session('registrado');
        }
      
        require_once('../Vista/General/cabecera.php');
        require_once('../Vista/General/post.php');
        require_once('../Vista/General/pie.html');
    }else{
        header("Location: control_publicacion.php?action=cargarPublicacionesInicio");
    }
    
}

// Manejo de AJAX para carga progresiva de comentarios
if (isset($_GET['action']) && $_GET['action'] == 'getComentarios') {
    require_once('../Modelo/class.comentarios.php');
    $com = new comentarios();

    $id_pub = intval($_GET['id_pub']);
    $offset = intval($_GET['offset']);
    $limit = 10;

    $comentarios = $com->cargarComentariosPost($id_pub, $offset, $limit);

    echo json_encode($comentarios);
    exit();
}

/*Cargar formulario editar Publicación*/

function FormuEditarPublicacion(){
    require_once('../Modelo/class.publicaciones.php');
    require_once('../Modelo/class.etiquetas.php');
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');

    $categoria = new etiquetas();
    $pub = new publicaciones();
    $usu = new usuarios();

    $id_pub = $_GET['idPub'];
    
    /*Variables de sesiones para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    /*Foto de perfil del usuario en el menú navbar*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
        $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
        $NombreUsu = get_session('registrado');
    }
 
    /*Si la publicación existe se proseguirá con la carga de datos*/
    if($pub->publiId($id_pub)){
        $lista = $categoria->mostrarEtiquetas();
        $lista2 = $pub->datosPublicacion($id_pub);

        require_once('../Vista/General/cabecera.php');
        require_once('../Vista/Registrado/modificarPubliUsuario.php');
        require_once('../Vista/General/pie.html');
    }else{
        header("Location: control_publicacion.php?action=cargarPublicacionesInicio");
    }
}

/*Actualizar Publicación con nuevos datos*/

function actualizarPublicacion(){
    require_once('../Modelo/class.publicaciones.php');
    $pub = new publicaciones();

    $pubId = $_POST["pubId"];

    if(isset($_POST["ActuaPublicacion"])){
        $pub->actualizarPublicacion($_POST["titulo"], $_POST["descripcion"], $_POST["Tipo"], $_POST["opcion"], $pubId);
        header("Location: control_publicacion.php?action=postPublicacion&id=$pubId");       
    }
}

/*Creación de Publicación*/

function crearPublicacion(){
    require_once('../Modelo/class.etiquetas.php');
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');

    /*Variables inizializada para evitar errores*/
    $mensajeError = false;
    $mensajeError2 = false;
    $mensajeError3 = false;

    /*Variable de sesiones para la cabecera*/
    $tipo = is_session('registrado');
    $categoria = new etiquetas();
    $usu = new usuarios();

    /*Foto de perfil del usuario en el menú navbar*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
        $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
        $NombreUsu = get_session('registrado');
    }

    require_once('../Vista/General/cabecera.php');
    /*Cargar categorías*/
    $lista = $categoria->mostrarEtiquetas();
    require_once('../Vista/Registrado/crearPublicacion.php');
    require_once('../Vista/General/pie.html');
}

/*Subir Publicación*/

function subirPublicacion(){
    if(isset($_POST["subirPublicacion"])){       
        require_once('../Modelo/class.etiquetas.php'); 
        require_once('../Modelo/class.galletas.php');
        require_once('../Modelo/class.publicaciones.php');
        require_once('../Modelo/class.usuarios.php');

        /*Variable de sesiones para la cabecera*/
        $tipo = is_session('registrado');
        $categoria = new etiquetas();

        $usu = new usuarios();
        $pub = new publicaciones();

        /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
            $NombreUsu = get_session('registrado');
        }

        /*Cargar categorías*/
        $lista = $categoria->mostrarEtiquetas();

        /* Crear la ruta para la imagen en caso de que no exista la carpeta*/ 
            $ruta = "../img/".$idUsu.'/';
                if(!file_exists($ruta)){
                    mkdir($ruta);
                }

        /* Comprobar que el archivo es un formato imagen */ 
            $archivo = $_FILES["imagen"]["type"];
            $archivo = explode("/", $archivo)[0];
        
        /* Comprobar que el archivo no pesa más de 10Mb */
            $maxSize = 10 * 1024 * 1024; 
    
            if(strcmp($archivo, "image") == 0){
        
            // Obtener dimensiones de la imagen
            list($width, $height) = getimagesize($_FILES["imagen"]["tmp_name"]);

                if ($_FILES["imagen"]['size'] > $maxSize) {
                    $mensajeError = true;
                    $mensajeError2 = false;
                    $mensajeError3 = false;
                    require_once('../Vista/General/cabecera.php');
                    require_once('../Vista/Registrado/crearPublicacion.php');
                    require_once('../Vista/General/pie.html');
                } else {

                    if($width >= 184 && $height >= 184){
                        
                        /* La imagen se guardará en formato png*/ 
                        $nombreImg = $_FILES["imagen"]["name"];
                        $nombreSinExtension = pathinfo($nombreImg, PATHINFO_FILENAME);

                        /*Para la imagen, se generará un nombre único en la carpeta del usuario*/                      
                        $fileName = uniqid() . '.' . $nombreSinExtension;

                        $destino = $ruta.$fileName.".png";
                                                                                                
                        move_uploaded_file($_FILES['imagen']['tmp_name'],$destino);

                        $fechaHoy = date("Y-m-d");
                                                              
                        $pub->subPubli($_POST["titulo"], $_POST["descripcion"], $destino, $_POST["Tipo"], $_POST["opcion"], $idUsu, $fechaHoy);
                        
                        header("Location: control_PublicacionesUsuarios.php?action=cargarPublicacionesUsuario&idPerfil=$idUsu");
                                                                    
                    }else{
                        $mensajeError = false;
                        $mensajeError2 = true;
                        $mensajeError3 = false;
                        require_once('../Vista/General/cabecera.php');
                        require_once('../Vista/Registrado/crearPublicacion.php');
                        require_once('../Vista/General/pie.html');
                    }
                    
                }
            }else{
                $mensajeError = false;
                $mensajeError2 = false;
                $mensajeError3 = true;
                require_once('../Vista/General/cabecera.php');
                require_once('../Vista/Registrado/crearPublicacion.php');
                require_once('../Vista/General/pie.html');
            }
               
        
    }
}

/*Borrar publicacion del usuario Pregunta previa*/

function borrarPubliUsu(){   
    require_once('../Modelo/class.publicaciones.php');
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');

    $usu = new usuarios();
    $pub = new publicaciones();

    $id_pub = $_GET['idPub'];

    /*Variables de sesiones para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    /*Foto de perfil del usuario en el menú navbar*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
        $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
        $NombreUsu = get_session('registrado');
    }

    /*Si la publicación existe, borrará*/
    if($pub->publiId($id_pub)){
        $lista2 = $pub->datosPublicacion($id_pub);
        require_once('../Vista/General/cabecera.php');
        require_once('../Vista/Registrado/BorrarPublicacionPregunta.php');
        require_once('../Vista/General/pie.html');
    }else{
        header("Location: control_publicacion.php?action=cargarPublicacionesInicio");
    }
    
}

/*ocultar publicacion del usuario*/
function ocultarPubliUsu(){   
    require_once('../Modelo/class.publicaciones.php');
   
    $pub = new publicaciones();

    $id_pub = $_GET['idPub'];

    /*Si la publicación existe, se ocultará*/
    if($pub->publiId($id_pub)){
        $pub->ocultarPublicacion($id_pub);
        header("Location: control_publicacion.php?action=postPublicacion&id=$id_pub");
    }else{
        header("Location: control_publicacion.php?action=cargarPublicacionesInicio");
    }   
}

/*mostrar publicacion del usuario*/
function mostrarPubliUsu(){   
    require_once('../Modelo/class.publicaciones.php');
   
    $pub = new publicaciones();

    $id_pub = $_GET['idPub'];

    /*Si la publicación existe, se ocultará*/
    if($pub->publiId($id_pub)){
        $pub->mostrarPublicacion($id_pub);
        header("Location: control_publicacion.php?action=postPublicacion&id=$id_pub");
    }else{
        header("Location: control_publicacion.php?action=cargarPublicacionesInicio");
    }   
}

/*Borrar publicacion del usuario*/
function eliminacionDefinitivaPubli(){  
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    require_once('../Modelo/class.reportes.php');
    require_once('../Modelo/class.likes.php');
    require_once('../Modelo/class.comentarios.php');
    require_once('../Modelo/class.publicaciones.php');

    $pubId = $_POST["pubId"];

    $usu = new usuarios();
    $rep = new reportes();
    $lik = new likes();
    $com = new comentarios();
    $pub = new publicaciones();

    /*Variables de sesiones para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
    }elseif((isset($tipo2)) && ($tipo2 == 1)){
        $idUsu = $usu->obtenerIdUsuPublicacion($pubId);
    }
    
    if(isset($_POST["BorrarPubliSi"])){
        if($pub->publiId($pubId)){
            /*Borrar Reportes*/
            $rep->BorrarReportePubli($pubId);
            
            /*Borrar Me gustas*/
            $lik->BorrarTodoLikePubli($pubId);
            
            /*Borrar Comentarios*/
            $com->BorrarTodoComentarioPubli($pubId);
            
            /*Borrar archivo del servidor*/
            $nomFot = $pub->publiFoto($pubId);
            $rutaFoto = dirname(__DIR__) . "/img/". $idUsu ."/" . basename($nomFot);
            unlink($rutaFoto);
                
            /*Borrar Publicacion*/
            $pub->BorrarPubliUsu($pubId);
    
            /*cargar inicio*/
            header("Location: control_PublicacionesUsuarios.php?action=cargarPublicacionesUsuario&idPerfil=$idUsu");
        }else{
            header("Location: control_PublicacionesUsuarios.php?action=cargarPublicacionesUsuario&idPerfil=$idUsu");
        }
    }

    if(isset($_POST["BorrarPubliNo"])){
        header("Location: control_publicacion.php?action=postPublicacion&id=$pubId");
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