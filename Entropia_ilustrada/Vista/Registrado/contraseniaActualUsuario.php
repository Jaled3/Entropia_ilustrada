<main>

    <section class="mt-15 h-180 mx-auto flex items-center justify-center bg-[url(../ServidorImg/libreria.jpg)] bg-no-repeat bg-cover bg-gray-700 bg-blend-multiply">           
        <div class="w-full max-w-sm p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 md:p-8">
            <form class="space-y-6" action="../Controlador/control_perfilUsuario.php?action=formuContraUsuario" method="POST">

                <?php
                if($mensajeError == true){
                    echo '
                    <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                        <span class="font-medium">Error!</span> La contraseña es incorrecta.
                    </div>
                    ';
                }     
                ?>

                <h5 class="text-xl font-medium text-white text-center">Cambiar Contraseña</h5>
          
                <div>
                    <label for="contra" class="block mb-2 text-sm font-medium text-white">Contraseña Actual</label>
                    <input type="password" name="contra" id="contra" class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400" maxlength="60" required >
                </div>
       
                <input type="submit" value="Enviar" name="contraActual" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer" >

            </form>
        </div>               
    </section>

</main>