<main>
  
    <section class="h-100 flex items-center justify-center">           
        <div class="border-b border-gray-700">
            <?php
                echo '<h2 class="text-center text-xl">'.$nombreUsuarioNav.'</h2>';
                echo '<img src="'.$fotoUsuarioNav.'" class="w-20 h-20 rounded-full mx-auto">'; 
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
                    <a href="#" class="inline-flex items-center justify-center p-4 text-blue-500 border-b-2 border-blue-500 rounded-t-lg active group" aria-current="page">
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
                            <a href="../Controlador/control_perfilUsuario.php?action=modificarPerfilUsuario" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-300 hover:border-gray-300 group">
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

        <section class="h-auto flex flex-col justify-center items-center p-10 bg-center bg-repeat bg-[url('../ServidorImg/patron.jpg')] bg-gray-600 bg-blend-multiply">
                <div id="contenedor-publicaciones" class="flex flex-row flex-wrap justify-center items-center text-center gap-10">
                    <?php

                    if($lista == NULL){
                        echo '
                            <section class="h-40 mx-auto mb-40 flex items-center justify-center">           
                                    <div class="flex flex-col flex-wrap items-center justify-center">   
                                        <div class="bg-color3 w-sm mx-auto rounded-xl shadow-xl">                                              
                                            <h2 class="text-2xl my-4 font-bold tracking-tight text-white text-center">No hay publicaciones</h2>                                              
                                        </div>          
                                    </div>        
                            </section>
                        ';
                    }

                    foreach ($lista as $id => $value) {
                        echo '<div class="publicacion">';
                        echo '<a href="../Controlador/control_publicacion.php?action=postPublicacion&id=' . $id . '"><img src="' . $value[1] . '" class="h-auto w-xs rounded-lg shadow-gray-500 hover:shadow-lg mb-10"></a>';
                        echo '<a href="../Controlador/control_publicacion.php?action=postPublicacion&id=' . $id . '" class="rounded-md px-3.5 py-2.5 font-semibold text-color2 shadow-xs bg-color1 hover:not-focus:bg-color1/90">' . $value[0] . '</a>';
                        echo '</div>';
                    }
                    ?>
                </div>
        </section>

        <div id="cargando" style="display: none;">
            
        </div>

        <div id="final" style="display: none;">
            
        </div>
        
        <script>
            const idUsu = "<?php echo isset($idUsu) ? addslashes($idUsu) : ''; ?>";
            let offset = 10; // Empezamos con 10 porque ya cargamos las primeras
            const limit = 10;
            let cargando = false;
            let finPublicaciones = false; // Variable para saber si ya no hay más publicaciones

        function cargarPublicaciones() {
            if (cargando || finPublicaciones) return; // Evita más cargas si ya llegamos al final
            cargando = true;
            document.getElementById('cargando').style.display = 'block';

            fetch(`../Controlador/control_PublicacionesUsuarios.php?action=getPosts&offset=${offset}&idPerfil=${encodeURIComponent(idUsu)}`)
            .then(response => response.json())
            .then(data => {
                if (Object.keys(data).length > 0) {

                // Invertimos el array para mantener el orden correcto
                const publicaciones = Object.entries(data).reverse();

                    for (const [id, post] of publicaciones) {
                        let postHtml = `
                            <div class="publicacion">
                                <a href="../Controlador/control_publicacion.php?action=postPublicacion&id=${id}"><img src="${post[1]}" class="h-auto w-xs rounded-lg shadow-gray-500 hover:shadow-lg mb-10"></a>
                                <a href="../Controlador/control_publicacion.php?action=postPublicacion&id=${id}" class="rounded-md px-3.5 py-2.5 font-semibold text-color2 shadow-xs bg-color1 hover:not-focus:bg-color1/90">${post[0]}</a>
                            </div>
                        `;
                        document.getElementById('contenedor-publicaciones').innerHTML += postHtml;
                    }

                    offset += limit;

                } else {
                    // Si ya no hay más publicaciones, mostramos el mensaje final
                    finPublicaciones = true;
                    document.getElementById('final').style.display = 'block';
                }

                cargando = false;
                document.getElementById('cargando').style.display = 'none';
            })
            .catch(error => console.error('Error al cargar publicaciones:', error));
        }

        // Detectar scroll para cargar más publicaciones
        window.addEventListener('scroll', () => {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 50) {
                cargarPublicaciones();
            }
        });
        </script>

</main>