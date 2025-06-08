<main>
   
    <section class="h-130 flex flex-col justify-center">
        <div class="flex flex-col w-md sm:w-lg mx-auto text-center">                                            
            <form class="mx-auto w-md sm:w-lg" action="../Controlador/control_reportesAdministradorBuscador.php?action=cargarReportesAdministradorBuscador" method="POST">   
                <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>                   
                    <input type="search" name="nombre" id="default-search" class="block w-full p-4 ps-10 text-sm border rounded-lg focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:border-blue-500" placeholder="Nombre del reportado" required />                   
                    <button type="submit" name="BuscarReporte" class="text-white absolute end-2.5 bottom-2.5 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 cursor-pointer">Buscar</button>                 
                </div>
                <div class="mt-5">
                    <label for="countries" class="block mb-2 text-sm font-medium text-color2">Seleciona un estado:</label>
                    <select id="countries" name="estado" required class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400">

                        <option value="activo">Activo</option>
                        <option value="valido">Valido</option>
                        <option value="anulado">Anulado</option>

                    </select>
                </div>
            </form>
        </div>        
    </section>

    <section class="h-auto mx-auto flex items-center p-10 justify-center bg-center bg-repeat bg-[url('../ServidorImg/patron.jpg')] bg-gray-600 bg-blend-multiply">           
        <div class="flex flex-wrap items-center justify-center text-center">      
             <div id="reportes" class="flex flex-wrap">

                <?php
                    if($lista == NULL){           
                        echo '
                            <section class="h-40 mx-auto mb-40 flex items-center justify-center">           
                                <div class="flex flex-col flex-wrap items-center justify-center">   
                                    <div class="bg-color3 w-sm lg:w-3xl mx-auto rounded-xl shadow-xl">                                              
                                        <h2 class="text-2xl my-4 tracking-tight text-white text-center">No hay reportes del usuario <span class="text-blue-300">'.$buscaNom.'</span> que coincidan con el estado <span class="text-blue-300">'.$estad.'</span></h2>                                              
                                    </div>          
                                </div>        
                            </section>
                        ';
                    }else{
                ?>
                    <?php
                        $mostrados = 0;

                        foreach ($lista as $id => $value) {
                            if ($mostrados >= 6) break;
                            echo '<div class="reporte bg-color3 w-sm sm:w-xl mx-auto rounded-xl shadow-xl text-center p-7 mb-10">';
                            
                            /*Nombre del reportado + foto de perfil*/
                        ?>
                            <div class="mb-5 flex flex-wrap items-center justify-center sm:justify-between text-center">
                                <div class="flex items-center">
                                    <h2 class="text-2xl tracking-tight text-white">Reportado:</h2>
                                        <?php
                                            echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno='.$value[7].'"><img src="'.$value[0].'" class="w-10 h-10 rounded-full mx-5"></a>'; 
                                            echo '<h2 class="text-xl tracking-tight text-blue-400">'.$value[8].'</h2>';
                                        ?>    
                                </div>
                                <div>
                                    <h2 class="text-xl tracking-tight text-white">Motivo: <?php echo $value[2]; ?> </h2>
                                </div>
                            </div>

                        <?php

                        /*Foto de la publicación, si es un reporte al perfil se muestra la foto del usuario reportado*/

                            if(isset($value[1])){
                                echo '<a href="../Controlador/control_publicacion.php?action=postPublicacion&id=' . $value[6] . '"><img src="'.$value[1].'" class="w-10 h-10 mx-auto"></a>'; 
                            }else{
                                echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno='.$value[7].'"><img src="'.$value[0].'" class="w-10 h-10 rounded-full mx-auto"></a>'; 
                            }             
                                                        
                        ?>

                        <!-- Panel del motivo del reporte -->
                        <div class="flex-col items-center justify-center text-center my-4">
                            <div class="my-6">
                                <p class="text-lg text-gray-300 w-xs mx-auto"> <?php echo $value[3]; ?> </p>
                            </div>                  
                        </div>

                        <div class="flex flex-wrap items-center justify-center md:justify-between text-center gap-3 my-8">

                            <div class="flex items-center justify-center text-center">
                                <?php      
                                    if(strcmp($value[4], "activo") == 0){
                                        echo '<img src="../ServidorImg/activo.png" class="w-10 h-10">';
                                    }elseif(strcmp($value[4], "anulado") == 0){
                                        echo '<img src="../ServidorImg/anulado.png" class="w-10 h-10">';
                                    }elseif(strcmp($value[4], "valido") == 0){
                                        echo '<img src="../ServidorImg/valido.png" class="w-10 h-10">';
                                    }                                              
                                ?>

                                <h2 class="text-xl tracking-tight text-white"> <?php echo $value[5]; ?> </h2>
                            </div>
                            
                            <div class="flex items-center justify-center text-center">
                                <h2 class="text-xl tracking-tight text-white">Reportado por:</h2>
                                <?php
                                    if($idUsu == $value[11]){
                                        echo '<img src="'.$value[10].'" class="w-10 h-10 rounded-full mx-5">';
                                    }else{
                                        echo '<a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno='.$value[11].'"><img src="'.$value[10].'" class="w-10 h-10 rounded-full mx-5"></a>';
                                    } 
                                    echo '<h2 class="text-xl tracking-tight text-blue-400">'.$value[9].'</h2>'; 
                                ?>
                            </div>
                            
                        </div>

                        <!-- Botón de ir al reporte -->
                        <div class="flex items-center justify-center text-center">
                            <?php
                                echo '<a href="../Controlador/control_reportes.php?action=cargarReporteEspecifico&id_Repor='.$id.'" class="text-lg font-bold tracking-tight text-white"><img src="../ServidorImg/ReporteActivo.png" class="w-10 h-10 mx-auto">Ir al reporte</a>';
                            ?>
                        </div>
                        
                        <?php
                            echo '</div>';
                            $mostrados++;
                        }
                        ?>
                <?php
                    }
                ?>
             
            </div>     
        </div>        
    </section>
  
        <div id="cargandoReportes" style="display:none;">
            
        </div>
        <div id="finReportes" style="display:none;">
            <div class="text-center my-10">
                <p>No hay más reportes <?php echo '<span class="text-blue-600">'.$estad.'s</span>'; ?> de <?php echo '<span class="text-blue-600">'.$buscaNom.'</span>'; ?>.</p>              
            </div>
        </div>

        <script>
            const buscaNom = "<?php echo isset($buscaNom) ? addslashes($buscaNom) : ''; ?>";
            const estad = "<?php echo isset($estad) ? addslashes($estad) : ''; ?>";
            let offset = 6;
            let cargando = false;
            let fin = false;
            const idUsu = <?php echo json_encode($idUsu); ?>;

            function cargarReportes() {
                if (cargando || fin) return;
                cargando = true;
                document.getElementById('cargandoReportes').style.display = 'block';

                fetch(`../Controlador/control_reportesAdministradorBuscador.php?action=getReportesAjax&offset=${offset}&nombre=${encodeURIComponent(buscaNom)}&estado=${encodeURIComponent(estad)}`)
                .then(res => res.json())
                .then(data => {
                    if (Object.keys(data).length > 0) {

                        // 🔄 Invertir el orden de los datos
                        const reportes = Object.entries(data).reverse();

                        for (const [id, rep] of reportes) {
                            const div = document.createElement('div');
                            div.classList.add('reporte', 'bg-color3', 'w-sm', 'sm:w-xl', 'mx-auto', 'rounded-xl', 'shadow-xl', 'text-center', 'p-7', 'mb-10');
                            let imgHTML = '';
                            if (rep[1] !== undefined && rep[1] !== null && rep[1] !== '') {
                                imgHTML = `
                                    <a href="../Controlador/control_publicacion.php?action=postPublicacion&id=${rep[6]}">
                                        <img src="${rep[1]}" class="w-10 h-10 mx-auto">
                                    </a>`;
                            }else{
                                imgHTML = `
                                    <a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno=${rep[7]}">
                                        <img src="${rep[0]}" class="w-10 h-10 rounded-full mx-auto">
                                    </a>`;
                            }

                            // Determinar imagen de estado
                            let estadoImg = '';
                            switch (rep[4]) {
                                case 'activo':
                                    estadoImg = '<img src="../ServidorImg/activo.png" class="w-10 h-10">';
                                    break;
                                case 'anulado':
                                    estadoImg = '<img src="../ServidorImg/anulado.png" class="w-10 h-10">';
                                    break;
                                case 'valido':
                                    estadoImg = '<img src="../ServidorImg/valido.png" class="w-10 h-10">';
                                    break;
                            }

                            div.innerHTML = `
                            
                                <div class="mb-5 flex flex-wrap items-center justify-center md:justify-between text-center">
                                    <div class="flex items-center">
                                        <h2 class="text-2xl tracking-tight text-white">Reportado:</h2>
                                        <a href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno=${rep[7]}"><img src="${rep[0]}" class="w-10 h-10 rounded-full mx-5"></a>                           
                                        <h2 class="text-xl tracking-tight text-blue-400">${rep[8]}</h2>                                    
                                    </div>
                                    <div>
                                        <h2 class="text-xl tracking-tight text-white">Motivo: ${rep[2]} </h2>
                                    </div>
                                </div>                         

                                ${imgHTML}

                                <div class="flex-col items-center justify-center text-center my-4">
                                    <div class="my-6">
                                        <p class="text-lg text-gray-300 w-xs mx-auto"> ${rep[3]} </p>
                                    </div>                  
                                </div>

                                <div class="flex flex-wrap items-center justify-center md:justify-between text-center gap-3 my-8">

                                    <div class="flex items-center justify-center text-center">                                                             
                                        ${estadoImg}                                                       
                                        <h2 class="text-xl tracking-tight text-white"> ${rep[5]} </h2>
                                    </div>
                                    
                                    <div class="flex items-center justify-center text-center">
                                        <h2 class="text-xl tracking-tight text-white">Reportado por:</h2>                                       
                                        ${rep[11] == idUsu ? `<img src="${rep[10]}" class="w-10 h-10 rounded-full mx-5">` : `<a class="nav-link" href="../Controlador/control_perfilUsuario.php?action=mostrarPerfilAjeno&idAjeno=${rep[11]}"><img src="${rep[10]}" class="w-10 h-10 rounded-full mx-5"></a>`} 
                                        <h2 class="text-xl tracking-tight text-blue-400">${rep[9]}</h2>                                        
                                    </div>
                                    
                                </div>

                                <div class="flex items-center justify-center text-center">                                                                    
                                    <a href="../Controlador/control_reportes.php?action=cargarReporteEspecifico&id_Repor=${id}" class="text-lg font-bold tracking-tight text-white"><img src="../ServidorImg/ReporteActivo.png" class="w-10 h-10 mx-auto">Ir al reporte</a>
                                </div>

                            `;
                            document.getElementById('reportes').appendChild(div);
                        }

                        offset += 6;

                    } else {
                        fin = true;
                        document.getElementById('finReportes').style.display = 'block';
                    }
                })
                .catch(err => console.error("Error al cargar reportes:", err))
                .finally(() => {
                    cargando = false;
                    document.getElementById('cargandoReportes').style.display = 'none';
                });
            }

            window.addEventListener('scroll', () => {
                const scrollTop = window.scrollY;
                const windowHeight = window.innerHeight;
                const docHeight = document.body.offsetHeight;

                if (scrollTop + windowHeight >= docHeight - 100) {
                    cargarReportes();
                }
            });
        </script>

</main>