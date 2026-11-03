<?php
declare(strict_types=1);


require_once __DIR__ . '/src/bootstrap.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Si no existe el contador, se crea a 0
if (!isset($_SESSION['clicks'])) {
    $_SESSION['clicks'] = 0;
}

if (isset($_POST['sumar'])) {
    $_SESSION['clicks'] = $_SESSION['clicks'] + 1;
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['reiniciar'])) {
    $_SESSION['clicks'] = 0;
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$clicks = $_SESSION['clicks'];

renderHeader('Sesión 1 - Clics');
?>

<h1>Sesión 1: Contador de clics</h1>

<h2>Clics: <?= e($clicks) ?></h2>

<form method="POST" action="">
    <button type="submit" name="sumar" value="1">➕ Sumar 1</button>
    <button type="submit" name="reiniciar" value="1">🔄 Reiniciar</button>
</form>

<hr>

<h3>Información de la sesión</h3>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Dato</th>
        <th>Valor</th>
    </tr>
    <tr>
        <td>Clics en $_SESSION['clicks']</td>
        <td><?= e($clicks) ?></td>
    </tr>
    <tr>
        <td>ID de sesión</td>
        <td><code><?= e(session_id()) ?></code></td>
    </tr>
</table>

<p><small>Nota: el contador se pierde al cerrar el navegador.</small></p>

<?php renderFooter(); ?>