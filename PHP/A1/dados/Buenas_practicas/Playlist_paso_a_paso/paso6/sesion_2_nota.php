<?php
declare(strict_types=1);


require_once __DIR__ . '/src/bootstrap.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_POST['guardar'])) {
    $textoRaw = $_POST['nota'] ?? '';
    $_SESSION['nota'] = is_string($textoRaw) ? trim(mb_substr($textoRaw, 0, 200)) : '';
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['borrar'])) {
    unset($_SESSION['nota']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$nota = $_SESSION['nota'] ?? '';
$hayNota = $nota !== '';

renderHeader('Sesión 2 - Nota');
?>

<h1>Sesión 2: Nota temporal</h1>

<?php if ($hayNota): ?>
    <h2>Tu nota guardada:</h2>
    <p><strong><?= e($nota) ?></strong></p>
<?php else: ?>
    <h2>No hay ninguna nota guardada</h2>
<?php endif; ?>

<hr>

<form method="POST" action="">
    <p>
        <label for="nota">Escribe una nota:</label><br>
        <input type="text" id="nota" name="nota" maxlength="200" required>
    </p>
    <button type="submit" name="guardar" value="1">💾 Guardar nota</button>
</form>

<?php if ($hayNota): ?>
    <form method="POST" action="">
        <button type="submit" name="borrar" value="1">🗑️ Borrar nota</button>
    </form>
<?php endif; ?>

<hr>

<h3>Información de la sesión</h3>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Dato</th>
        <th>Valor</th>
    </tr>
    <tr>
        <td>Nota guardada</td>
        <td><?= $hayNota ? 'Sí' : 'No' ?></td>
    </tr>
    <tr>
        <td>ID de sesión</td>
        <td><code><?= e(session_id()) ?></code></td>
    </tr>
</table>

<p><small>Nota: la nota se pierde al cerrar el navegador.</small></p>

<?php renderFooter(); ?>