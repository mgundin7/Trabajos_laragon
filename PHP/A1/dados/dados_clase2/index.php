<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>El Dado Virtual - Prácticas PHP</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php require 'includes/navbar.php'; ?>

    <main class="contenedor">
        <h1>🎲 El Dado Virtual</h1>
        <p>Colección de ejercicios en PHP que usan siempre el mismo tema (la tirada
        de un dado) para practicar <strong>variables</strong>,
        <strong>condicionales</strong> y <strong>bucles</strong>.</p>

        <div class="tarjetas">
            <a href="ejercicio1.php" class="tarjeta">
                <h2>1. Dado simple</h2>
                <p>Variables</p>
            </a>
            <a href="ejercicio2.php" class="tarjeta">
                <h2>2. Dado con mensajes</h2>
                <p>Condicionales (switch)</p>
            </a>
            <a href="ejercicio3.php" class="tarjeta">
                <h2>3. Dado doble</h2>
                <p>Bucle for + suma</p>
            </a>
            <a href="ejercicio4_nuevo.php" class="tarjeta">
                <h2>4. Historial de tiradas</h2>
                <p>Bucle while + arrays</p>
            </a>
        </div>
    </main>
</body>
</html>