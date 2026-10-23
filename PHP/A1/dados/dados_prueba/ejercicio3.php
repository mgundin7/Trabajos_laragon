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

    .dados {
        display: flex;
        gap: 20px;
        margin: 20px 0;
    }

    .dados img {
        width: 100px;
    }
</style>
</head>

<body>
<?php
    require 'includes/navbar.php';
    echo $_SERVER['PHP_SELF'];

    $resultados = array();

    $suma_total = 0;

    for ($i = 0; $i < 2; $i++) {

        $numero_dado = rand(1, 6);

        $resultados[] = $numero_dado;

        $suma_total += $numero_dado;
    }
?>

<h1>Dado doble</h1>

<div class="dados">

    <?php
        foreach ($resultados as $numero_dado) {

            $ruta_imagen = "img/dado_" . $numero_dado . ".svg";
    ?>

        <img src="<?php echo $ruta_imagen; ?>"
             alt="Dado <?php echo $numero_dado; ?>">

    <?php
        }
    ?>

</div>

<h2>Suma total: <?php echo $suma_total; ?></h2>

<?php
    if ($suma_total == 12) {
        echo '<div class="mensaje mensaje-exito">';
        echo '¡Suma máxima posible! Has sacado 12.';
        echo '</div>';

    } elseif ($suma_total == 2) {
        echo '<div class="mensaje mensaje-error">';
        echo '¡Suma mínima posible! Has sacado 2.';
        echo '</div>';
    }
?>

<br>

<a href="ejercicio3.php" class="button">Tirar de nuevo</a>

</body>

</html>