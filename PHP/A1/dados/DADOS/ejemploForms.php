<?php
echo ($_SERVER['PHP_SELF']);
// ¿Se ha enviado el formulario?
$formularioEnviado = isset($_GET['enviar']);

// Recuperamos los datos (cadena vacía si no existen).
$nombre = '';
$email  = '';

if ($formularioEnviado) {
    $nombre = $_GET['name'];
    $email  = $_GET['email'];
    $maquina = $_GET['maquina-enigma'];
}

// $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';

// //Equivalente:
// if (isset($_REQUEST['nombre'])) {
//     $nombre = $_REQUEST['nombre'];
// }else{
//     $nombre = '';
// }
// ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
</head>
<body>

    <h1>Formulario</h1>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">

        <p>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($nombre) ?>">
        </p>

        <p>
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
        </p>
        <input type="hidden" name="maquina-enigma" value="149">
        <button type="submit" name="enviar" value="1">Enviar</button>

    </form>
    <?php 
        var_dump($_REQUEST);
    ?>

    <?php if ($formularioEnviado): ?>
        <hr>
        <h2>Resultado</h2>
        <p>Bienvenido, <strong><?= htmlspecialchars($nombre) ?></strong></p>
        <p>Tu e-mail es: <strong><?= htmlspecialchars($email) ?></strong></p>
        <p>Tu maquina enigma es: <strong><?= htmlspecialchars($maquina)?></strong></p>
    <?php endif; ?>

</body>
</html>