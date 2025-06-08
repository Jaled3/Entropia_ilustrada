<main>

    <section class="h-180 mx-auto flex items-center justify-center bg-[url(../ServidorImg/libreria.jpg)] bg-no-repeat bg-cover bg-gray-700 bg-blend-multiply">           
        <div class="w-full max-w-sm p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-sm sm:p-6 md:p-8">
                
                <form class="space-y-6" action="../Controlador/control_perfilUsuario.php?action=eliminacionDefinitivaUsuario" method="POST">
                            
                    <h2 class="text-xl font-medium text-white text-center">¿Borrar definitivamente la cuenta?</h2>

                    <input type="submit" value="Confirmar" name="BorrarCuentaSi" class="hover:text-blue-500 items-center py-3 px-5 w-full text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400 cursor-pointer">

                    <input type="submit" value="Rechazar" name="BorrarCuentaNo" class="hover:text-blue-500 items-center py-3 px-5 w-full text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400 cursor-pointer">

                </form>

        </div>               
    </section>         

</main>