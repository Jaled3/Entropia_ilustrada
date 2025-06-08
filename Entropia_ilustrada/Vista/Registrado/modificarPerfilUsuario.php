<main>
                
    <section class="h-100 flex items-center justify-center">           
        <div class="border-b border-gray-700">
            <?php
                echo '<h2 class="text-center text-xl">'.$NombreUsu.'</h2>';
                echo '<img src="'.$fotoUsuario.'" class="w-20 h-20 rounded-full mx-auto">'; 
             ?>
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-400">
                <li class="me-2">
                    <?php 
                        if($idUsu == $idUsu2){
                            echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfil" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-300 group">';
                        }else{
                            echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno='.$idUsu.'" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-300 group">';
                        }                   
                    ?>
                        <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z" clip-rule="evenodd"/>
                        </svg>
                        Perfil
                    </a>
                </li>
                <li class="me-2">
                    <?php echo '<a href="../Controlador/control_PublicacionesUsuarios.php?action=cargarPublicacionesUsuario&idPerfil='.$idUsu.'" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-300 group">';?>
                        <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Zm.394 9.553a1 1 0 0 0-1.817.062l-2.5 6A1 1 0 0 0 8 19h8a1 1 0 0 0 .894-1.447l-2-4A1 1 0 0 0 13.2 13.4l-.53.706-1.276-2.553ZM13 9.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd"/>
                          </svg>
                          Publicaciones
                    </a>
                </li>
                <li class="me-2">
                    <?php echo '<a href="../Controlador/control_PublicacionesFavoritas.php?action=cargarPublicacionesFavoritasUsuario&idPerfil='.$idUsu.'" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-300 group">';?>
                        <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                          Favoritos
                    </a>
                </li>
                <li class="me-2">
                    <?php echo '<a href="../Controlador/control_PublicacionesBoceto.php?action=cargarPublicacionesBocetosUsuario&idPerfil='.$idUsu.'" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-300 group">';?>
                        <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                        </svg>                          
                          Bocetos
                    </a>
                </li>
            <?php
                if($idUsu == $idUsu2){
                    echo '
                        <li class="me-2">
                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-500 border-b-2 border-blue-500 rounded-t-lg active group" aria-current="page">
                                <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z"/>
                                </svg>Modificar Perfil
                            </a>
                        </li>
                        
                        <li class="me-2">
                            <a href="../Controlador/control_reportes.php?action=cargarReportesUsuario" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-300 group">
                                <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.09 3.294c1.924.95 3.422 1.69 5.472.692a1 1 0 0 1 1.438.9v9.54a1 1 0 0 1-.562.9c-2.981 1.45-5.382.24-7.25-.701a38.739 38.739 0 0 0-.622-.31c-1.033-.497-1.887-.812-2.756-.77-.76.036-1.672.357-2.81 1.396V21a1 1 0 1 1-2 0V4.971a1 1 0 0 1 .297-.71c1.522-1.506 2.967-2.185 4.417-2.255 1.407-.068 2.653.453 3.72.967.225.108.443.216.655.32Z"/>
                                </svg>
                                Ver Reportes
                            </a>
                        </li>
                    ';
                }
            ?>
            </ul>
        </div>     
    </section>

        <section class="h-190 mx-auto flex items-center justify-center bg-[url(../ServidorImg/libreria.jpg)] bg-no-repeat bg-cover xl:h-280 bg-gray-700 bg-blend-multiply">           
            <div class="w-sm md:w-xl p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 md:p-8">
                <form class="space-y-6" action="../Controlador/control_perfilUsuario.php?action=actualizarPerfilUsuario" method="POST" enctype="multipart/form-data">

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

                    <div class="flex justify-between">
                        <div>
                            <a class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer" href="../Controlador/control_perfilUsuario.php?action=formuContraActual">Cambiar contraseña</a>
                        </div>
                        <div>
                            <a class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer" href="../Controlador/control_perfilUsuario.php?action=formuBorrarCuenta">Borrar cuenta</a>
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
                        <input type="text" name="correo" id="cor" class="rounded-none rounded-e-lg border focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500" placeholder="Correo Electronico" <?php echo "value=".$lista[3].""?> maxlength="100" required >                  
                    </div>
                                    
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