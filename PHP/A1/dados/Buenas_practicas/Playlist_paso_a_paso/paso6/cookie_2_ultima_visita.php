<?php
declare(strict_types=1);

require_once __DIR__ . '/src/bootstrap.php';

// 1. Reiniciar: se elimina la cookie
if (isset($_POST['reiniciar'])) {
    setcookie('ultima_visita', '', time() - 3600, '/');
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$ahora = time();
$visitaAnterior = null;
$esPrimeraVisita = true;

if (isset($_COOKIE['ultima_visita'])) {
    $valor = filter_var($_COOKIE['ultima_visita'], FILTER_VALIDATE_INT);
    if ($valor !== false && $valor > 0 && $valor <= $ahora) {
        $visitaAnterior = $valor;
        $esPrimeraVisita = false;
    }
}

setcookie('ultima_visita', (string) $ahora, [
    'expires'  => $ahora + (30 * 24 * 60 * 60),
    'path'     => '/',
    'httponly' => true,
    'samesite' => 'Lax',
]);

$haceCuanto = 'Es tu primera visita';
if ($visitaAnterior !== null) {
    $diff = $ahora - $visitaAnterior;
    $dias = intdiv($diff, 86400);
    $horas = intdiv($diff % 86400, 3600);
    $minutos = intdiv($diff % 3600, 60);
    $segundos = $diff % 60;
    $haceCuanto = "{$dias} d, {$horas} h, {$minutos} min, {$segundos} seg";
}

renderHeader('Cookie 2 - Última visita');
?>

<h1>Cookie 2: Última visita</h1>

<?php if ($esPrimeraVisita): ?>
    <h2>¡Bienvenido! 🎉</h2>
    <p><strong>Es la primera vez que te veo por aquí.</strong></p>
    <p>He guardado la fecha de hoy en una cookie para la próxima vez.</p>
<?php else: ?>
    <h2>¡Bienvenido de nuevo! 👋</h2>
    <p><strong>Tu visita anterior fue el:</strong> <?= e(date('d/m/Y H:i:s', $visitaAnterior)) ?></p>
    <p>Han pasado <?= e($haceCuanto) ?> desde entonces.</p>
<?php endif; ?>

<hr>

<h3>Gestión de la cookie</h3>
<form method="POST" action="">
    <button type="submit" name="reiniciar" value="1">🔄 Borrar historial de visitas</button>
</form>

<hr>

<h3>Información técnica</h3>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Dato</th>
        <th>Valor</th>
    </tr>
    <tr>
        <td>Primera visita</td>
        <td><?= $esPrimeraVisita ? 'Sí' : 'No' ?></td>
    </tr>
    <tr>
        <td>Visita anterior</td>
        <td><?= $visitaAnterior !== null ? e(date('d/m/Y H:i:s', $visitaAnterior)) : 'Es tu primera visita' ?></td>
    </tr>
    <tr>
        <td>Visita actual</td>
        <td><?= e(date('d/m/Y H:i:s', $ahora)) ?></td>
    </tr>
    <tr>
        <td>Cookie establecida</td>
        <td><?= isset($_COOKIE['ultima_visita']) ? 'Sí' : 'No (se establecerá en la próxima carga)' ?></td>
    </tr>
</table>

<p><small>Nota: la cookie se renueva en cada visita y caduca tras 30 días sin entrar.</small></p>

<?php renderFooter(); ?>
