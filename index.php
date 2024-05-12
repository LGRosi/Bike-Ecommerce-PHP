<?php
$paramsUrl = $_GET;

require_once 'includes/valid_pages.php';

$page = $paramsUrl['page'] ?? 'home';

if (!array_key_exists($page, $validPages)) {
    $page = 'not_found';
    $title = 'Página no encontrada';
} else {
    $title = $validPages[$page]['title'];
}
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/svg" href="images/icons/logo_bike.svg" />
        <title>Bike | <?= $title ?></title>
    </head>

    <body class="bg-white">
        <header>
            <div class="fixed top-0 left-0 z-20 w-full border-b border-gray-200 bg-white py-4 px-4">
                <div class="container mx-auto flex max-w-6xl flex-wrap items-center justify-between">
                    <div class="flex items-center">
                        <a href="index.php?page=home" class="flex items-center">
                            <img 
                                src="images/icons/logo_bike.svg" 
                                alt="Logo principal Bike" 
                                width="100"
                            />
                        </a>
                    </div>

                    <button id="menu-toggle" data-collapse-toggle="navbar-sticky navbar-sticky-cart" type="button" class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 xl:hidden" aria-controls="navbar-sticky" aria-expanded="false">
                        <img 
                            src="images/icons/menu.svg" 
                            alt="Menú hamburguesa desplegable" 
                            width="30"
                        />
                    </button>

                    <nav id="navbar-sticky" class="hidden w-full xl:flex xl:items-center xl:justify-between xl:w-auto">
                        <ul class="w-full xl:flex xl:items-center xl:justify-between xl:gap-6 xl:w-auto">
                            <li>
                                <a href="index.php?page=home" class="block rounded py-2 pl-3 pr-4 hover:bg-gray-100 <?= $page == 'home' ? 'text-green-500 font-bold' : 'text-gray-700' ?> xl:p-0 xl:hover:bg-transparent">Inicio</a>
                            </li>
                            <li>
                                <a href="index.php?page=bikes" class="block rounded py-2 pl-3 pr-4 hover:bg-gray-100 <?= $page == 'bikes' ? 'text-green-500 font-bold' : 'text-gray-700' ?> xl:p-0 xl:hover:bg-transparent">Bicicletas</a>
                            </li>
                            <li>
                                <a href="index.php?page=filter_by_brand" class="block rounded py-2 pl-3 pr-4 hover:bg-gray-100 <?= $page == 'filter_by_brand' ? 'text-green-500 font-bold' : 'text-gray-700' ?> xl:p-0 xl:hover:bg-transparent">Bicicletas Marca Venzo</a>
                            </li>
                            <li>
                                <a href="index.php?page=filter_by_mountain_bike_type" class="block rounded py-2 pl-3 pr-4 hover:bg-gray-100 <?= $page == 'filter_by_mountain_bike_type' ? 'text-green-500 font-bold' : 'text-gray-700' ?> xl:p-0 xl:hover:bg-transparent">Bicicletas de Montaña</a>
                            </li>
                            <li>
                                <a href="index.php?page=filter_by_folding_bike_type" class="block rounded py-2 pl-3 pr-4 hover:bg-gray-100 <?= $page == 'filter_by_folding_bike_type' ? 'text-green-500 font-bold' : 'text-gray-700' ?> xl:p-0 xl:hover:bg-transparent">Bicicletas Plegables</a>
                            </li>
                            <li>
                                <a href="index.php?page=contact" class="block rounded py-2 pl-3 pr-4 hover:bg-gray-100 <?= $page == 'contact' ? 'text-green-500 font-bold' : 'text-gray-700' ?> xl:p-0 xl:hover:bg-transparent">Contacto</a>
                            </li>
                            <li>
                                <a href="index.php?page=student_data" class="block rounded py-2 pl-3 pr-4 hover:bg-gray-100 <?= $page == 'student_data' ? 'text-green-500 font-bold' : 'text-gray-700' ?> xl:p-0 xl:hover:bg-transparent">Datos del Alumno</a>
                            </li>
                        </ul>
                    </nav>

                    <button type="button" id="navbar-sticky-cart" class="flex justify-center items-center hidden xl:block w-[45px] h-[45px] rounded-full hover:bg-gray-100 xl:flex xl:justify-center xl:items-center">
                        <img 
                            src="images/covers/cart_black.png" 
                            alt="Carrito de compras" 
                            class="w-[24px]"
                        />
                    </button>
                </div>
            </div>
        </header>

        <main class="bg-gray-100 pb-16">
            <?php require_once "views/$page.php" ?>
        </main>

        <footer class="relative bg-blueGray-200">
            <div class="container-fluid pt-10 mx-auto px-10 bg-slate-900">
                <div class="flex flex-wrap text-left lg:text-left">
                    <div class="w-full lg:w-6/12 px-4">
                        <p class="text-3xl fonat-semibold text-gray-200 mb-4">
                            ¡Sigamos en contacto!
                        </p>
        
                        <p class="text-lg mt-0 mb-2 text-gray-200">
                            Podés encontrarnos en cualquiera de estas plataformas
                        </p>
        
                        <div class="mt-6 lg:mb-0 mb-6">
                            <div class="flex space-x-6">
                                <div class="bg-gray-200 text-lightBlue-400 shadow-lg font-normal h-10 w-10 flex items-center justify-center rounded-full outline-none focus:outline-none">
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <img 
                                            src="images/icons/facebook.svg" 
                                            alt="Red social Facebook"
                                            title="Facebook"
                                            width="28" 
                                        />
                                    </a>
                                </div>

                                <div class="bg-gray-200 text-lightBlue-400 shadow-lg font-normal h-10 w-10 flex items-center justify-center rounded-full outline-none focus:outline-none">
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <img 
                                            src="images/icons/instagram.svg" 
                                            alt="Red social Instagram"
                                            title="Instagram"
                                            width="20"
                                        />
                                    </a>
                                </div>

                                <div class="bg-gray-200 text-lightBlue-400 shadow-lg font-normal h-10 w-10 flex items-center justify-center rounded-full outline-none focus:outline-none">
                                    <a href="https://twitter.com/" target="_blank">
                                        <img 
                                            src="images/icons/twitter.svg" 
                                            alt="Red social Twitter"
                                            title="Twitter"
                                            width="30"
                                        />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="w-full lg:w-6/12 px-4 pt-2">
                        <div class="flex flex-wrap items-top mb-6">
                            <div class="w-full lg:w-4/12 px-4 ml-auto">
                                <span class="block text-gray-200 text-sm font-semibold mb-2">ENLACES ÚTILES</span>
        
                                <ul class="list-unstyled">
                                    <li>
                                        <p class="text-gray-200 hover:text-blueGray-800 font-semibold block pb-2 text-sm">
                                            Sobre Nosotros
                                        </p>
                                    </li>

                                    <li>
                                        <p class="text-gray-200 hover:text-blueGray-800 font-semibold block pb-2 text-sm">
                                            Blog
                                        </p>
                                    </li>

                                    <li>
                                        <p class="text-gray-200 hover:text-blueGray-800 font-semibold block pb-2 text-sm">
                                            Github
                                        </p>
                                    </li>

                                    <li>
                                        <p class="text-gray-200 hover:text-blueGray-800 font-semibold block pb-2 text-sm">
                                            Productos Gratis
                                        </p>
                                    </li>
                                </ul>
                            </div>
        
                            <div class="w-full lg:w-4/12 px-4">
                                <span class="block text-gray-200 text-sm font-semibold mb-2">OTROS RECURSOS</span>
        
                                <ul class="list-unstyled">
                                    <li>
                                        <p class="text-gray-200 hover:text-blueGray-800 font-semibold block pb-2 text-sm">
                                            Licencia MIT
                                        </p>
                                    </li>

                                    <li>
                                        <p class="text-gray-200 hover:text-blueGray-800 font-semibold block pb-2 text-sm">
                                            Términos &amp; Condiciones
                                        </p>
                                    </li>

                                    <li>
                                        <p class="text-gray-200 hover:text-blueGray-800 font-semibold block pb-2 text-sm">
                                            Política de Privacidad
                                        </p>
                                    </li>
                                    
                                    <li>
                                        <p class="text-gray-200 hover:text-blueGray-800 font-semibold block pb-2 text-sm">
                                            Contacta con Nosotros
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        
                <hr class="my-6 border-blueGray-300">
        
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                        <div class="text-sm text-gray-200 font-semibold py-1 mb-6">
                            &copy; <span id="get-current-year">2024 | Rosi Lucas Gonzalo</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            const menuToggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('navbar-sticky');
            const menuCart = document.getElementById('navbar-sticky-cart');

            
            menuToggle.addEventListener('click', () => {
                const expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
                menuToggle.setAttribute('aria-expanded', !expanded);
                menu.classList.toggle('hidden');
                menuCart.classList.toggle('hidden');
            });
        </script>

        <script src="https://cdn.tailwindcss.com"></script>
    </body>
</html>