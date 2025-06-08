<?php
require_once('../Modelo/class.db.php');

/*Mostrará el perfil del usuario PROPIO*/
function mostrarPerfil(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');

    $usu = new usuarios();
    
    $idUsu = $usu->obtenerIdUsu(get_session('registrado'));

    /*Datos del perfil*/
    $lista = $usu->perfilUsuario($idUsu);

    /*Variable de sesion para la cabecera*/
    $tipo = is_session('registrado');

    /*Foto de perfil del usuario en el menú navbar*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
        $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
        $NombreUsu = get_session('registrado');
    }

    $nomUsu = get_session('registrado');

    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/Registrado/perfilUsuario.php');
    require_once('../Vista/General/pie.html');  
}

/*Mostrará el perfil un usuario Ajeno*/
function mostrarPerfilAjeno(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    require_once('../Modelo/class.reportes.php');

    $usu = new usuarios();
    $rep = new reportes();
    
    $id_PefilAjeno = $_GET['idAjeno'];
    $lista = $usu->perfilUsuario($id_PefilAjeno);
    
    /*Variables de sesion para la cabecera*/
    $tipo = is_session('registrado');
    $tipo2 = is_session('admin');

    /*Foto de perfil del usuario en el menú navbar*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
        $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
        $NombreUsu = get_session('registrado');
    }

    /*Comprobador para los reportes de perfil*/
    if(($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
    }else{
        $idUsu = 0;
    }

    /*Comprobar si el usuario ha reportado el perfil*/
    $nomPerf = $usu->obtenerNombUsu($id_PefilAjeno);
    $CompRep = $rep->compPerfilRep($idUsu, $nomPerf);

    if($CompRep >= 1){
        $estaRep = true;
    }

    /*Inicializar la variable para que no de error*/
    $nomUsu = "";

    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/Registrado/perfilUsuario.php');
    require_once('../Vista/General/pie.html');  
}

/*Modificar perfil del usuario*/
function modificarPerfilUsuario(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');

    /*Variables inizializada para evitar errores*/
    $mensajeError = false;
    $mensajeError2 = false;
    $mensajeError3 = false;
    $mensajeError4 = false;

    $usu = new usuarios();
    $idUsu = $usu->obtenerIdUsu(get_session('registrado'));

    /*Recoger los datos del usuario para su edición*/
    $lista = $usu->modificarPerfUsu($idUsu);

    /*Variable de sesion para la cabecera*/
    $tipo = is_session('registrado');

    /*Variable inicializada para evitar errores*/
    $idUsu2=0;

    /*Foto de perfil del usuario en el menú navbar*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu2 = $usu->obtenerIdUsu(get_session('registrado'));
        $fotoUsuario = $usu->obtenerUrlImagen($idUsu2);
        $NombreUsu = get_session('registrado');
    }

    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/Registrado/modificarPerfilUsuario.php');
    require_once('../Vista/General/pie.html');
}

/*Actualizar Perfil Usuario */
function actualizarPerfilUsuario(){
    if(isset($_POST["actualizar"])){
        require_once('../Modelo/class.usuarios.php');
        require_once('../Modelo/class.galletas.php');
        $usu = new usuarios();

        /*Variable de sesion para la cabecera*/
        $tipo = is_session('registrado');
        
        /*Obtener el id del usuario*/
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));

        /*Recoger los datos del usuario para su edición*/
        $lista = $usu->modificarPerfUsu($idUsu);

        /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu2 = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu2);
            $NombreUsu = get_session('registrado');
        }
    
        /*Comprobar que el nombre del usuario no sea uno que ya esté registrado*/
        if(($usu->compUsuario($_POST["nombre"])) && !($_POST["nombre"]==get_session('registrado'))){
            /*Variables inizializada para evitar errores*/
            $mensajeError = true;
            $mensajeError2 = false;
            $mensajeError3 = false;
            $mensajeError4 = false;
            require_once('../Vista/General/cabecera.php');
            require_once('../Vista/Registrado/modificarPerfilUsuario.php');
            require_once('../Vista/General/pie.html');                      
        }else{
            $correUsu = $usu->obtenerCorreoUsu($idUsu);
            /*Comprobar que el correo del usuario no sea uno que ya esté registrado*/
            if(($usu->compUsuarioCorreo($_POST["correo"])) && !($correUsu==$_POST["correo"])){
                /*Variables inizializada para evitar errores*/
                $mensajeError = false;
                $mensajeError2 = true;
                $mensajeError3 = false;
                $mensajeError4 = false;
                require_once('../Vista/General/cabecera.php');
                require_once('../Vista/Registrado/modificarPerfilUsuario.php');
                require_once('../Vista/General/pie.html');             
            }else{
                $fotoUsu = $usu->obtenerUrlImagen($idUsu);
    
                /*No se subió una imagen, así que mantenemos la que ya está en la base de datos. Se cierra y se crea una nueva sesión y cargamos el perfil del usuario.*/
                if ($_FILES['imagen']['error'] == UPLOAD_ERR_NO_FILE) {
                    $destino = $fotoUsu; 
                    $usu->actualizarPerfUsu($_POST["nombre"], $destino, $_POST["biogra"], $_POST["correo"], $idUsu);
                    
                    unset_session();
                    set_session('registrado', $_POST["nombre"]);
                        
                    header("Location: control_perfilUsuario.php?action=mostrarPerfil");
                }else{
               
                    /* Comprobar que el archivo es un formato imagen */ 
                    $archivo = $_FILES["imagen"]["type"];
                    $archivo = explode("/", $archivo)[0];
                
                    /* Comprobar que el archivo no pesa más de 10Mb */
                    $maxSize = 10 * 1024 * 1024; 
        
                    if(strcmp($archivo, "image") == 0){
                
                        /*Obtener dimensiones de la imagen*/
                        list($width, $height) = getimagesize($_FILES["imagen"]["tmp_name"]);
                
                        /*Mensaje de error si el archivo es demasiado grande*/
                        if ($_FILES["imagen"]['size'] > $maxSize) {
                            /*Variables inizializada para evitar errores*/
                            $mensajeError = false;
                            $mensajeError2 = false;
                            $mensajeError3 = true;
                            $mensajeError4 = false;
                            require_once('../Vista/General/cabecera.php');
                            require_once('../Vista/Registrado/modificarPerfilUsuario.php');
                            require_once('../Vista/General/pie.html');
                        } else {
                
                            if($width >= 184 && $height >= 184){

                                /* Borrar imagen de perfil antigua de usuario */
                                if(!(strcmp($fotoUsu, "../ServidorImg/predefinido.png") == 0)){
                                    unlink($fotoUsu);
                                }

                                /* Crear la ruta para la imagen en caso de que no exista la carpeta*/ 
                                $ruta = "../img/".$idUsu.'/';
                                if(!file_exists($ruta)){
                                    mkdir($ruta);
                                }
                                
                                /* La imagen se guardará en formato png*/ 
                                $nombreImg = $_FILES["imagen"]["name"];
                                $nombreSinExtension = pathinfo($nombreImg, PATHINFO_FILENAME);
                
                                /*Para la imagen, se generará un nombre único en la carpeta del usuario*/                      
                                $fileName = uniqid() . '.' . $nombreSinExtension;
                
                                $destino = $ruta.$fileName.".png";
                                                                                                        
                                move_uploaded_file($_FILES['imagen']['tmp_name'],$destino);
                            }else{
                                /*Variables inizializada para evitar errores*/
                                $mensajeError = false;
                                $mensajeError2 = false;
                                $mensajeError3 = false;
                                $mensajeError4 = true;
                                require_once('../Vista/General/cabecera.php');
                                require_once('../Vista/Registrado/modificarPerfilUsuario.php');
                                require_once('../Vista/General/pie.html');
                            }
                        }
                
                        /*Se actualizan los datos. Se cierra y se crea una nueva sesión y cargamos el perfil del usuario.*/
                        $usu->actualizarPerfUsu($_POST["nombre"], $destino, $_POST["biogra"], $_POST["correo"], $idUsu);
                    
                        unset_session();
                        set_session('registrado', $_POST["nombre"]);
                        
                        header("Location: control_perfilUsuario.php?action=mostrarPerfil");
                    }
                }

            } 
        }
        
    }
}

