<?php
require_once 'classes/Student.php';

$students = Student::allDataStudent();
?>
<section class="pt-32">
    <h1 class="text-center text-4xl font-bold text-gray-800 pt-4 mb-16">Datos del Alumno</h1>

    <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col md:flex-row justify-around w-[80%] md:w-[650px] gap-6 mx-auto">
        <?php foreach ($students as $student) { ?>
            <div>
                <picture>
                    <source media="(max-width: 480px)" srcset="images/covers/profile/<?= $student->getPortadaMobile() ?>">
                    <source media="(max-width: 768px)" srcset="images/covers/profile/<?= $student->getPortadaTablet() ?>">
                    <img 
                        src="images/covers/profile/<?= $student->getPortadaDesktop() ?>" 
                        alt="Foto del alumno"
                        class="mx-auto rounded-md"
                    />
                </picture>
            </div>

            <ul class="w-[80%] mx-auto">
                <li class="mb-3">
                    <span class="font-semibold">Nombre y Apellido: </span> <?= $student->getNombreApellido() ?>
                </li>
                <li class="mb-3">
                    <span class="font-semibold">Edad: </span> <?= $student->getEdad() ?> años
                </li>
                <li class="mb-3">
                    <span class="font-semibold">Correo Electrónico: </span> <?= $student->getCorreoElectronico() ?>
                </li>
            </ul>
        <?php } ?>
    </div>
</section>