<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dados</title>
</head>

<body>
    <?php
        require 'includes/navbar.php';
        echo $_SERVER['PHP_SELF'];
    ?>
    <h1>Juego de Dados</h1>

    <?php
        $numero_dado = rand(1, 6);

        echo "Tirada del dado: $numero_dado";
        $ruta_imagen = "img/dado_". $numero_dado . ".svg";
    ?>

    <br>

    <img src=<?php echo $ruta_imagen; ?> alt="Dado <?php echo $numero_dado; ?>">

    <br><br>
    <a href="ejercicio1.php" class="button">Tirar de nuevo</a>

</body>
</html>
