<main>
   
        <section class="h-auto mx-auto flex items-center justify-center mt-23 sm:mt-20 bg-cover bg-no-repeat bg-[url('../ServidorImg/libreria.jpg')] bg-gray-700 bg-blend-multiply p-5">           
            <div class="flex flex-col flex-wrap items-center justify-center">      
                <?php
                    /*Publicación foto*/
                    echo '
                        <a href="'.$lista[5].'" target="_blank">
                            <img src="'.$lista[5].'" class="w-sm mx-auto md:w-2xl lg:w-lg xl:w-2xl h-auto my-10 rounded">
                        </a>              
                    ';
                ?>
                
                <div class="bg-color3 w-sm sm:w-xl md:w-2xl lg:w-4xl mx-auto rounded-xl shadow-xl p-7">   
                    
                    <div class="flex flex-wrap items-center justify-between text-center">
                        <div class="flex items-center">
                            <?php
                            /*Foto y nombre del autor de la publicación*/
                            if(!($idUsu == $lista[8])){
                                echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno='.$lista[8].'"><img src="'.$lista[1].'" class="w-10 h-10 rounded-full mx-5"></a>';                                 
                            }else{
                                echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfil"><img src="'.$lista[1].'" class="w-10 h-10 rounded-full mx-5"></a>'; 
                            } 
                                echo '<h2 class="mb-2 text-2xl tracking-tight text-white">'.$lista[2].'</h2>';
                            ?>                                         
                        </div>                
                        <div>
                            <?php
                                /*Fecha de la creación de la publicación*/
                                echo '<h2 class="mb-2 text-2xl tracking-tight text-white">'.$lista[7].'</h2>';
                            ?>
                        </div>                   
                    </div>

                    <div class="flex-col items-center my-8">     
                        <?php
                            /*Título y descripción*/
                            echo '<h2 class="text-2xl font-bold tracking-tight text-white text-center mb-5">'.$lista[3].'</h2>';
                            echo '<p class="text-lg text-gray-300 w-xs sm:w-lg md:w-xl lg:w-3xl mx-auto">'.$lista[4].'</p>';
                        ?>                                                             
                    </div>   
                    
                    <div class="flex items-center justify-between text-center">
                        <div>
                            <?php
                                /*Etiqueta de la categoría*/
                                echo '<h2 class="mb-2 text-2xl italic tracking-tight text-white">#'.$lista[6].'</h2>';
                            ?>
                        </div>
                        <div class="flex items-center text-center rounded-md px-3.5 py-2.5 font-semibold text-white shadow-xs underline underline-offset-3 decoration-white">
                            <?php
                                /*Likes y cantidad de likes de la publicacion*/
                                if(isset($nUsu) && (isset($tipo)) && ($tipo == 1) && (strcmp($lista[9], "mostrar") == 0)){
                                    if(isset($estaLike)){
                                        echo '<a href="../Controlador/control_likes.php?action=quitarLike&id='.$lista[0].'"><img src="../ServidorImg/noLike.png" class="w-10 h-10 mr-5"></a>';
                                    }else{
                                        echo '<a href="../Controlador/control_likes.php?action=publicarLike&id='.$lista[0].'"><img src="../ServidorImg/like.png" class="w-10 h-10 mr-5"></a>';
                                    }
                                }else{
                                    echo '<img src="../ServidorImg/Like.png" class="w-10 h-10 mr-5">';
                                }

                                if(isset($cantidad)){
                                    echo '<h2>Likes '.$cantidad.'</h2>';
                                }
                            ?>                           
                        </div>
                    </div>

                    <div class="flex justify-evenly items-center text-center">     
                        <?php
                            /*Botón de editar y borrar publicación*/
                            if(isset($nUsu) && (isset($tipo)) && ($tipo == 1) && (strcmp($lista[9], "mostrar") == 0)){
                                if(($idUsu == $lista[8])){                  
                                    echo '<a class="text-lg font-bold tracking-tight text-white" href="../Controlador/control_publicacion.php?action=FormuEditarPublicacion&idPub='.$lista[0].'"><img src="../ServidorImg/lapiz.png" class="w-10 h-10 mx-auto">Editar publicación</a>';
                                    
                                    echo '<a class="text-lg font-bold tracking-tight text-white" href="../Controlador/control_publicacion.php?action=borrarPubliUsu&idPub='.$lista[0].'"><img src="../ServidorImg/basura.png" class="w-10 h-10 mx-auto">Borrar publicación</a>';                
                                }

                                /*Botón de reportar e ir al reporte*/
                                if(!($idUsu == $lista[8])){

                                    if(isset($estaRep)){
                                        echo '<a class="text-lg font-bold tracking-tight text-white" href="../Controlador/control_reportes.php?action=cargarReporteEspecifico&idPub='.$lista[0].'"><img src="../ServidorImg/ReporteActivo.png" class="w-10 h-10 mx-auto">Ir al reporte</a>';
                                    }else{
                                        echo '<a class="text-lg font-bold tracking-tight text-white" href="../Controlador/control_reportes.php?action=cargarFormularioReporte&idPub='.$lista[0].'&idPubUsu='.$lista[8].'"><img src="../ServidorImg/Reportar.png" class="w-10 h-10 mx-auto">Reportar</a>';
                                    }
                                }
                            }elseif((isset($tipo2)) && ($tipo2 == 1)){
                                /*Botón de borrar publicación*/
                                echo '<a class="text-lg font-bold tracking-tight text-white" href="../Controlador/control_publicacion.php?action=borrarPubliUsu&idPub='.$lista[0].'"><img src="../ServidorImg/basura.png" class="w-10 h-10 mx-auto">Borrar publicación</a>';

                                /*Botón de ocultar publicación*/
                                if(strcmp($lista[9], "oculta") == 0){
                                    echo '<a class="text-lg font-bold tracking-tight text-white" href="../Controlador/control_publicacion.php?action=mostrarPubliUsu&idPub='.$lista[0].'"><img src="../ServidorImg/mostrar.png" class="w-10 h-10 mx-auto">Mostrar publicación</a>';
                                }else{
                                    echo '<a class="text-lg font-bold tracking-tight text-white" href="../Controlador/control_publicacion.php?action=ocultarPubliUsu&idPub='.$lista[0].'"><img src="../ServidorImg/ocultar.png" class="w-10 h-10 mx-auto">Ocultar publicación</a>';
                                }
                            }                                            
                        ?>                                                             
                    </div>

                </div>
            </div>        
        </section>

        <?php
                                                                                                                
            //DEJAR COMENTARIOS Y LIKES
            if(isset($nUsu) && (isset($tipo)) && ($tipo == 1) && (strcmp($lista[9], "mostrar") == 0)){
                              
                echo '               
                <section class="h-auto flex flex-col justify-center my-10">           
                        <div class="flex flex-col mx-auto text-center w-sm lg:w-xl">                                
                            <form  action="../Controlador/control_comentario.php?action=publicarComentario&id='.$id_pub.'" method="POST">
                                
                                <div class="w-full mb-4 border rounded-lg bg-gray-700 border-gray-600">
                                    <div class="px-4 py-2 rounded-t-lg bg-gray-800">
                                        <label for="comment" class="sr-only">Your comment</label>
                                        <textarea id="comment" name="comentario" rows="4" class="w-full px-0 text-sm border-0 bg-gray-800 focus:ring-0 text-white placeholder-gray-400" placeholder="Escribe tu comentario..." required maxlength="150"></textarea>
                                    </div>
                                    <div class="flex items-center justify-between px-3 py-2 border-t border-gray-600">
                                        <input type="submit" value="Enviar" name="publicarComentario" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-900 hover:bg-blue-800 cursor-pointer">
                                        </input>                                 
                                    </div>
                                </div>
                                <p class="ms-auto text-xs text-gray-400">Mantener los comentarios respetuosos <a href="../Controlador/control_inicioRegistroUsuario.php?action=cargarFaq" class="text-blue-500 hover:underline">Preguntas Frecuentes</a>.</p>
                                                                      
                            </form>                               
                        </div>        
                </section>           
                ';
                                         
            }elseif((strcmp($lista[9], "mostrar") == 0) && ($tipo2 == 0)){
                echo '
                    <section class="h-auto mx-auto flex items-center justify-center my-10">           
                        <div class="flex flex-wrap items-center justify-center text-center">      
                            <div class="bg-color3 w-sm sm:w-lg mx-auto rounded-md shadow-xl p-7">
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-white">Inicia sesión para comentar</h2>
                                <a class="mb-2 text-2xl font-bold tracking-tight text-blue-500" href="../Controlador/control_inicioRegistroUsuario.php?action=mostrarLogin">Iniciar Sesión</a>
                            </div>        
                        </div>        
                    </section>
                ';
            }

            //FEED de los comentarios
        ?>

        <section class="h-auto mx-auto mt-10 flex items-center justify-center">           
            <div class="flex flex-col items-center justify-center">      
                                         
                    <div id="comentarios">
                        <?php
                            $mostrados = 0;
                           
                            foreach ($lista2 as $id => $value) {
                                if ($mostrados >= 10) break;
                                echo '<div class="comentario bg-color3 w-sm sm:w-xl md:w-2xl lg:w-4xl mx-auto rounded-md shadow-xl p-7 mb-5">';
                                
                                ?>

                                <div class="mb-5 flex items-center">   
                                    <?php             
                                        if($idUsu == $value[4]){
                                            echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfil"><img src="'.$value[0].'" class="w-10 h-10 rounded-full mr-5"></a>';                                 
                                        }else{
                                            echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno='.$value[4].'"><img src="'.$value[0].'" class="w-10 h-10 rounded-full mr-5"></a>';
                                        } 
                                        echo '<h2 class="mb-2 text-lg tracking-tight text-white">'.$value[1].'</h2>';                
                                    ?>
                                </div>
                                                          
                                <div class="my-6">   
                                    <?php             
                                        echo '<p class="text-lg text-gray-300">'.$value[3].'</p>';                   
                                    ?>
                                </div>
                                

                                <div class="mb-4">   
                                    <?php             
                                        echo '<h2 class="mb-2 text-lg tracking-tight text-white">'.$value[2].'</h2>';                   
                                    ?>
                                </div>
                                

                                <div class="flex items-center">   
                                    <?php             
                                        if(($idUsu == $value[4]) && (strcmp($lista[9], "mostrar") == 0)) {
                                            echo '<img src="../ServidorImg/basura.png" class="w-10 h-10 rounded-full mr-2">';
                                            echo '<a class="text-md tracking-tight text-white" href="../Controlador/control_comentario.php?action=quitarComentario&id='.$id.'&idPub='.$value[5].'">Borrar</a>';
                                        }                   
                                    ?>
                                </div>
                                
                                <?php
                                                                 
                                echo '</div>';
                                $mostrados++;
                            }
                        ?>
                                       
                                                                   
                </div>          
            </div>        
        </section>

            

            <div id="cargandoComentarios" style="display: none;">
                
            </div>
            <div id="finComentarios" style="display:none;">
                <div class="text-center my-10">
                    <p>No hay más comentarios</p>
                </div>
            </div>

            <script>
            let offset = 10; // Ya se cargaron 10
            let cargando = false;
            let finComentarios = false;
            const idPub = <?php echo json_encode($id_pub); ?>;
            const idUsu = <?php echo json_encode($idUsu); ?>;
            const listaMostrar = <?php echo json_encode($lista[9]); ?>;

            function cargarComentarios() {
                if (cargando || finComentarios) return;
                cargando = true;
                document.getElementById('cargandoComentarios').style.display = 'block';

                fetch(`../Controlador/control_publicacion.php?action=getComentarios&id_pub=${idPub}&offset=${offset}`)
                    .then(response => response.json())
                    .then(data => {
                        if (Object.keys(data).length > 0) {
                            for (const id in data) {
                                const com = data[id];
                                const div = document.createElement('div');                             
                                div.classList.add('comentario', 'bg-color3', 'w-sm', 'sm:w-xl', 'md:w-2xl', 'lg:w-4xl', 'mx-auto', 'rounded-xl', 'shadow-xl', 'p-7', 'mb-5');
                                div.innerHTML = `    
                                
                                    <div class="mb-5 flex items-center">                                                                                             
                                        ${com[4] == idUsu ? `<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfil"><img src="${com[0]}" class="w-10 h-10 rounded-full mr-5"></a>` : `<a class="nav-link" href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno=${com[4]}"><img src="${com[0]}" class="w-10 h-10 rounded-full mr-5"></a>`}

                                        <h2 class="mb-2 text-lg tracking-tight text-white">${com[1]}</h2>                                                   
                                    </div>
                                                          
                                    <div class="my-6">                                                      
                                        <p class="text-lg text-gray-300">${com[3]}</p>                                                          
                                    </div>
                                
                                    <div class="mb-4">                                                       
                                        <h2 class="mb-2 text-lg tracking-tight text-white">${com[2]}</h2>                                                       
                                    </div>
                                
                                    <div class="flex items-center">   
                                        ${(com[4] == idUsu && listaMostrar === "mostrar") 
                                        ? `<img src="../ServidorImg/basura.png" class="w-10 h-10 rounded-full mr-2"><a class="text-md tracking-tight text-white" href="../Controlador/control_comentario.php?action=quitarComentario&id=${id}&idPub=${com[5]}">Borrar</a>` 
                                        : ''}
                                    </div>                                                               
                                                                       
                                `;
                                document.getElementById('comentarios').appendChild(div);
                            }
                            offset += 10;
                        } else {
                            finComentarios = true;
                            document.getElementById('finComentarios').style.display = 'block';
                        }
                        cargando = false;
                        document.getElementById('cargandoComentarios').style.display = 'none';
                    })
                    .catch(error => {
                        console.error("Error cargando comentarios:", error);
                        cargando = false;
                        document.getElementById('cargandoComentarios').style.display = 'none';
                    });
            }

            // Detecta scroll al fondo de la página
            window.addEventListener('scroll', () => {
                const scrollTop = window.scrollY;
                const windowHeight = window.innerHeight;
                const documentHeight = document.body.offsetHeight;

                if (scrollTop + windowHeight >= documentHeight - 100) {
                    cargarComentarios();
                }
            });
            </script>

</main>