<main>
   
        <section class="h-100 mx-auto flex items-center justify-center">           
            <div class="flex flex-col items-center justify-center text-center">                             
                <form class="mx-auto w-md sm:w-lg mb-5" action="../Controlador/control_usuariosAdministradorBuscar.php?action=cargarUsuariosAdminitradorBuscar" method="POST">   
                <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" name="nombre" id="default-search" class="block w-full p-4 ps-10 text-sm border rounded-lg focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:border-blue-500" placeholder="Nombre del usuario" required />
                        <button type="submit" name="BuscarUsuario" class="text-white absolute end-2.5 bottom-2.5 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 cursor-pointer">Buscar</button>
                    </div>
                </form>
                
                <a href="../Controlador/control_perfilUsuarioAdministrador.php?action=mostrarRegistroAdministrador" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Crear Usuario</a>
            </div>        
        </section>

        <section class="h-auto mx-auto flex items-center p-10 justify-center bg-center bg-repeat bg-[url('../ServidorImg/patron.jpg')] bg-gray-600 bg-blend-multiply">           
            <div class="flex flex-wrap items-center justify-center text-center">      
                 <div id="usuarios" class="flex flex-row flex-wrap justify-center items-center text-center gap-5">
                    <?php
                    $mostrados = 0;
                    foreach ($lista as $id => $value) {
                        if ($mostrados >= 10) break;
                        echo '<div class="usuario">';
                        ?>
                            <div class="w-full max-w-sm border rounded-lg shadow-sm bg-gray-800 border-gray-700">                              
                                <div class="flex flex-col items-center p-10">
                                    <?php
                                        if(!(strcmp($value[1], "administrador")==0)){
                                            echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno='.$id.'"><img src="'.$value[2].'" class="w-24 h-24 mb-3 rounded-full shadow-lg"></a>';                  
                                        }else{
                                            echo '<img src="'.$value[2].'" class="w-24 h-24 mb-3 rounded-full shadow-lg">';
                                        }
                                    ?>
                                    <h5 class="mb-1 text-xl font-medium text-white"><?php echo $value[0]; ?></h5>
                                    <span class="text-sm text-gray-400"><?php echo $value[1]; ?></span>
                                    <span class="text-sm text-gray-400"><?php echo $value[3]; ?></span>
                                    <span class="text-sm text-gray-400"><?php echo $value[4]; ?></span>

                                    <div class="flex mt-4 md:mt-6 space-x-4">
                                        <?php
                                            echo '<a class="inline-flex items-center px-4 py-2 border border-white text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none hover:bg-gray-100 hover:text-blue-500 focus:ring-4 focus:ring-gray-400" href="../Controlador/control_perfilUsuarioAdministrador.php?action=modificarPerfilUsuarioAdministrador&idUsu='.$id.'">Modificar perfil</a>';
                                        ?>

                                        <?php
                                            if($idUsu != $id){
                                                echo '<a class="inline-flex items-center px-4 py-2 border border-white text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none hover:bg-gray-100 hover:text-blue-500 focus:ring-4 focus:ring-gray-400" href="../Controlador/control_perfilUsuarioAdministrador.php?action=BorrarCuentaUsuarioAdministrador&idUsu='.$id.'">Borrar cuenta</a>';
                                            }
                                        ?>
                                        
                                    </div>

                                </div>
                            </div>

                        <?php
                        
                        echo '</div>';
                        $mostrados++;
                 
                    }
                    ?>                 
                    
                </div>   
            </div>        
        </section>

        

        <div id="cargandoUsuarios" style="display:none;">
            
        </div>
        <div id="finUsuarios" style="display:none;">
            
        </div>

        <script>
            let offset = 10;
            let cargando = false;
            let fin = false;
            const comparacion = "administrador";
            const idUsu = <?php echo json_encode($idUsu); ?>;

            function cargarUsuarios() {
                if (cargando || fin) return;
                cargando = true;
                document.getElementById('cargandoUsuarios').style.display = 'block';

                fetch(`../Controlador/control_usuariosAdministrador.php?action=getUsuariosAjax&offset=${offset}`)
                .then(res => res.json())
                .then(data => {
                    if (Object.keys(data).length > 0) {

                        // 🔄 Invertir el orden de los datos
                        const usuarios = Object.entries(data).reverse();

                        for (const [id, usu] of usuarios) {
                            const div = document.createElement('div');
                            div.classList.add('usuario');
                            
                            div.innerHTML = `
                                <div class="w-full max-w-sm border rounded-lg shadow-sm bg-gray-800 border-gray-700"> 
                                                                 
                                    <div class="flex flex-col items-center p-10">
                                        ${usu[1] === comparacion 
                                            ? `<img src="${usu[2]}" class="w-24 h-24 mb-3 rounded-full shadow-lg">`
                                            : `<a class="nav-link" href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno=${id}"><img src="${usu[2]}" class="w-24 h-24 mb-3 rounded-full shadow-lg"></a>`
                                        }
                                        <h5 class="mb-1 text-xl font-medium text-white">${usu[0]}</h5>
                                        <span class="text-sm text-gray-400">${usu[1]}</span>
                                        <span class="text-sm text-gray-400">${usu[3]}</span>
                                        <span class="text-sm text-gray-400">${usu[4]}</span>

                                        <div class="flex mt-4 md:mt-6 space-x-4">
                                            <a class="inline-flex items-center px-4 py-2 border border-white text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none hover:bg-gray-100 hover:text-blue-500 focus:ring-4 focus:ring-gray-400" href="../Controlador/control_perfilUsuarioAdministrador.php?action=modificarPerfilUsuarioAdministrador&idUsu=${id}">Modificar perfil</a>
                                            
                                            ${idUsu != id 
                                                ? `<a class="inline-flex items-center px-4 py-2 border border-white text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none hover:bg-gray-100 hover:text-blue-500 focus:ring-4 focus:ring-gray-400" href="../Controlador/control_perfilUsuarioAdministrador.php?action=BorrarCuentaUsuarioAdministrador&idUsu=${id}">Borrar cuenta</a>`
                                                : ''
                                            }
                                                                                         
                                        </div>
                                    </div>
                                </div>`;

                            document.getElementById('usuarios').appendChild(div);
                        }

                        offset += 10;

                    } else {
                        fin = true;
                        document.getElementById('finUsuarios').style.display = 'block';
                    }
                })
                .catch(err => console.error("Error al cargar usuarios:", err))
                .finally(() => {
                    cargando = false;
                    document.getElementById('cargandoUsuarios').style.display = 'none';
                });
            }

            window.addEventListener('scroll', () => {
                const scrollTop = window.scrollY;
                const windowHeight = window.innerHeight;
                const docHeight = document.body.offsetHeight;

                if (scrollTop + windowHeight >= docHeight - 100) {
                    cargarUsuarios();
                }
            });
        </script>

</main>