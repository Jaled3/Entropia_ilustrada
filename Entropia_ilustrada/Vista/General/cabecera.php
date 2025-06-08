<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    
    <style type="text/tailwindcss">
        @theme {
            --font-titulo: 'Poppins', sans-serif;
            --color-color1: #E4E8E9;
            --color-color2: #1C3341;
            --color-color3: #192030;
            --shadow-2xs: 0 1px rgb(0 0 0 / 0.05);
        }
    </style>
</head>
<body class="bg-color1 font-titulo">
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  <script src="nav.js"></script>
    <header>

    <!-- Esto sirve para cambiar el color de los enlaces en la navbar según si están en la página correspondiente -->
      <?php
        $currentUrl = $_SERVER['REQUEST_URI'];
        $inicio = (strpos($currentUrl, 'control_publicacion.php?action=cargarPublicacionesInicio') !== false) ? 'text-blue-500' : 'text-white hover:text-blue-500';
        $buscador = (strpos($currentUrl, 'control_buscador.php?action=buscarPubliNombre') !== false) ? 'text-blue-500' : 'text-white hover:text-blue-500';
        $crearPublicacion = (strpos($currentUrl, 'control_publicacion.php?action=crearPublicacion') !== false) ? 'text-blue-500' : 'text-white hover:text-blue-500';
        $usuarios = (strpos($currentUrl, 'control_usuariosAdministrador.php?action=cargarUsuariosAdminitrador') !== false) ? 'text-blue-500' : 'text-white hover:text-blue-500';
        $reportes = (strpos($currentUrl, 'control_reportesAdministrador.php?action=cargarReportesAdministrador') !== false) ? 'text-blue-500' : 'text-white hover:text-blue-500';
      ?>

      <nav class="bg-color2 fixed w-full z-50 top-0 start-0 border-b border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

            <!-- Logo + boton de Get started -->
            <a href="../Controlador/control_inicioRegistroUsuario.php?action=cargarLanding" class="flex items-center space-x-4 rtl:space-x-reverse">
                <img src="../ServidorImg/logo_entropia.png" class="h-12" alt="">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Entropia Ilustrada</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">                        
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            
            <!-- Menú del usuario -->
            <?php
              if((isset($tipo)) && ($tipo == 1)){
                echo '
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                  <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                      <span class="sr-only">Open user menu</span>
                      <img class="w-8 h-8 rounded-full" src="'.$fotoUsuario.'" alt="user photo">               
                  </button>';

                // Dropdown menu 
                echo '
                  <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm" id="user-dropdown">

                    <div class="px-4 py-3">
                      <span class="block text-sm text-gray-900">'.$NombreUsu.'</span>
                    </div>

                    <ul class="py-2" aria-labelledby="user-menu-button">

                      <li>                                                               
                          <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="../Controlador/control_perfilUsuario.php?action=mostrarPerfil">Ver perfil</a>                                                                   
                      </li>

                      <li>                                       
                          <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="../Controlador/control_perfilUsuario.php?action=modificarPerfilUsuario">Configuración</a>                                        
                      </li>

                      <li>                                         
                          <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="../Controlador/control_inicioRegistroUsuario.php?action=cerrar">Salir</a>                                           
                      </li>

                    </ul>
                  </div>               
                </div>
                ';
              }          
            ?>
            

            <!-- Menu desplegable de la aplicación -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col items-center p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-bg-color2 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-color2">

                    <li>
                      <a href="../Controlador/control_publicacion.php?action=cargarPublicacionesInicio" class="block py-2 px-3 md:p-0 <?= $inicio ?>">Inicio</a>
                    </li>
                    
                    <li>
                      <a href="../Controlador/control_buscador.php?action=buscarPubliNombre" class="block py-2 px-3 md:p-0 <?= $buscador ?>">Buscar</a>
                    </li>

                    <?php
                      if((isset($tipo)) && ($tipo == 1)){
                        echo '<li><a class="block py-2 px-3 md:p-0 '.$crearPublicacion.'" href="../Controlador/control_publicacion.php?action=crearPublicacion">Crear publicacion</a></li>';
                      }
                                         
                      if((isset($tipo2)) && ($tipo2 == 1)){
                          echo '<li><a class="block py-2 px-3 md:p-0 '.$usuarios.'" href="../Controlador/control_usuariosAdministrador.php?action=cargarUsuariosAdminitrador">Usuarios</a></li>';
                      }
                    
                      if((isset($tipo2)) && ($tipo2 == 1)){
                          echo '<a class="block py-2 px-3 md:p-0 '.$reportes.'" href="../Controlador/control_reportesAdministrador.php?action=cargarReportesAdministrador">Reportes</a>';
                      }
                    ?>                
                
                </ul>
            </div>
              <?php                     
                if((isset($tipo2)) && ($tipo2 == 1)){
                  echo '
                  <div class="flex items-center font-medium md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse my-3">
                    <a class="block py-2 px-3 mx-2 text-white hover:text-blue-500 md:p-0" href="../Controlador/control_inicioRegistroUsuario.php?action=cerrar">Cerrar sesión</a>
                    <a  href="../Controlador/control_inicioRegistroUsuario.php?action=cerrar">
                      <svg class="w-6 h-6 text-white hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                      </svg>                
                    </a>
                  </div>
                  ';
                }elseif(!((isset($tipo)) && ($tipo == 1)) && !((isset($tipo2)) && ($tipo2 == 1))){
                  echo '
                  <div class="flex items-center font-medium md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse my-3">
                    <button type="button" class="text-white hover:text-blue-500 mx-3 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm py-2 px-3 text-center border border-white hover:bg-gray-100"><a href="../Controlador/control_inicioRegistroUsuario.php?action=mostrarLogin">Iniciar Sesión</a></button>
                    <button type="button" class="text-white hover:text-blue-500 mx-3 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm py-2 px-3 text-center border border-white hover:bg-gray-100"><a href="../Controlador/control_inicioRegistroUsuario.php?action=mostrarRegistro">Registro</a></button>
                  </div>
                  ';
                }
              ?>
            </div>
        </nav>                                                                                                                                                                   
    </header>
    
</body>
</html>