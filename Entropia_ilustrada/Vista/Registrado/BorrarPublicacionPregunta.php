<main>

    <section class="mt-20 h-230 mx-auto flex items-center justify-center">           
            <div class="w-full max-w-sm p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 md:p-8">

                <form class="space-y-6" action="../Controlador/control_publicacion.php?action=eliminacionDefinitivaPubli" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="pubId" <?php echo "value=".$id_pub.""?> >

                    <div>      
                        <h2 class="text-xl font-medium text-white text-center">Imagen de la publicacion</h2>
                        <?php echo '<img src="'.$lista2[0].'" class="max-width=100px">'; ?>
                    </div>

                    <div>
                        <label for="Titulo" class="block mb-2 text-sm font-medium text-white text-center">Titulo</label>                         
                        <?php echo '<h2 class="text-xl font-medium text-white text-center">'.$lista2[1].'</h2>'; ?>               
                    </div>
               
                    <h2 class="text-xl font-medium text-white text-center">¿Borrar definitivamente la publicacion?</h2>
                    <input type="submit" value="Confirmar" name="BorrarPubliSi" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">

                    <input type="submit" value="Rechazar" name="BorrarPubliNo" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">

                </form>

            </div>               
    </section>

</main>