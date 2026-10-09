<?php
// ===== VARIABLES =====
$numero_dado = rand(1, 6);
$ruta_imagen = "img/dado_" . $numero_dado . ".svg";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Dado con mensaje</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <?php require 'includes/navbar.php'; 

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

    <main class="contenedor">
        <h1>🎲 Ejercicio 2: Tirada de dado con mensaje</h1>
        <p class="concepto">Concepto practicado: <strong>Condicionales</strong></p>

        <p>Has sacado un <strong><?php echo $numero_dado; ?></strong></p>
        <img src="<?php echo $ruta_imagen; ?>" alt="Dado mostrando el número <?php echo $numero_dado; ?>" class="imagen-dado">
        
        <div class="<?php echo $clase; ?>">
        <?php echo $mensaje; ?>
        </div>

        <a href="ejercicio2.php" class="boton">🔄 Volver a tirar</a>
    </main>
</body>
</html>
