<?php
require_once __DIR__ . '/src/bootstrap.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contacto.php');
    exit;
}

$token = $_POST['csrf'] ?? '';

if (
    !is_string($token) ||
    empty($_SESSION['csrf_contacto']) ||
    !hash_equals($_SESSION['csrf_contacto'], $token)
) {
    http_response_code(403);
    exit('Solicitud no válida.');
}

$nombreRaw = $_POST['nombre'] ?? '';
$emailRaw = $_POST['email'] ?? '';
$telefonoRaw = $_POST['telefono'] ?? '';

$nombre = is_string($nombreRaw) ? trim($nombreRaw) : '';
$email = is_string($emailRaw) ? trim($emailRaw) : '';
$telefono = is_string($telefonoRaw) ? trim($telefonoRaw) : '';

$errores = [];

if ($nombre === '') {
    $errores[] = 'El nombre es obligatorio.';
} elseif (mb_strlen($nombre) > 60) {
    $errores[] = 'El nombre no puede superar los 60 caracteres.';
}

if ($email === '' || mb_strlen($email) > 254 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = 'Introduce un email válido.';
}

if (!preg_match('/^[0-9]{9}$/', $telefono)) {
    $errores[] = 'El teléfono debe tener exactamente 9 números, sin espacios ni símbolos.';
}

renderHeader('Datos de contacto');
?>

<h1>Datos de contacto</h1>

<?php if ($errores !== []): ?>
    <ul role="alert">
        <?php foreach ($errores as $error): ?>
            <li><?= e($error) ?></li>
        <?php endforeach; ?>
    </ul>
    <p><a href="contacto.php">Volver al formulario</a></p>
<?php else: ?>
    <p>Nombre: <strong><?= e($nombre) ?></strong></p>
    <p>Email: <strong><?= e($email) ?></strong></p>
    <p>Teléfono: <strong><?= e($telefono) ?></strong></p>
    <p>Contactaremos contigo en la menor brevedad posible</p>
<?php endif; ?>

<?php renderFooter(); ?>
