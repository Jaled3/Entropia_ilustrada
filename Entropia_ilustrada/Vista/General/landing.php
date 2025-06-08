<main>
    <!-- Banner principal  -->
    <section class="h-200 flex flex-col justify-center bg-fixed bg-center bg-no-repeat bg-[url('../ServidorImg/banner.jpg')] bg-gray-700 bg-blend-multiply">
        
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 mt-20 sm:mt-0 lg:py-56">
            <div class="flex flex-col w-auto mx-auto my-10">
              <h2 class="text-4xl text-white capitalize italic xl:text-3xl">"Tu historia tiene un lugar aquí"</h2>
                <h2 class="text-6xl my-10 text-white drop-shadow-lg font-bold xl:text-8xl">Entropía Ilustrada</h2>
                <h2 class="text-xl drop-shadow-md text-white w-sm mx-auto xl:text-2xl xl:w-4xl">Muestra tu trabajo en esta comunidad, adquiere experiencia y consejo con cada trabajo que compartas. Crea tu propia galería o busca inspiración si la necesitas.</h2>
            </div>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="../Controlador/control_inicioRegistroUsuario.php?action=mostrarRegistro" class="inline-flex justify-center hover:text-blue-500 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Registrarse
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="#info" class="inline-flex justify-center hover:text-blue-500 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Saber más
                </a>  
            </div>
        </div>
           
    </section>
    
    <!-- Carousel intermedio  -->  
    <section class="h-auto flex items-center bg-[url('../ServidorImg/libreria.jpg')] bg-gray-700 bg-blend-multiply">                  
              <div id="default-carousel" class="relative w-full" data-carousel="slide">
                
                <div class="relative h-140 overflow-hidden">
                    
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="../ServidorImg/car1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                   
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="../ServidorImg/car2.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                   
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="../ServidorImg/coleccion3.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>      
                
                  <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>             
                </div>
                
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>          
              </div>     
    </section>
    
    <!-- Sobre nosotros  --> 
    <section class="h-auto flex flex-col justify-center" id="Nosotros">
        
        <div class="bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light sm:text-lg text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">Sobre nosotros</h2>
                <p class="mb-4">Entropía Literaria es un lugar para narradores e ilustradores. Apasionados por crear mundos únicos y personajes inolvidables. Somos una plataforma que apuesta por los proyectos grandes y pequeños. Aquí, podras llevar tus historias a otro nivel. Hay miles de artistas con los que podrás interactuar y compartir tus opiniones.</p>
                <a href="../Controlador/control_publicacion.php?action=cargarPublicacionesInicio" class="inline-flex justify-center hover:text-blue-500 items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Ver Inicio
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="../ServidorImg/informacion1.jpg" alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="../ServidorImg/informacion2.jpg" alt="office content 2">
            </div>
        </div>
    
    </div>
           
    </section>

    <!-- Datos de la página  --> 
    <section class="h-auto flex flex-col justify-center">
        
        <div class="bg-gray-900">
            <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
                <h2 class="text-2xl my-10 text-white drop-shadow-lg font-bold">A día de hoy contamos con...</h2>
                <dl class="grid max-w-screen-md gap-8 mx-auto sm:grid-cols-3 text-white">
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl md:text-4xl font-extrabold">10K+</dt>
                        <dd class="font-light text-gray-400">Usuarios</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl md:text-4xl font-extrabold">4K+</dt>
                        <dd class="font-light text-gray-400">Proyectos</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl md:text-4xl font-extrabold">100+</dt>
                        <dd class="font-light text-gray-400">Usuarios diarios</dd>
                    </div>
                </dl>
            </div>
        </div>
           
    </section>

    <!-- Panel foto imagen, imagen foto  --> 
    <section class="h-auto flex flex-col items-center justify-center bg-[url(../ServidorImg/fotoCarousel2.jpg)] bg-no-repeat bg-cover gap-10 xl:h-280 bg-gray-700 bg-blend-multiply">           
        <div class="container flex flex-wrap items-center justify-center text-center gap-10 mt-10 md:flex-nowrap">
          <div class="bg-white w-sm rounded-xl shadow-xl text-center p-3 w-8xl min-h-60 xl:w-3xl">
              <h2 class="text-4xl my-5 font-bold capitalize text-color2">Novelas gráficas VS Comics</h2>
              <p class="text-center md:text-start">Las novelas gráficas y los cómics no son lo mismo. Ambos combinan ilustración y texto para contar historias, pero mientras el cómic suele ser una publicación breve y más enfocada en el entretenimiento, la novela gráfica ofrece una narrativa más extensa, profunda y cerrada, similar a una novela tradicional.</p>
          </div>
          <div class="bg-white w-sm mx-auto rounded-xl shadow-xl text-center p-2 xl:w-3xl">
              <img src="../ServidorImg/coleccion1.jpg" class="mx-auto rounded rounded-lg" alt="">
          </div>
        </div> 
        <div class="container flex flex-wrap items-center justify-center text-center gap-10 mb-10 md:flex-nowrap">
          <div class="bg-white w-sm mx-auto rounded-xl shadow-xl text-center p-2 xl:w-3xl">
            <img src="../ServidorImg/coleccion2.jpg" class="mx-auto rounded rounded-lg" alt="">
          </div>
          <div class="bg-white w-sm rounded-xl shadow-xl text-center p-3 w-8xl min-h-60 xl:w-3xl">
              <h2 class="text-4xl my-5 font-bold capitalize text-color2">introducción al Manga</h2>
              <p class="text-center md:text-start">Esta forma de narrativa gráfica, combina ilustración y texto para contar historias. Aunque a simple vista pueda parecer similar al cómic, este tiene su propio estilo visual, cultural y narrativo. Se lee de derecha a izquierda, abarca una enorme variedad de géneros y temáticas. Además, suele publicarse en revistas por capítulos antes de recopilarse en volúmenes, permitiendo historias largas y profundamente desarrolladas.</p>
          </div>
        </div>     
   </section>
    
   <!-- Buscar en la aplicación  -->
    <section class="h-auto flex flex-col justify-center">
        
        <div class="bg-gray-900">
            <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                <img class="w-full rounded-lg" src="../ServidorImg/sobreNosotros.jpg" alt="dashboard image">
                <div class="mt-4 md:mt-0">
                    <h2 class="mb-4 text-4xl tracking-tight font-bold text-white">Explora cientos de historías, usa las categorías.</h2>
                    <p class="mb-6 font-light md:text-lg text-gray-400">Ciencia ficción, aventura, suspense... Son las categorías más buscadas, sin embargo, puedes buscar tu obra favorita. En los perfiles de los usuarios, podras ver sus bocetos, para estar pendiente de los últimos avances en sus obras.</p>
                    <a href="../Controlador/control_buscador.php?action=buscarPubliNombre" class="inline-flex justify-center hover:text-blue-500 items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                        Explorar
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
           
    </section>
    
    <!-- Recibir noticias  -->
    <section class="h-auto flex flex-col justify-center">
        
        <div class="bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-md sm:text-center">
                    <h2 class="mb-4 text-3xl tracking-tight font-extrabold sm:text-4xl text-white">Últimas novedades</h2>
                    <p class="mx-auto mb-8 max-w-3xl font-light md:mb-12 sm:text-xl text-gray-400">Te enviaremos a tu correo las publicaciones más populares del momento.</p>
                    <form action="#">
                        <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                            <div class="relative w-full">
                                <label for="email" class="hidden mb-2 text-sm font-medium text-gray-300">Direccion de correo</label>
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                </div>
                                <input class="block p-3 pl-10 w-full text-sm rounded-lg border border-gray-600 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500  bg-gray-700 placeholder-gray-400 text-white focus:border-primary-500" placeholder="correo electrónico" type="email" id="email" required="">
                            </div>
                            <div>
                                <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer border-white sm:rounded-none sm:rounded-r-lg focus:ring-4 hover:bg-gray-100 hover:text-blue-500 focus:ring-blue-800">Inscribirme</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
           
    </section>

    <!-- Panel con más información  -->
    <section class="h-auto flex flex-col justify-center" id="info">
        
        <div class="bg-gray-900 bg-center bg-no-repeat bg-[url('../ServidorImg/coleccion3.jpg')] bg-gray-700 bg-blend-multiply">
      <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
          <div class="max-w-screen-md mb-8 lg:mb-16">
              <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">Entropia literaria ofrece...</h2>
              <p class="sm:text-xl text-gray-400">Un galería personal con todas tus publicaciones y bocetos. Recibir retroalimentación de tus seguidores. Soporte para resolver tus dudas o reportes.</p>
              <a href="#Nosotros" class="inline-flex justify-center mt-5 hover:text-blue-500 items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                Sobre nosotros
            </a>
          </div>
          <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
              <div>
                  <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full lg:h-12 lg:w-12 bg-primary-900">
                      <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Zm.394 9.553a1 1 0 0 0-1.817.062l-2.5 6A1 1 0 0 0 8 19h8a1 1 0 0 0 .894-1.447l-2-4A1 1 0 0 0 13.2 13.4l-.53.706-1.276-2.553ZM13 9.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd"/>
                          </svg>
                  </div>
                  <h3 class="mb-2 text-xl font-bold text-white">Publicaciones</h3>
                  <p class="text-gray-400">Publica tus proyectos terminados o bocetos. Elije un título, elabora una descripción y selecciona 1 etiqueta. Tu publicación se verá en el inicio y en tu perfil.</p>
              </div>
              <div>
                  <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full lg:h-12 lg:w-12 bg-primary-900">
                      <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17 6h-2V5h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2h-.541A5.965 5.965 0 0 1 14 10v4a1 1 0 1 1-2 0v-4c0-2.206-1.794-4-4-4-.075 0-.148.012-.22.028C7.686 6.022 7.596 6 7.5 6A4.505 4.505 0 0 0 3 10.5V16a1 1 0 0 0 1 1h7v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3h5a1 1 0 0 0 1-1v-6c0-2.206-1.794-4-4-4Zm-9 8.5H7a1 1 0 1 1 0-2h1a1 1 0 1 1 0 2Z"/>
                    </svg>
                  </div>
                  <h3 class="mb-2 text-xl font-bold text-white">Comentarios</h3>
                  <p class="text-gray-400">Expresa tu opinión en cualquier publicación, del mismo modo, lee los comentarios de tus publicaciones, para escuchar todos los puntos de vista.</p>
              </div>
              <div>
                  <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 bg-primary-900">
                      <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.09 3.294c1.924.95 3.422 1.69 5.472.692a1 1 0 0 1 1.438.9v9.54a1 1 0 0 1-.562.9c-2.981 1.45-5.382.24-7.25-.701a38.739 38.739 0 0 0-.622-.31c-1.033-.497-1.887-.812-2.756-.77-.76.036-1.672.357-2.81 1.396V21a1 1 0 1 1-2 0V4.971a1 1 0 0 1 .297-.71c1.522-1.506 2.967-2.185 4.417-2.255 1.407-.068 2.653.453 3.72.967.225.108.443.216.655.32Z"/>
                        </svg>                    
                  </div>
                  <h3 class="mb-2 text-xl font-bold text-white">Reportes</h3>
                  <p class="text-gray-400">Si ves robo de arte, contenido innapropiado o comentarios ofensivos. No dudes en reportarlos si tienes alguna sospecha de lo mencionado anteriormente.</p>
              </div>
          </div>
      </div>
    </div>
           
    </section>
    

</main>