<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Dado doble</title>
    <style>
    .mensaje {
        padding: 15px;
        margin: 20px 0;
        width: fit-content;
        border-radius: 8px;
        font-weight: bold;
    }

    .mensaje-exito {
        background-color: #d4edda;
        color: #155724;
        border: 2px solid #28a745;
    }

    .mensaje-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 2px solid #dc3545;
    }

    .mensaje-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 2px solid #17a2b8;
    }

    .mensaje-par {
        background-color: #fff3cd;
        color: #856404;
        border: 2px solid #ffc107;
    }
    </style>
</head> 

<body>
<?php
    require 'includes/navbar.php';
    echo $_SERVER['PHP_SELF'];

    $numero_dado = rand(1, 6);

    $ruta_imagen = "img/dado_" . $numero_dado . ".svg";

    if ($numero_dado == 6) {
        $mensaje = "¡Tirada perfecta! Has sacado un 6.";
        $clase = "mensaje-exito";
    } elseif ($numero_dado == 1) {
        $mensaje = "¡Peor tirada posible! Has sacado un 1.";
        $clase = "mensaje-error";
    } elseif ($numero_dado % 2 == 0) {
        $mensaje = "Has sacado un número par.";
        $clase = "mensaje-par";
    } else {
        $mensaje = "Has sacado un número impar.";
        $clase = "mensaje-info";
    }
?>

<h1>Juego de Dados</h1>

<h2>Tirada del dado: <?php echo $numero_dado; ?></h2>

<img src="<?php echo $ruta_imagen; ?>" 
     alt="Dado <?php echo $numero_dado; ?>">

<div class="<?php echo $clase; ?>">
    <?php echo $mensaje; ?>
</div>

<br>

<a href="ejercicio2.php" class="button">Tirar de nuevo</a>

</body>

</html>