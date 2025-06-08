<main>

          <section class="mt-20 h-280 mx-auto flex items-center justify-center bg-center bg-no-repeat bg-[url('../ServidorImg/banner.jpg')] bg-gray-700 bg-blend-multiply">           
            <div class="w-sm md:w-xl p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 md:p-8">
                <form class="space-y-6" action="../Controlador/control_perfilUsuarioAdministrador.php?action=actualizarPerfilUsuarioAdministrador" method="POST" enctype="multipart/form-data">

                    <?php
                        if($mensajeError == true){
                            echo '
                                <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                                <span class="font-medium">Error!</span> El nombre de usuario ya está en uso.
                                </div>
                            ';
                        }elseif($mensajeError2 == true){
                            echo '
                                <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                                <span class="font-medium">Error!</span> El correo ya está en uso.
                                </div>
                            ';
                        }elseif($mensajeError3 == true){
                            echo '
                                <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                                <span class="font-medium">Error!</span> El archivo pesa más de 10MB.
                                </div>
                            ';
                        }elseif($mensajeError4 == true){
                            echo '
                                <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                                <span class="font-medium">Error!</span> La foto debe medir mínimo 184x184px.
                                </div>
                            ';
                        }      
                    ?>

                    <h5 class="text-xl font-medium text-white text-center">Editar Perfil</h5>

                    <div class="text-center">                 
                        <label class="block mb-2 text-sm font-medium text-white" for="user_avatar">Imagen Perfil Usuario Actual</label>
                        <?php echo '<img src="'.$lista[0].'" class="w-20 h-20 rounded-full mx-auto">'; ?>

                        <input class="block mt-5 w-full text-sm border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" name="imagen" accept="image/*" onchange="mostrarVistaPrevia(this)" aria-describedby="user_avatar_help" id="imagenPerUsu" type="file">
                        <div class="mt-1 text-sm text-gray-300" id="user_avatar_help">Tamaño mínimo 184x184px Máximo 10MB</div>   
                             
                        <label for="preview" class="block mb-2 text-sm font-medium text-white">Imagen Perfil Usuario Nueva:</label>
                        <img id="preview" src="#" alt="Vista previa" style="display: none; max-width: 100px; margin: auto;">
                    </div>

                    <div>
                        <label for="nom" class="block mb-2 text-sm font-medium text-white">Nombre</label>                                  
                        <input type="text" name="nombre" class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400" required id="nom" placeholder="nombre de usuario" <?php echo "value='".$lista[1]."'"?> maxlength="25">                   
                    </div>

                    <div>
                        <label for="bio" class="block mb-2 text-sm font-medium text-white">Biografía</label>
                        <input type="text" name="biogra" class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400" required id="bio" placeholder="Plataforma" <?php echo "value='".$lista[2]."'"?> maxlength="500">
                    </div>

                    <div class="flex justify-center">
                        <div>
                          <?php echo '<a class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer" href="../Controlador/control_perfilUsuarioAdministrador.php?action=formuContraUsuarioAdministrador&idUsu='.$lista[5].'">Cambiar contraseña</a>'; ?>
                        </div>
                    </div>

                    <label for="cor" class="block mb-2 text-sm font-medium text-white">Correo Electronico</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm border border-e-0 rounded-s-md bg-gray-600 text-gray-400 border-gray-600">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                            </svg>
                        </span>
                        <input type="text" name="correo" id="cor" class="rounded-none rounded-e-lg border block flex-1 min-w-0 w-full text-sm p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Correo Electronico" <?php echo "value=".$lista[3].""?> maxlength="100" required >                  
                    </div>

                    <div>
                      <label for="Tipo" class="block mb-2 text-sm font-medium text-white">Tipo de usuario</label>
                      <select name="estado" required class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                          <?php 
                              if(strcmp($lista[4], "registrado")==0){
                                  echo '<option value='.$lista[4].' selected>'.$lista[4].'</option>';
                                  echo '<option value="administrador">administrador</option>';
                                  echo '<option value="suspendido">suspendido</option>';
                              }elseif(strcmp($lista[4], "administrador")==0){
                                  echo '<option value='.$lista[4].' selected>'.$lista[4].'</option>';
                                  echo '<option value="registrado">registrado</option>';
                                  echo '<option value="suspendido">suspendido</option>';
                              }else{
                                  echo '<option value='.$lista[4].' selected>'.$lista[4].'</option>';
                                  echo '<option value="registrado">registrado</option>';
                                  echo '<option value="administrador">administrador</option>';
                              }                                                     
                          ?>                      
                      </select>
                    </div>
                                  
                    <input type="hidden" name="usuId" class="form-control bg-secondary-subtle" <?php echo "value=".$lista[5].""?>>

                    <input type="submit" value="Enviar" name="actualizar" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">

                </form>

            </div>               
        </section>
                                                                                   
          <script>           
            /*Mostrar previsualización de la imagen*/
            function mostrarVistaPrevia(input) {
                    const preview = document.getElementById('preview');
                    if (input.files && input.files[0]) {
                        const lector = new FileReader();

                        lector.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        };

                        lector.readAsDataURL(input.files[0]);
                    }
            }
        </script>

</main>
              

