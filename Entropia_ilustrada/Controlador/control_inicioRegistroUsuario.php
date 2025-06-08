<?php
require_once('../Modelo/class.db.php');

/*Carga la vista landing*/
function cargarLanding(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    
    $usu = new usuarios();

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
    require_once('../Vista/General/landing.php');
    require_once('../Vista/General/pie.html');
}

/*Carga las preguntas frecuentes*/
function cargarFaq(){
    require_once('../Modelo/class.galletas.php');
    require_once('../Modelo/class.usuarios.php');
    
    $usu = new usuarios();

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
    require_once('../Vista/General/faq.html');
    require_once('../Vista/General/pie.html');
}

/*Permite el inicio de sesión, llevará a la página de inicio*/
function inicio(){
    if(isset($_POST["iniciar"])){
        require_once('../Modelo/class.galletas.php');
        require_once('../Modelo/class.usuarios.php');

        $usu = new usuarios();

        /*Se borrará la cookie de inicio de sesión si el usuario previamente la había habilitado*/
            if(isset($_POST["rec"])){
                unset_Cookie("usuario");
            }

        /*Comprobar que el usuario exista en la bd*/      
            $hashAlmacenado=$usu->loginUsuario($_POST["nom"]);

            if(password_verify($_POST["contra"], $hashAlmacenado)){
                /*Si recordar está habilitado, entonces el nombre se autocompletará en el formulario*/
                    if(isset($_POST["rec"])){
                        set_Cookie("usuario", $_POST["nom"]);
                    }
        
                /*Si el usuario es Admin, se le creará una sesión de administrador. En caso contrario, se creará una sesión de registrado. Se cargará la vista de publicaciones Inicio*/
                    if($usu->compAdmin($_POST["nom"])){
                        /*Cargar las publicaciones de Inicio*/
                        set_session('admin', $_POST["nom"]);
                        header("Location: control_publicacion.php?action=cargarPublicacionesInicio");                      
                    }else{
                        /*Comprobar que el usuario no está suspendido de la aplicacion. En caso de que esté suspendido, saltará un mensaje de error*/
                        if(!($usu->compTipo($_POST["nom"]))){
                            /*Cargar las publicaciones de Inicio*/
                            set_session('registrado', $_POST["nom"]);                           
                            header("Location: control_publicacion.php?action=cargarPublicacionesInicio");                         
                        }else{
                            /*Si el usuario está suspendido saltará un mensaje de error*/
                            $mensajeError = false;
                            $mensajeError2 = true;
                            require_once('../Vista/General/cabecera.php');
                            require_once('../Vista/General/login.php');
                            require_once('../Vista/General/pie.html');
                        }
                    }
            }else{
                /*Si el usuario o la contraseña es erronea saltará un mensaje de error*/
                $mensajeError = true;
                $mensajeError2 = false;
                require_once('../Vista/General/cabecera.php');
                require_once('../Vista/General/login.php');           
                require_once('../Vista/General/pie.html');
            }
        
    }
}

/*Cargar formulario login*/
function mostrarLogin(){
    /*Variables inizializada para evitar errores*/
    $mensajeError = false;
    $mensajeError2 = false;
    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/General/login.php');
    require_once('../Vista/General/pie.html');
}

/*Cargar formulario registro*/
function mostrarRegistro(){
    /*Variables inizializada para evitar errores*/
    $mensajeError = false;
    $mensajeError2 = false;
    $mensajeError3 = false;
    require_once('../Vista/General/cabecera.php');
    require_once('../Vista/General/registro.php');
    require_once('../Vista/General/pie.html');
}

/*Permite registrar un nuevo usuario*/
function registrar(){
    if(isset($_POST["registro"])){
        require_once('../Modelo/class.galletas.php');
        require_once('../Modelo/class.usuarios.php');

        $usu = new usuarios();

        /*El correo se insertará en minúscula*/
        $correoInser = strtolower($_POST["correo"]);

        /*Comprobar que el nombre no esté en bd*/
        if($usu->compUsuario($_POST["nom"]) || $usu->compUsuarioCorreo($correoInser)){
            /*Fallo de registro de sesión nombre o contraseña en uso*/
            $mensajeError = false;
            $mensajeError2 = true;
            $mensajeError3 = false;
            require_once('../Vista/General/cabecera.php');
            require_once('../Vista/General/registro.php');
            require_once('../Vista/General/pie.html');        
        }else{
            /*Comparar que la contraseña y la repetición son idénticas*/
            if(strcmp($_POST["contra"], $_POST["contraRepe"])==0){

                $longitud = strlen($_POST["contra"]);
                
                /*Si la longitud, supera los 12 carácteres, se procede a la creación de la cuenta*/
                if($longitud >= 12){
                    /*Al crear el usuario, se insertará un usuario con una imagen predefinida*/
                    $ImagenPrede = "../ServidorImg/predefinido.png";
                    
                    /*Al crear el usuario, se insertará un usuario con una biografía predefinida*/
                    $bioPrede = "sobre mi";

                    $fechaHoy = date("Y-m-d");

                    /*La contraseña se cifra*/
                    $password_hash = password_hash($_POST["contra"], PASSWORD_DEFAULT);
    
                    /*Inserción del usuario en la bd. Después, crear sesión registrado y cargar la vista de publicaciones inicio*/
                    $usu->inserUsuario($_POST["nom"], $password_hash, $ImagenPrede, $bioPrede, $fechaHoy, $correoInser);
                    
                    /*Cargar las publicaciones de Inicio*/
                    set_session('registrado', $_POST["nom"]);
                    header("Location: control_publicacion.php?action=cargarPublicacionesInicio");                                                        
                }else{
                    /*Fallo de registro de sesión contraseña corta*/
                    $mensajeError = true;
                    $mensajeError2 = false;
                    $mensajeError3 = false;
                    require_once('../Vista/General/cabecera.php');
                    require_once('../Vista/General/registro.php');                     
                    require_once('../Vista/General/pie.html');
                }
            }else{            
                /*Fallo de registro de sesión las contraseñas no coinciden*/
                $mensajeError = false;
                $mensajeError2 = false; 
                $mensajeError3 = true;             
                require_once('../Vista/General/cabecera.php');
                require_once('../Vista/General/registro.php');
                require_once('../Vista/General/pie.html');
            }
        }
    }
}

/*
=====================
Se cerrará la sesión
=====================
*/
function cerrar(){
    /*Variable inizializada para evitar errores*/
    $mensajeError = false;
    $mensajeError2 = false;
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