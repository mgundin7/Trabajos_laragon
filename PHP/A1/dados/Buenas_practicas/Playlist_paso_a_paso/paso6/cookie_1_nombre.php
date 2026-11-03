<?php
declare(strict_types=1);

require_once __DIR__ . '/src/bootstrap.php';

$duracion = 7 * 24 * 60 * 60; // 7 días en segundos
$errorNombre = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    $nombreRaw = $_POST['nombre'] ?? '';
    $nombre = is_string($nombreRaw) ? trim($nombreRaw) : '';

    if ($nombre === '' || mb_strlen($nombre) > 40) {
        $errorNombre = 'Escribe un nombre de entre 1 y 40 caracteres.';
    } else {
        setcookie('nombre_usuario', $nombre, [
            'expires'  => time() + $duracion,
            'path'     => '/',
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
        header('Location: ' . $_SERVER['PHP_SELF']); 
        exit();
    }
}

if (isset($_POST['olvidar'])) {
    setcookie('nombre_usuario', '', time() - 3600, '/');
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$nombreGuardado = '';
if (isset($_COOKIE['nombre_usuario']) && is_string($_COOKIE['nombre_usuario'])) {
    $nombreGuardado = trim($_COOKIE['nombre_usuario']);
}
$tieneNombre = $nombreGuardado !== '';

renderHeader('Cookie 1 - Nombre');
?>

<h1>Cookie 1: Recordar tu nombre</h1>

<?php if ($tieneNombre): ?>
    <h2>¡Hola de nuevo, <?= e($nombreGuardado) ?>! 👋</h2>
    <p>Te recuerdo gracias a una cookie guardada en tu navegador durante 7 días.</p>
<?php else: ?>
    <h2>¡Bienvenido! 🎉</h2>
    <p>Todavía no sé cómo te llamas.</p>
<?php endif; ?>

<hr>

<h3>Gestión del nombre</h3>

<?php if ($errorNombre !== ''): ?>
    <p role="alert"><?= e($errorNombre) ?></p>
<?php endif; ?>

<form method="POST" action="">
    <p>
        <label for="nombre">Tu nombre:</label><br>
        <input type="text" id="nombre" name="nombre" maxlength="40" required>
    </p>
    <button type="submit" name="guardar" value="1">💾 Guardar nombre</button>
</form>

<?php if ($tieneNombre): ?>
    <form method="POST" action="">
        <button type="submit" name="olvidar" value="1">🗑️ Olvidar mi nombre</button>
    </form>
<?php endif; ?>

<hr>

<h3>Información técnica</h3>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Dato</th>
        <th>Valor</th>
    </tr>
    <tr>
        <td>Cookie establecida</td>
        <td><?= $tieneNombre ? 'Sí' : 'No' ?></td>
    </tr>
    <tr>
        <td>Valor de la cookie</td>
        <td><?= $tieneNombre ? e($nombreGuardado) : 'N/A' ?></td>
    </tr>
    <tr>
        <td>Duración</td>
        <td>7 días</td>
    </tr>
</table>

<p><small>Nota: la cookie caduca a los 7 días y se vuelve a guardar si introduces el nombre otra vez.</small></p>

<?php renderFooter(); ?>
