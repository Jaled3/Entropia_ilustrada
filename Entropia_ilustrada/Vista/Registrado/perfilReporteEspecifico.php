<main>
   
    <section class="h-auto mt-30 sm:mt-20 mx-auto flex items-center p-10 justify-center bg-center bg-repeat bg-[url('../ServidorImg/patron.jpg')] bg-gray-600 bg-blend-multiply">           
        <div class="flex flex-wrap items-center justify-center text-center">      
            <div class="bg-color3 w-md sm:w-xl md:w-2xl lg:w-4xl mx-auto rounded-xl shadow-xl text-center p-7 mb-10">
                              
                <div class="mb-5 flex flex-wrap items-center justify-center md:justify-between text-center">
                    <div class="flex items-center">
                        <h2 class="text-2xl tracking-tight text-white">Reportado:</h2>
                            <?php
                                echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno='.$lista[8].'"><img src="'.$lista[1].'" class="w-10 h-10 rounded-full mx-5"></a>'; 
                                echo '<h2 class="text-xl tracking-tight text-blue-400">'.$lista[9].'</h2>'; 
                            ?>
                    </div>
                    <div>
                        <h2 class="text-xl tracking-tight text-white">Motivo: <?php echo $lista[3]; ?> </h2>
                    </div>
                </div>
                                                                         
                <?php
                    if(isset($lista[2])){
                        echo '<a href="../Controlador/control_publicacion.php?action=postPublicacion&id=' . $lista[7] . '"><img src="'.$lista[2].'" class="w-xs mx-auto h-auto mb-3 rounded"></a>'; 
                    }else{
                        echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno='.$lista[8].'"><img src="'.$lista[1].'" class="w-10 h-10 rounded-full mx-auto"></a>'; 
                    }             
                ?>

                <div class="flex-col items-center justify-center text-center my-4">
                    <div class="my-6">
                        
                        <p class="text-lg text-gray-300 w-xs sm:w-lg md:w-xl lg:w-3xl mx-auto"> <?php echo $lista[4]; ?> </p>
                    </div>  
                    <div class="my-6">
                        <h2 class="text-2xl font-bold tracking-tight text-white">Respuesta:</h2>
                        <?php
                            if($lista[13] == NULL){
                                echo '<p class="text-lg text-gray-300 w-xs sm:w-lg md:w-xl lg:w-3xl mx-auto">No hay una respuesta</p>';
                            }else{
                                echo '<p class="text-lg text-gray-300 w-xs sm:w-lg md:w-xl lg:w-3xl mx-auto">'.$lista[13].'</p>';
                            }
                        ?>                                         
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-center text-center gap-3 my-8">

                    <div class="flex flex-wrap items-center justify-center text-center gap-5">
                        <div class="flex items-center justify-center w-sm">
                            <?php
                                if(strcmp($lista[5], "activo") == 0){
                                    echo '<img src="../ServidorImg/activo.png" class="w-10 h-10">';
                                }elseif(strcmp($lista[5], "anulado") == 0){
                                    echo '<img src="../ServidorImg/anulado.png" class="w-10 h-10">';
                                }elseif(strcmp($lista[5], "valido") == 0){
                                    echo '<img src="../ServidorImg/valido.png" class="w-10 h-10">';
                                }
                            ?>
    
                            <h2 class="text-xl tracking-tight text-white"> <?php echo '<span class="text-blue-400">'.$lista[5].'</span>'; ?> / <?php echo $lista[6]; ?> </h2>
                        </div>
                        
                        <div>
                            <?php
                                if($tipo2 == 1){
                                    if(strcmp($lista[5], "anulado")==0){               
                                        echo '<a href="../Controlador/control_reportesAdministrador.php?action=reporteEstadoActivo&idReporte='.$lista[0].'" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Activo</a>';
                                        echo '<a href="../Controlador/control_reportesAdministrador.php?action=reporteEstadoValido&idReporte='.$lista[0].'" class="focus:outline-none text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Válido</a>';
                                    }elseif(strcmp($lista[5], "valido")==0){
                                        echo '<a href="../Controlador/control_reportesAdministrador.php?action=reporteEstadoAnulado&idReporte='.$lista[0].'" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-900 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Anulado</a>';
                                        echo '<a href="../Controlador/control_reportesAdministrador.php?action=reporteEstadoActivo&idReporte='.$lista[0].'" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Activo</a>';
                                    }else{
                                        echo '<a href="../Controlador/control_reportesAdministrador.php?action=reporteEstadoValido&idReporte='.$lista[0].'" class="focus:outline-none text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Válido</a>';
                                        echo '<a href="../Controlador/control_reportesAdministrador.php?action=reporteEstadoAnulado&idReporte='.$lista[0].'" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-900 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Anulado</a>';             
                                    }
                                }
                            ?>
                        </div>

                    </div>
                    
                    <?php
                    if($tipo2 == 1){
                    ?>
                        <div class="flex mt-10">
                            <h2 class="text-xl tracking-tight text-white">Reportado por:</h2>
                            <?php
                                if($idUsu == $lista[12]){
                                    echo '<img src="'.$lista[11].'" class="w-10 h-10 rounded-full mx-5">';
                                }else{
                                    echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno='.$lista[12].'"><img src="'.$lista[11].'" class="w-10 h-10 rounded-full mx-5"></a>';
                                } 
                                echo '<h2 class="text-xl tracking-tight text-blue-400">'.$lista[10].'</h2>'; 
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <?php
                
                    if($tipo2 == 1){ 
                        
                        echo '
                           
                                <div class="flex flex-col w-xs sm:w-sm mx-auto text-center mb-5">
                                
                                        <form action="../Controlador/control_reportesAdministrador.php?action=reporteCrearRespuesta" method="POST">

                                            <div class="my-5">
                                                <label for="res" class="block mb-2 text-sm font-medium text-white">Respuesta</label>
                                                <textarea id="res" name="respuesta" rows="4" class="block p-2.5 w-full text-sm rounded-lg border focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500" maxlength="250" required placeholder="Respuesta al reporte"></textarea>
                                            </div>
                                                                                                                                                                                
                                            <input type="submit" value="Enviar" name="actualizar" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center cursor-pointer">    
                                            
                                            <input type="hidden" name="idReporte" class="form-control bg-secondary-subtle" value="'.$lista[0].'">

                                        </form>            
                                </div>        
                            
                        ';                                     
                    }

                ?>
          
            </div>          
        </div>        
    </section>
        
</main>
