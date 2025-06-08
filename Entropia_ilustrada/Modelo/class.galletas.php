<?php

    /*Creación de la cookie*/
    function set_Cookie(String $nombre, $val){
        setcookie($nombre, $val, time()+(86400*30));
    }

    /*Borrar Cookie*/
    function unset_Cookie(String $nombre){
        $comp = false;

        if(isset($_COOKIE[$nombre])){
            set_Cookie($nombre,'',time()-30);
            $comp = true;
        }

        return $comp;
    }

    /*Inicio de sesión*/
    function start_session(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    /*Crear sesión*/
    function set_session(String $nom, $val){
        start_session();
        $_SESSION[$nom] = $val;
    }

    /*Recuperar sesión*/
    function get_session(String $nom){
        start_session();
        return $_SESSION[$nom];
    }

    /*Crear sesión*/
    function unset_session(){
        start_session();
        session_unset();
        session_destroy();
    }

    /*Comprobar sesión*/
    function is_session(String $nom){
        start_session();
        $isset = isset($_SESSION[$nom]);

        return $isset;
    }

?>