/*formulario Borrar perfil del usuario*/
function formuBorrarCuenta(){   
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');

    /*Variables inizializada para evitar errores*/
    $mensajeError = false;
    $mensajeError2 = false;
    $mensajeError3 = false;

    $usu = new usuarios();
    $idUsu = $usu->obtenerIdUsu(get_session('registrado'));

    $lista = $usu->modificarPerfUsu($idUsu);

    /*Variable de sesion para la cabecera*/
    $tipo = is_session('registrado');

    /*Foto de perfil del usuario en el menú navbar*/
    if((isset($tipo)) && ($tipo == 1)){
        $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
        $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
        $NombreUsu = get_session('registrado');
    }

    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/Registrado/formuBorrarCuenta.php');
    require_once('../Vista/General/pie.html');
}

/*formulario Borrar perfil del usuario*/
function BorrarCuentaUsuario(){   
    if(isset($_POST["BorrarCuenta"])){
        require_once('../Modelo/class.galletas.php');
        require_once('../Modelo/class.usuarios.php');
    
        $usu = new usuarios();

        /*Variable de sesion para la cabecera*/
        $tipo = is_session('registrado');

        /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
            $NombreUsu = get_session('registrado');
        }

        /*Obtener foto de perfil*/
        $lista = $usu->modificarPerfUsu($idUsu);

        /*Comprobar que el Nombre, la contraseña y el correo son los del usuario. Para proceder con la eliminación de la cuenta*/
        $hashAlmacenado=$usu->contraActualUsuario($idUsu);

        if(password_verify($_POST["contra"], $hashAlmacenado)){
            if(get_session('registrado')==$_POST["nombre"]){
                if($usu->compCorreoUsu($_POST["correo"], $idUsu)){
                    require_once('../Vista/General/cabecera.php');
                    require_once('../Vista/Registrado/BorrarCuentaPregunta.php');
                    require_once('../Vista/General/pie.html');
                }else{
                    /*Variables inizializada para evitar errores*/
                    $mensajeError = true;
                    $mensajeError2 = false;
                    $mensajeError3 = false;
                    require_once('../Vista/General/cabecera.php');
                    require_once('../Vista/Registrado/formuBorrarCuenta.php');
                    require_once('../Vista/General/pie.html');
                }
            }else{
                /*Variables inizializada para evitar errores*/
                $mensajeError = false;
                $mensajeError2 = true;
                $mensajeError3 = false;
                require_once('../Vista/General/cabecera.php');
                require_once('../Vista/Registrado/formuBorrarCuenta.php');
                require_once('../Vista/General/pie.html');
            }                
        }else{
            /*Variables inizializada para evitar errores*/
            $mensajeError = false;
            $mensajeError2 = false;
            $mensajeError3 = true;
            require_once('../Vista/General/cabecera.php');
            require_once('../Vista/Registrado/formuBorrarCuenta.php');
            require_once('../Vista/General/pie.html');
        }

    }
}

