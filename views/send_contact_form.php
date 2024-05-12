<?php
$dataForm = $_POST;

$messageSuccess = 'Tu mensaje fue enviado con éxito';

$name = isset($dataForm['name']) ? $dataForm['name'] : '';
$lastname = isset($dataForm['lastname']) ? $dataForm['lastname'] : '';
$email = isset($dataForm['email']) ? $dataForm['email'] : '';
$message = isset($dataForm['message']) ? $dataForm['message'] : '';

?>

<section class="pt-32">
    <div class="bg-white shadow-lg rounded-lg w-[80%] md:w-[45%] mx-auto flex flex-col items-center">
        <img 
            src="images/icons/check_green.svg" 
            alt=""
            class="w-[100px] mt-4"
        />

        <h1 class="w-[85%] text-center text-2xl font-bold text-gray-800 mb-2 px-6"><?= $messageSuccess ?></h1>

        <p class="mb-12 px-6 w-[85%] text-center">Muchas gracias por tu consulta, te estaremos respondiendo a la brevedad</p>

        <dl class="w-[60%] mx-auto mb-6">
            <dt class="float-left mr-1 font-semibold">Nombre y Apellido: </dt>
            <dd class="mb-3"><?= $name ?> <?= $lastname ?></dd>
    
            <dt class="float-left mr-1 font-semibold">Email: </dt>
            <dd class="mb-3"><?= $email ?></dd>
    
            <dt class="float-left mr-1 font-semibold">Mensaje: </dt>
            <dd class="mb-3"><?= $message ?></dd>
        </dl>
    </div>
</section>