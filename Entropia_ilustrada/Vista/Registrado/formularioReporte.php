<main>

    <section class="mt-20 h-220 mx-auto flex items-center justify-center bg-center bg-no-repeat bg-[url('../ServidorImg/banner.jpg')] bg-gray-700 bg-blend-multiply">           
            <div class="w-full max-w-sm p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 md:p-8">
                <form class="space-y-6" action="../Controlador/control_reportes.php?action=crearReporte" method="POST">

                    <input type="hidden" name="idPub" class="form-control bg-secondary-subtle" <?php echo "value=".$id_pub.""?>>
                    <input type="hidden" name="idRep" class="form-control bg-secondary-subtle" <?php echo "value=".$id_rep.""?>>

                    <h5 class="text-xl font-medium text-white text-center">Reportar Publicación</h5>

                    <div>
                        <label for="Tipo" class="block mb-2 text-sm font-medium text-white">Motivo del reporte</label>
                        <select id="Tipo" name="TituloReporte" required class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">

                            <option disabled>--Seleccionar Motivo--</option>                                                
                            <option value="Robo de arte">Robo de arte</option> 
                            <option value="Contenido Ofensivo">Contenido ofensivo</option>
                            <option value="Contenido Sexual">Contenido sexual</option>
                            <option value="Discurso de Odio">Discurso de Odio</option>
                        </select>
                    </div>

                    <div>
                        <label for="Descripcion" class="block mb-2 text-sm font-medium text-white">Mensaje</label>
                        <textarea id="Descripcion" name="DescripcionReporte" rows="4" class="block p-2.5 w-full text-sm rounded-lg border focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" maxlength="250" required placeholder="Especifica el motivo"></textarea>
                    </div>
                            
                    <input type="submit" value="Enviar" name="subirReporte" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">

                </form>

            </div>               
    </section>

</main>
