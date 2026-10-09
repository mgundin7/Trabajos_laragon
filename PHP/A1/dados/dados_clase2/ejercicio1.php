<?php
// ===== VARIABLES =====
$numero_dado = rand(1, 6);
$ruta_imagen = "img/dado_" . $numero_dado . ".svg";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Dado simple</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php require 'includes/navbar.php'; ?>

    <main class="contenedor">
        <h1>🎲 Ejercicio 1: Tirada de Dado</h1>
        <p class="concepto">Concepto practicado: <strong>variables</strong></p>

        <p>Has sacado un <strong><?php echo $numero_dado; ?></strong></p>
        <img src="<?php echo $ruta_imagen; ?>" alt="Dado mostrando el número <?php echo $numero_dado; ?>" class="imagen-dado">

        <a href="ejercicio1.php" class="boton">🔄 Volver a tirar</a>
    </main>
</body>
</html>
