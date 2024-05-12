<?php
require_once 'classes/Bike.php';

$idBike = $paramsUrl['id'] ?? false;

$bikeById = Bike::bikeById($idBike);

if ($idBike && $bikeById) {
    $originalTechnicalSpecifications = $bikeById->getEspecificacionesTecnicas();
    $newTechnicalSpecifications = Bike::accentsAndSpecialCharactersToKeys($originalTechnicalSpecifications);

    $formattedTitleUcWords = ucwords($bikeById->getTitulo());
    $formattedTitle = str_replace("_", " ", $formattedTitleUcWords);
    $mainTitle = !empty($bikeById) ? "Detalle de la $formattedTitle" : "";
} else {
    $bikeById = [];
}
?>

<section class="pt-32">
    <article class="flex flex-col justify-center">
        <?php if (!empty($bikeById)) { ?>
            <h1 class="text-center text-4xl font-bold text-gray-800 pt-4 mb-16 w-[80%] mx-auto"><?= $mainTitle ?></h1>

            <div class="flex flex-col xl:flex-row">
                <div class="relative flex flex-col mb-8 md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 pb-0 max-w-lg md:max-w-3xl mx-auto border border-white bg-white">
                    <div class="w-full md:w-1/3 bg-white grid place-items-center">
                        <picture>
                            <source media="(max-width: 480px)" srcset="images/covers/bikes/<?= $bikeById->getPortadaMobile() ?>">
                            <source media="(max-width: 768px)" srcset="images/covers/bikes/<?= $bikeById->getPortadaTablet() ?>">
                            <img 
                                src="images/covers/bikes/<?= $bikeById->getPortadaDesktop() ?>" 
                                alt="<?= $bikeById->getTitulo() ?>" 
                            />
                        </picture>
                    </div>
                    <div class="w-full md:w-2/3 bg-white flex flex-col justify-between space-y-2 p-3">
                        <div class="flex justify-between item-center">
                            <div>
                                <p class="text-gray-600 text-sm flex flex-col">Marca: <span><?= $bikeById->getMarca() ?></span></p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm flex flex-col">Código: <span><?= $bikeById->getCodigo() ?></span></p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm flex flex-col">Publicación: <span><?= $bikeById->formatPublicationDate() ?></span></p>
                            </div>
                        </div>
                        <h2 class="text-gray-800 font-bold md:text-2xl text-xl"><?= $bikeById->getTitulo() ?></h2>
                        <p class="md:text-lg text-gray-500 text-base"><?= $bikeById->getDescripcion() ?></p>
                        <p class="font-bold text-gray-800 pb-8">Tipo de bicicleta: <?= $bikeById->getTipoDeBicicleta() ?></p>
                        <div class="flex justify-between items-center">
                            <p class="text-xl sm:text-3xl font-bold text-gray-800"><?= $bikeById->formattedPrice() ?></p>
                            <div class="flex items-center w-[150px] h-[45px] space-x-1.5 rounded-lg bg-green-500 px-4 py-1.5 mb-2 text-white text-lg duration-100 hover:bg-green-700">
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
                    </div>
                </div>
    
                <div class="relative flex flex-col md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-5 max-w-lg md:max-w-3xl mx-auto border border-white bg-white">
                    <h3 class="text-gray-800 font-bold md:text-xl text-lg ml-5 mb-6">Especificaciones Técnicas:</h3>
    
                    <ul class="pr-3">
                        <?php foreach ($newTechnicalSpecifications as $keyTechnicalSpecifications => $valueTechnicalSpecifications) { ?>
                            <li class="mb-1.5">
                                <span class="font-semibold"><?= ucfirst($keyTechnicalSpecifications) ?>:</span> <?= $valueTechnicalSpecifications ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } else { ?>
            <h1 class="text-center text-4xl font-bold text-gray-800 py-4 w-[80%] mx-auto">No hay especificaciones técnicas para esta bicicleta</h1>

            <div class="w-[80%] md:w-[450px] mx-auto">
                <picture>
                    <source media="(max-width: 480px)" srcset="images/covers/there_are_no_technical_specifications_mobile.png">
                    <source media="(max-width: 768px)" srcset="images/covers/there_are_no_technical_specifications_tablet.png">
                    <img 
                        src="images/covers/there_are_no_technical_specifications_desktop.png" 
                        alt="No hay especificaciones técnicas para esta bicicleta"
                        class="mx-auto"
                    />
                </picture>
            </div>
        <?php } ?>
    </article>
</section>