<main>

    <section class="h-200 sm:h-150 flex flex-col justify-center bg-fixed bg-center bg-no-repeat bg-[url('../ServidorImg/estanteria.jpg')] bg-gray-700 bg-blend-multiply">
        
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <div class="flex flex-col justify-center my-10">
                <img src="../ServidorImg/logo_entropia.png" class="w-xs mx-auto mb-3" alt="...">
                <h2 class="text-xl drop-shadow-md text-white w-sm mx-auto xl:text-2xl xl:w-4xl">Las últimas novedades, se publican aquí.</h2>
            </div>           
        </div>
           
    </section>

    <section class="h-100 flex flex-col justify-center">
        <div class="flex flex-col w-md sm:w-lg mx-auto text-center">                                            
            <form class="mx-auto w-md sm:w-lg" action="../Controlador/control_buscador.php?action=buscarPublicacionesNombre" method="POST">   
                <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" name="nom" id="default-search" class="block w-full p-4 ps-10 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="Buscar publicaciones..." required />
                    <button type="submit" name="BuscarPubliNombre" class="text-white absolute end-2.5 bottom-2.5 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 cursor-pointer">Buscar</button>
                </div>
            </form>

            <!-- Modal toggle -->
            <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="block w-xs mx-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mt-5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 cursor-pointer" type="button">
            Buscar por Categorías
            </button>
        </div>        
    </section>
                                                       
    <!-- Main modal -->
        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative rounded-lg shadow-sm bg-gray-700">
                    <!-- Modal header -->
                      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                        <h3 class="text-xl font-semibold text-white">
                            Busqueda por etiquetas
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-hide="static-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                      </div>
                    <!-- Modal body -->
                      <div class="p-4 md:p-5 space-y-4 text-center">
                        <form class="mx-auto w-md sm:w-lg" action="../Controlador/control_buscadorCategoria.php?action=buscarPublicacionesCatego" method="POST" id="miFormulario">   
                            <div class="flex flex-row flex-wrap justify-center items-center gap-4">           
                                    <?php
                                        foreach($lista2 as $value){                                
                                            echo '<label class="ms-2 text-white text-sm font-medium text-color3"><input type="checkbox" name="opcion" class="w-4 h-4 border border-gray-700 rounded-sm bg-gray-600 focus:ring-3 focus:ring-blue-600" value="'.$value.'" required>'.$value.'</label><br>';                                                            
                                        }
                                    ?>
                            </div>

                            <input type="submit" name="BuscarPubliCatego" value="Buscar" class="text-white bg-blue-600 mt-4 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-auto mx-auto px-5 py-2.5 text-center cursor-pointer"> 
                        </form>
                      </div>           
                </div>
            </div>
        </div>

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
            <div class="flex flex-col flex-wrap items-center justify-center my-10">
                <p>¿Prefieres buscar algo en específico?</p>
                <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 mx-3 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm py-2 px-3 text-center my-3 cursor-pointer"><a href="../Controlador/control_buscador.php?action=buscarPubliNombre">Buscar</a></button>
            </div>
        </div>
        
        <script>
            let offset = 10; // Empezamos con 10 porque ya cargamos las primeras
            const limit = 10;
            let cargando = false;
            let finPublicaciones = false; // Variable para saber si ya no hay más publicaciones

        function cargarPublicaciones() {
            if (cargando || finPublicaciones) return; // Evita más cargas si ya llegamos al final
            cargando = true;
            document.getElementById('cargando').style.display = 'block';

            fetch(`../Controlador/control_publicacion.php?action=getPosts&offset=${offset}`)
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

        document.addEventListener("DOMContentLoaded", function() {
                const checkboxes = document.querySelectorAll('input[name="opcion"]');
                const form = document.getElementById("miFormulario");

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener("change", function() {
                        const seleccionados = document.querySelectorAll('input[name="opcion"]:checked');
                        
                        // Deshabilita checkboxes si ya hay 3 seleccionados
                        if (seleccionados.length >= 1) {
                            checkboxes.forEach(cb => {
                                if (!cb.checked) cb.disabled = true;
                            });
                        } else {
                            checkboxes.forEach(cb => cb.disabled = false);
                        }
                    });
                });

                form.addEventListener("submit", function(event) {
                    const seleccionados = document.querySelectorAll('input[name="opcion"]:checked');

                    if (seleccionados.length < 1) {
                        alert("Debes seleccionar al menos una opción.");
                        event.preventDefault();
                    }
                });
        });      
        </script>
</main>