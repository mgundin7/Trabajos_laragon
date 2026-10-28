<?php
//EJEMPLO_0_COOKIES.php
//
//1. Detecta si el usuario presionó el botón "Reiniciar"
//Elimina la cookie estableciendo su fecha de expiración en el pasado (time() - 3600)
//Redirige a la misma página para refrescar
//exit() detiene la ejecución

if (isset($_POST['reiniciar'])) {
    setcookie('visitas', '', time() - 3600, '/');
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

//2. Leer y actualizar visitas
if (isset($_COOKIE['visitas'])) {
    $visitas = filter_var($_COOKIE['visitas'], FILTER_VALIDATE_INT);
    if ($visitas === false) {
        $visitas = 0;
    }
    $visitas = $visitas + 1;
    $esPrimeraVisita = false;
} else {
    $visitas = 1;
    $esPrimeraVisita = true;
}

//3. Actualizar cookie (expira en 30 días). Guardar la cookie
setcookie('visitas', $visitas, time() + (30 * 24 * 60 * 60), '/');
?>

<!-- PARTE HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas</title>
</head>
<body>
    <h1>Contador de Visitas</h1>
    
    <?php if ($esPrimeraVisita): ?>
        <h2>¡Bienvenido!</h2>
        <p><strong>Esta es tu primera visita a esta página.</strong></p>
        <p>Tu contador de visitas ha sido inicializado.</p>
    <?php else: ?>
        <h2>¡Bienvenido de nuevo!</h2>
        <p><strong>Número de visitas:</strong> <?php echo $visitas; ?></p>
        <p>Has visitado esta página <?php echo $visitas; ?> veces.</p>
    <?php endif; ?>
    
    <hr>
    
    <h3>Gestión del Contador</h3>
<!--    Envía una petición POST con el parámetro reiniciar.
        Esto activa la lógica de reinicio al inicio del código -->
    <form method="POST" action="">
        <button type="submit" name="reiniciar" value="1">Reiniciar Contador</button>
    </form>
    
    <hr>
    
    <h3>Información Técnica</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Dato</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td>Primera visita</td>
            <td><?php echo $esPrimeraVisita ? 'Sí' : 'No'; ?></td>
        </tr>
        <tr>
            <td>Contador actual</td>
            <td><?php echo $visitas; ?></td>
        </tr>
        <tr>
            <td>Cookie establecida</td>
            <td><?php echo isset($_COOKIE['visitas']) ? 'Sí' : 'No (se establecerá en la próxima carga)'; ?></td>
        </tr>
    </table>
    
    <hr>
    
    <p><small>Nota: El contador se reiniciará automáticamente después de 30 días de inactividad.</small></p>
</body>
</html>