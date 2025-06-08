<main>

    <section class="mt-20 h-170 mx-auto flex items-center justify-center bg-[url(../ServidorImg/libreria.jpg)] bg-no-repeat bg-cover bg-gray-700 bg-blend-multiply">           
      <div class="w-full max-w-sm p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 md:p-8">
        <form class="space-y-6" action="../Controlador/control_perfilUsuario.php?action=BorrarCuentaUsuario" method="POST">

            <?php
              if($mensajeError == true){
                echo '
                  <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                    <span class="font-medium">Error!</span> El correo es incorrecto.
                  </div>
                ';
              }elseif($mensajeError2 == true){
                echo '
                  <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                    <span class="font-medium">Error!</span> El nombre es incorrecto.
                  </div>
                ';
              }elseif($mensajeError3 == true){
                echo '
                  <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                    <span class="font-medium">Error!</span> La contraseña es incorrecta.
                  </div>
                ';
              }      
            ?>

            <h5 class="text-xl font-medium text-white text-center">Borrar Cuenta</h5>

              <div>      
                <?php echo '<img src="'.$lista[0].'" class="w-24 h-24 mb-3 mx-auto rounded-full shadow-lg">'; ?>
              </div>

              <div>
                <label for="nom" class="block mb-2 text-sm font-medium text-white">Nombre</label>                                  
                <input type="text" name="nombre" class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400" required id="nom" placeholder="Nombre de la cuenta" maxlength="25">                   
              </div>

              <div>
                <label for="contra" class="block mb-2 text-sm font-medium text-white">Contraseña</label>
                <input type="password" name="contra" id="contra" class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400" maxlength="60" required >
              </div>

              <label for="cor" class="block mb-2 text-sm font-medium text-white">Correo</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm bg-gray-600 border border-e-0 rounded-s-md text-gray-400 border-gray-600">
                        <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                        </svg>
                    </span>
                    <input type="text" name="correo" id="cor" class="rounded-none rounded-e-lg border focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="Correo Electronico" maxlength="100" required >                  
              </div>
                               
              <input type="submit" value="Enviar" name="BorrarCuenta" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">

        </form>
      </div>               
    </section>
                           
</main>

              
          
       
