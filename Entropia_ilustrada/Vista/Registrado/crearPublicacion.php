<main>

        <section class="mt-20 h-240 mx-auto flex items-center justify-center bg-center bg-no-repeat bg-[url('../ServidorImg/fotoCarousel3.jpg')] bg-gray-700 bg-blend-multiply">           
            <div class="w-sm md:w-xl p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 md:p-8">
                <form class="space-y-6" action="../Controlador/control_publicacion.php?action=subirPublicacion" method="POST" enctype="multipart/form-data" id="miFormulario">

            <?php
                if($mensajeError == true){
                    echo '
                        <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                        <span class="font-medium">Error!</span> El archivo pesa más de 10MB.
                        </div>
                    ';
                }elseif($mensajeError2 == true){
                    echo '
                        <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                        <span class="font-medium">Error!</span> La imagen debe medir mínimo 184x184px.
                        </div>
                    ';
                }elseif($mensajeError3 == true){
                    echo '
                        <div class="w-xs mx-auto p-4 mb-4 text-sm text-red-400 rounded-lg text-center" role="alert">
                        <span class="font-medium">Error!</span> No es un archivo imagen.
                        </div>
                    ';
                }      
            ?>

                    <h5 class="text-xl font-medium text-white text-center">Sube tu publicación</h5>

                    <div>                                              
                        <label class="block mb-2 text-sm font-medium text-white" for="user_avatar">Subir archivo</label>
                        <input class="block w-full text-sm border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" name="imagen" required accept="image/*" onchange="mostrarVistaPrevia(this)" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                        <div class="mt-1 text-sm text-gray-300" id="user_avatar_help">Tamaño mínimo 184x184px Máximo 10MB</div>   
                                               
                        <img id="preview" src="#" alt="Vista previa" style="display: none; max-width: 100px;">
                    </div>

                    <div>
                        <label for="Titulo" class="block mb-2 text-sm font-medium text-white">Titulo</label>
                        <input type="text" name="titulo" id="Titulo" class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400" placeholder="Titulo" maxlength="50" required>
                    </div>

                    <div>                       
                        <label for="Descripcion" class="block mb-2 text-sm font-medium text-white">Descripcion</label>
                        <textarea id="Descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Descripción" maxlength="500" required></textarea>
                    </div>

                    <div>
                        <label for="Tipo" class="block mb-2 text-sm font-medium text-white">¿Está terminado o en progreso?</label>
                        <select id="Tipo" name="Tipo" required class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">

                            <option disabled>--Seleccionar tipo--</option>                                                
                            <option value="terminado">terminado</option> 
                            <option value="boceto">boceto</option>
                        </select>
                    </div>
            
                    <h5 class="text-xl font-medium text-white text-center">Etiquetas</h5>
                    <div class="flex flex-wrap justify-center items-center text-center mb-6">
                        <?php
                            foreach($lista as $value){  
                                echo '<input id="checkbox'.$value.'" type="checkbox" name="opcion" value='.$value.' class="w-4 h-4 mr-3 sm:mr-5 mb-3 text-blue-600 rounded-sm focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">';                                                          
                                echo '<label for="checkbox'.$value.'" class="mr-6 sm:mr-8 mb-3 text-sm font-medium text-gray-300">'.$value.'</label>';
                            }
                        ?>
                    </div>

                    <input type="submit" value="Enviar" name="subirPublicacion" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">

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

