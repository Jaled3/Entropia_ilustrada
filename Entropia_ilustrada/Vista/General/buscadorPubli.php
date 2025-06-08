<main>

<section class="h-screen flex flex-col justify-center bg-center bg-no-repeat bg-[url('../ServidorImg/estanteria.jpg')] bg-gray-700 bg-blend-multiply">
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

        <script>
            /*Seleccionar solo 1 etiqueta al mismo tiempo*/
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