<section class="pt-32 md:flex md:justify-between gap-3">
    <div class="w-[80%] md:w-[45%] xl:w-[550px] mx-auto mb-16 md:mb-0 shadow rounded-lg p-8 bg-gray-800">
        <h1 class="text-center text-4xl font-bold text-gray-200 pt-4 mb-4">Contacto</h1>
    
        <form class="mt-8 space-y-6" action="index.php?page=send_contact_form" method="POST">
            <div class="xl:flex items-center mt-12">
                <div class="w-full xl:w-1/2 flex flex-col">
                    <label for="name" class="font-semibold leading-none text-gray-200">Nombre</label>
                    <input
                        required
                        id="name"
                        name="name"
                        type="text"
                        class="leading-none font-semibold text-gray-800 p-3 focus:outline-none focus:border-green-300 mt-4 border-4 bg-white rounded" 
                    />
                </div>
    
                <div class="w-full xl:w-1/2 flex flex-col xl:ml-6 xl:mt-0 mt-4">
                    <label for="lastname" class="font-semibold leading-none text-gray-200">Apellido</label>
                    <input
                        required
                        id="lastname"
                        name="lastname" 
                        type="text" 
                        class="leading-none font-semibold text-gray-800 p-3 focus:outline-none focus:border-green-300 mt-4 border-4 bg-white rounded" 
                    />
                </div>
            </div>
    
            <div class="md:flex items-center mt-8">
                <div class="w-full flex flex-col">
                    <label for="email" class="font-semibold leading-none text-gray-200">Email</label>
                    <input
                        required
                        id="email" 
                        name="email" 
                        type="email" 
                        class="leading-none font-semibold text-gray-800 p-3 focus:outline-none focus:border-green-300 mt-4 border-4 bg-white rounded" 
                    />
                </div>
            </div>
    
            <div>
                <div class="w-full flex flex-col mt-8">
                    <label for="message" class="font-semibold leading-none text-gray-200">Mensaje</label>
                    <textarea
                        required
                        id="message"
                        name="message"
                        maxlength="100"
                        placeholder="Dejanos todas tus consultas..." 
                        class="h-40 resize-none text-base leading-none font-semibold text-gray-800 p-3 focus:outline-none focus:border-green-300 mt-4 bg-white border-4 rounded"
                    ></textarea>
                </div>
            </div>
    
            <div class="flex items-center justify-center w-full">
                <button type="submit" class="mt-9 w-full font-bold leading-none text-white py-4 px-10 bg-green-500 rounded hover:bg-green-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-300 focus:outline-none">
                    Enviar
                </button>
            </div>
        </form>
    </div>

    <aside class="mx-auto w-[80%] sm:pl-6 md:w-[45%] xl:w-[550px] rounded-lg bg-white px-3 py-10">
        <h2 class="text-xl w-[90%] xl:mx-auto xl:w-[500px] font-bold mb-8">Carreras de Ciclismo</h2>

        <picture>
            <source media="(max-width: 480px)" srcset="images/covers/cycling_race_mobile.jpg">
            <source media="(max-width: 768px)" srcset="images/covers/cycling_race_tablet.jpg">
            <img 
                src="images/covers/cycling_race_desktop.jpg" 
                alt="Carrera de Ciclismo"
                class="md:mx-auto rounded-md"
            />
        </picture>

        <h3 class="text-lg w-[90%] xl:mx-auto xl:w-[500px] font-bold mt-4 mb-3">La carrera de ciclismo Gran Fondo Buenos Aires vuelve a San Isidro</h3>
        
        <p class="mb-8 w-[90%] xl:mx-auto xl:w-[500px]">
            Por cuarto año consecutivo, se realizará este domingo la carrera de ciclismo 
            <i>El Gran Fondo de Buenos Aires</i>, una competencia con un circuito de más de 
            100 kilómetros, que recorrerá la Ciudad de Buenos Aires, Vicente López y San Isidro.
        </p>

        <p class="w-[90%] xl:mx-auto xl:w-[500px]">
            La carrera tendrá su largada, a las 6:30, y finalización en el Parque Sarmiento,
            ubicado en la avenida Ricardo Balbín al 4700. Tras su recorrido por capital, 
            en San Isidro.
        </p>
    </aside>
</section>