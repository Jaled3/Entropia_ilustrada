<main>
    
    <section class="mt-15 h-200 mx-auto flex items-center justify-center bg-center bg-no-repeat bg-[url('../ServidorImg/libreria.jpg')] bg-gray-700 bg-blend-multiply">           
        <div class="w-full max-w-sm p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 md:p-8">
            <form class="space-y-6" action="../Controlador/control_inicioRegistroUsuario.php?action=inicio" method="POST">
            
            <?php
                if($mensajeError == true){
                    echo '
                        <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                        <span class="font-medium">Error!</span> Usuario o contraseña incorrecta.
                        </div>
                    ';
                }elseif($mensajeError2 == true){
                    echo '
                        <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                        <span class="font-medium">Error!</span> Tu cuenta ha sido suspendida.
                        </div>
                    ';
                }      
            ?>             

                <h5 class="text-xl font-medium text-white">Iniciar Sesión</h5>

                <label for="nom" class="block mb-2 text-sm font-medium text-white">Nombre de usuario</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm border border-e-0 rounded-s-md bg-gray-600 text-gray-400 border-gray-600">
                        <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>
                    </span>
                    <input type="text" name="nom" id="nom" class="rounded-none rounded-e-lg border block flex-1 min-w-0 w-full text-sm p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500" placeholder="Nombre de la cuenta" required value=<?php if(isset($_COOKIE["usuario"])) echo $_COOKIE["usuario"]?> >                  
                </div>

                <div>
                    <label for="contra" class="block mb-2 text-sm font-medium text-white">Contraseña</label>
                    <input type="password" name="contra" id="contra" class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400" required >
                </div>

                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" name="rec" value="" class="w-4 h-4 bg-gray-700 border border-gray-600 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800" <?php if(isset($_COOKIE["usuario"])) echo "checked";?> >
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-300">Recordar usuario</label>
                    </div>
                </div>

                <input type="submit" value="Enviar" name="iniciar" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer" >

                <div class="text-sm font-medium text-gray-300">
                    ¿No estás registrado? <a href="../Controlador/control_inicioRegistroUsuario.php?action=mostrarRegistro" class="text-blue-500 hover:underline">Crear cuenta</a>
                </div>

            </form>
        </div>               
    </section>

</main>