/*Borrar perfil del usuario*/
function eliminacionDefinitivaUsuario(){  
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    require_once('../Modelo/class.reportes.php');
    require_once('../Modelo/class.likes.php');
    require_once('../Modelo/class.comentarios.php');
    require_once('../Modelo/class.publicaciones.php');
    
    $usu = new usuarios();
    $rep = new reportes();
    $lik = new likes();
    $com = new comentarios();
    $pub = new publicaciones();
    $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
    
    /*En caso de elegir que si se procederá a la eliminación de la cuenta*/
    if(isset($_POST["BorrarCuentaSi"])){

        /*Elimina todas las fotos de una carpeta, y por ultimo la carpeta*/
        function eliminarCarpeta($ruta) {                  
            $archivos = scandir($ruta);
            foreach ($archivos as $archivo) {
                if ($archivo !== "." && $archivo !== "..") {
                    $rutaCompleta = $ruta . DIRECTORY_SEPARATOR . $archivo;
                    if (is_dir($rutaCompleta)) {
                        eliminarCarpeta($rutaCompleta); // Recursivo
                    } else {
                        unlink($rutaCompleta); // Borra archivo
                    }
                }
            }
            
            rmdir($ruta); 
        }

        /*Borrar Reportes*/
        $rep->BorrarTodoReporteUsu($idUsu);
        
        /*Borrar Me gustas*/
        $lik->BorrarTodoLikeUsu($idUsu);
        
        /*Borrar Comentarios*/
        $com->BorrarTodoComentarioUsu($idUsu);
        
        /*Borrar Publicaciones*/
        $pub->BorrarTodaPubliUsu($idUsu);
        
        /*Borrar Carpeta fotos*/
        $ruta = dirname(__DIR__) . "/img/" . $idUsu;
        eliminarCarpeta($ruta);
        
        /*Borrar Usuario*/
        $usu->BorrarUsu($idUsu);

        /*Cerrar sesión y cargar landing*/
        unset_session();
        header("Location: control_inicioRegistroUsuario.php?action=cargarLanding");
    }

    /*En caso de elegir que no se cargará el perfil del usuario*/
    if(isset($_POST["BorrarCuentaNo"])){
        header("Location: control_perfilUsuario.php?action=mostrarPerfil");
    }
}

