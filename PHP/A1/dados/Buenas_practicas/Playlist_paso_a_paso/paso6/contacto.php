<?php
declare(strict_types=1);

require_once __DIR__ . '/src/bootstrap.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['csrf_contacto'])) {
    $_SESSION['csrf_contacto'] = bin2hex(random_bytes(32));
}

renderHeader('Contacta');
?>

<h1>Contacta</h1>
<p>Rellena el formulario y nos pondremos en contacto contigo.</p>

<form action="recibir_contacto.php" method="post">
    <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf_contacto']) ?>">

    <p>
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" maxlength="60" required>
    </p>

    <p>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" maxlength="254" required>
    </p>

    <p>
        <label for="telefono">Teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono" maxlength="20"
               pattern="[0-9 +().-]{7,20}" required>
    </p>

    <button type="submit">Enviar</button>
</form>

<?php renderFooter(); ?>
