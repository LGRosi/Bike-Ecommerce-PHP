<?php
require_once 'classes/Bike.php';

$bikes = Bike::allBike();
?>

<section class="pt-32">
    <?php if (!empty($bikes)) { ?>
        <h1 class="text-center text-4xl font-bold text-gray-800 pt-4 mb-4">Bicicletas</h1>

        <p class="text-center text-xl text-gray-800 mb-4">¡Las mejores bicicletas con los mejores precios!</p>

        <article class="py-10">
            <div class="mx-auto grid max-w-6xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <?php foreach ($bikes as $bike) { ?>
                    <div class="flex flex-col justify-between rounded-xl bg-white p-3 shadow-lg hover:shadow-green-400 hover:shadow-md hover:transform hover:scale-105 duration-300">
                        <div class="relative flex items-end justify-center overflow-hidden rounded-xl">
                            <picture>
                                <source media="(max-width: 480px)" srcset="images/covers/bikes/<?= $bike->getPortadaMobile() ?>">
                                <source media="(max-width: 768px)" srcset="images/covers/bikes/<?= $bike->getPortadaTablet() ?>">
                                <img 
                                    src="images/covers/bikes/<?= $bike->getPortadaDesktop() ?>" 
                                    alt="<?= $bike->getTitulo() ?>" 
                                />
                            </picture>
                        </div>

                        <p class="mt-3 text-sm text-slate-400">Publicación: <?= $bike->formatPublicationDate() ?></p>
                        <h2 class="text-slate-800 font-semibold"><?= $bike->getTitulo() ?></h2>
                        <p class="mt-3 text-sm text-slate-400"><?= $bike->cutOutWords() ?></p>

                        <div class="mt-8 mb-6 flex items-end justify-between">
                            <p class="text-xl font-bold text-black mb-1"><?= $bike->formattedPrice() ?></p>

                            <div class="flex items-center space-x-1.5 rounded-lg bg-white px-3 py-1.5 text-green-600 font-semibold text-sm border border-green-600">
                                <a href="index.php?page=bike_detail&id=<?= $bike->getId() ?>">
                                    Detalle
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center space-x-1.5 rounded-lg bg-green-500 px-4 py-1.5 mb-2 text-white duration-100 hover:bg-green-700">
                            <button type="button" class="text-md text-left font-bold w-full">   
                                Comprar
                            </button>

                            <img
                                src="images/covers/cart_white.png"
                                alt="Carrito de compras" 
                                class="w-[22px]"
                            />
                        </div>
                    </div>
                <?php } ?>
            </div>
        </article>
    <?php } else { ?>
        <h1 class="text-center text-4xl font-bold text-gray-800 pt-4 w-[80%] mx-auto">No hay bicicletas disponibles en este momento</h1>
    
        <div class="w-[80%] md:w-[450px] mx-auto">
            <picture>
                <source media="(max-width: 480px)" srcset="images/covers/there_are_no_bicycles_mobile.png">
                <source media="(max-width: 768px)" srcset="images/covers/there_are_no_bicycles_tablet.png">
                <img 
                    src="images/covers/there_are_no_bicycles_desktop.png" 
                    alt="No hay bicicletas disponibles"
                    class="mx-auto"
                />
            </picture>
        </div>
    <?php } ?>
</section>