/*Cargar el formulario de pedir contraseña actual del usuario*/
function formuContraActual(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');   
    
    $usu = new usuarios();
    
    /*Variables inizializada para evitar errores*/
    $mensajeError = false;

    /*Variable de sesion para la cabecera*/
    $tipo = is_session('registrado');   

    /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
            $NombreUsu = get_session('registrado');
        }

    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/Registrado/contraseniaActualUsuario.php');
    require_once('../Vista/General/pie.html');       
}

/*Cargar el formulario de cambiar contraseña del usuario*/
function formuContraUsuario(){
    if(isset($_POST["contraActual"])){
        require_once('../Modelo/class.galletas.php');
        require_once('../Modelo/class.usuarios.php');

        /*Variables inizializada para evitar errores*/
        $mensajeError = false;
        $mensajeError2 = false;
        
        $usu = new usuarios();

        /*Variable de sesion para la cabecera*/
        $tipo = is_session('registrado');

        /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
            $NombreUsu = get_session('registrado');
        }

        /*Se obtiene la contraseña encriptada del usuario*/
        $hashAlmacenado=$usu->contraActualUsuario($idUsu);

        /*Si está coincide con la introducida por el usuario, se cargará el formulario de cambiar la contraseña*/
        if(password_verify($_POST["contra"], $hashAlmacenado)){
            require_once('../Vista/General/cabecera.php');
            require_once('../Vista/Registrado/modificarContraUsuario.php');
            require_once('../Vista/General/pie.html');               
        }else{
            /*Variables inizializada para evitar errores*/
            $mensajeError = true;
            require_once('../Vista/General/cabecera.php');
            require_once('../Vista/Registrado/contraseniaActualUsuario.php');
            require_once('../Vista/General/pie.html');
        }

    }
}

/*Modificar contraseña del usuario*/
function cambiarContraUsuario(){
    if(isset($_POST["cambioContra"])){
        require_once('../Modelo/class.galletas.php');
        require_once('../Modelo/class.usuarios.php');
    
        $usu = new usuarios();

        /*Variable de sesion para la cabecera*/
        $tipo = is_session('registrado');

        /*Foto de perfil del usuario en el menú navbar*/
        if((isset($tipo)) && ($tipo == 1)){
            $idUsu = $usu->obtenerIdUsu(get_session('registrado'));
            $fotoUsuario = $usu->obtenerUrlImagen($idUsu);
            $NombreUsu = get_session('registrado');
        }
    
        /*Comparar que la contraseña y la repetición son idénticas*/
        if(strcmp($_POST["contra"], $_POST["contraRepe"])==0){
    
            $longitud = strlen($_POST["contra"]);
            
            /*Si la contraseña tiene más de 12 carácteres se procederá al cambio. Una vez se haga el cambio, se cerrará la sesión y se cargará el login*/
            if($longitud >= 12){          
                $password_hash = password_hash($_POST["contra"], PASSWORD_DEFAULT);
                $usu->modificarContraUsu($password_hash, $idUsu);
        
                unset_session();
                header("Location: control_inicioRegistroUsuario.php?action=mostrarLogin");
                
            }else{
                /*Variables inizializada para evitar errores*/
                $mensajeError = true;
                $mensajeError2 = false;
                require_once('../Vista/General/cabecera.php');
                require_once('../Vista/Registrado/modificarContraUsuario.php');
                require_once('../Vista/General/pie.html');
            }
        }else{
            /*Variables inizializada para evitar errores*/
            $mensajeError = false;
            $mensajeError2 = true;
            require_once('../Vista/General/cabecera.php');
            require_once('../Vista/Registrado/modificarContraUsuario.php');
            require_once('../Vista/General/pie.html');
        }  
    }
}


/*
=====================
Se cerrará la sesión
=====================
*/
function cerrar(){
    require_once('../Modelo/class.galletas.php');
    unset_session();
    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/General/login.php');
    require_once('../Vista/General/pie.html');
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