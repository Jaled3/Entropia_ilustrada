<main>
    
        <section class="mt-20 h-300 mx-auto flex items-center justify-center bg-center bg-repeat bg-[url('../ServidorImg/patron.jpg')] bg-gray-600 bg-blend-multiply">           
            <div class="w-sm md:w-xl p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 md:p-8">
                <form class="space-y-6" action="../Controlador/control_publicacion.php?action=actualizarPublicacion" method="POST" enctype="multipart/form-data" id="miFormulario">

                    <h5 class="text-xl font-medium text-white text-center">Editar publicación</h5>

                    <input type="hidden" name="pubId" <?php echo "value=".$id_pub.""?> >

                    <div>      
                        <h2 class="text-xl font-medium text-white text-center">Imagen de la publicacion</h2>
                        <?php echo '<img src="'.$lista2[0].'" class="max-width=100px rounded-lg">'; ?>
                    </div>

                    <div>
                        <label for="Titulo" class="block mb-2 text-sm font-medium text-white">Titulo</label>                                  
                        <input type="text" name="titulo" class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400" required id="Titulo" placeholder="Titulo" <?php echo "value='".$lista2[1]."'"?> maxlength="50">                   
                    </div>

                    <div>                       
                        <label for="Descripcion" class="block mb-2 text-sm font-medium text-white">Descripcion</label>
                        <textarea id="Descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm rounded-lg border focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" required placeholder="Descripción" maxlength="500"></textarea>
                    </div>

                    <div>
                        <label for="Tipo" class="block mb-2 text-sm font-medium text-white">¿Está terminado o en progreso?</label>
                        <select id="Tipo" name="Tipo" required class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white">

                            <option disabled>--Seleccionar tipo--</option>                                                
                            <option value="terminado">terminado</option> 
                            <option value="boceto">boceto</option>
                        </select>
                    </div>
            
                    <h5 class="text-xl font-medium text-white text-center">Etiquetas</h5>
                    <div class="flex flex-wrap justify-center items-center text-center mb-6">
                        <?php
                            foreach($lista as $value){  
                                echo '<input id="checkbox'.$value.'" type="checkbox" name="opcion" value='.$value.' class="w-4 h-4 mr-3 sm:mr-5 mb-3 text-blue-600 rounded-sm focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">';                                                          
                                echo '<label for="checkbox'.$value.'" class="mr-6 sm:mr-8 mb-3 text-sm font-medium text-gray-300">'.$value.'</label>';
                            }
                        ?>
                    </div>

                    <input type="submit" value="Enviar" name="ActuaPublicacion" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">

                </form>

            </div>               
        </section>       

        <script>
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