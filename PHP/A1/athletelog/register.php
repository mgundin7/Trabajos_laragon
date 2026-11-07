<?php
declare(strict_types=1);
ini_set('display_errors', '1');
error_reporting(E_ALL);
require_once __DIR__ . '/includes/bootstrap.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

const NAME_MIN     = 3;
const NAME_MAX     = 50;
const USERNAME_MIN = 4;
const USERNAME_MAX = 15;
const PASSWORD_MIN = 8;
const AGE_MIN      = 16;
const AGE_MAX      = 60;

function fieldError(array $errors, string $field): string
{
    return isset($errors[$field])
        ? '<span class="field-error" role="alert">' . e($errors[$field]) . '</span>'
        : '';
}


if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

$name     = '';
$username = '';
$email    = '';
$age      = '';
$sport    = '';
$level    = '';
$days     = [];
$privacy  = false;
$errors   = [];      // clave = nombre del campo, valor = mensaje
$success  = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Validar token CSRF
    $token = $_POST['csrf'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['csrf'], $token)) {
        http_response_code(403);
        exit('Solicitud no válida.');
    }

    // 2. Recoger y sanear los datos (siempre comprobando el tipo)
    $nameRaw     = $_POST['name'] ?? '';
    $usernameRaw = $_POST['username'] ?? '';
    $emailRaw    = $_POST['email'] ?? '';
    $password    = is_string($_POST['password'] ?? null) ? $_POST['password'] : '';
    $passwordRep = is_string($_POST['password_repeat'] ?? null) ? $_POST['password_repeat'] : '';
    $ageRaw      = $_POST['age'] ?? '';
    $sportRaw    = $_POST['sport'] ?? '';
    $levelRaw    = $_POST['level'] ?? '';
    $daysRaw     = $_POST['days'] ?? [];

    $name     = is_string($nameRaw) ? trim($nameRaw) : '';
    $username = is_string($usernameRaw) ? trim($usernameRaw) : '';
    $email    = is_string($emailRaw) ? trim($emailRaw) : '';
    $age      = is_string($ageRaw) ? trim($ageRaw) : '';
    $sport    = is_string($sportRaw) ? $sportRaw : '';
    $level    = is_string($levelRaw) ? $levelRaw : '';
    $privacy  = isset($_POST['privacy']) && $_POST['privacy'] === '1';

    // Solo se aceptan días que existan en DAYS
    $days = is_array($daysRaw)
        ? array_values(array_intersect(array_keys($days), array_filter($daysRaw, 'is_string')))
        : [];

    // 3. Validaciones
    if ($name === '') {
        $errors['name'] = 'El nombre es obligatorio.';
    } elseif (mb_strlen($name) < NAME_MIN || mb_strlen($name) > NAME_MAX) {
        $errors['name'] = 'El nombre debe tener entre ' . NAME_MIN . ' y ' . NAME_MAX . ' caracteres.';
    }

    if ($username === '') {
        $errors['username'] = 'El usuario es obligatorio.';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $errors['username'] = 'El usuario solo puede contener letras, números y _.';
    } elseif (mb_strlen($username) < USERNAME_MIN || mb_strlen($username) > USERNAME_MAX) {
        $errors['username'] = 'El usuario debe tener entre ' . USERNAME_MIN . ' y ' . USERNAME_MAX . ' caracteres.';
    }

    if ($email === '') {
        $errors['email'] = 'El email es obligatorio.';
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = 'El email no tiene un formato válido.';
    }

    if ($password === '') {
        $errors['password'] = 'La contraseña es obligatoria.';
    } elseif (mb_strlen($password) < PASSWORD_MIN) {
        $errors['password'] = 'La contraseña debe tener al menos ' . PASSWORD_MIN . ' caracteres.';
    } elseif ($password !== $passwordRep) {
        $errors['password_repeat'] = 'Las contraseñas no coinciden.';
    }

    $ageInt = filter_var($age, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => AGE_MIN, 'max_range' => AGE_MAX],
    ]);
    if ($ageInt === false) {
        $errors['age'] = 'La edad debe ser un número entre ' . AGE_MIN . ' y ' . AGE_MAX . '.';
    }

    if (!array_key_exists($sport, $sports)) {
        $errors['sport'] = 'Debes seleccionar un deporte válido.';
    }

    if (!array_key_exists($level, $levels)) {
        $errors['level'] = 'Debes seleccionar un nivel competitivo.';
    }

    if ($days === []) {
        $errors['days'] = 'Debes marcar al menos un día de entrenamiento.';
    }

    if (!$privacy) {
        $errors['privacy'] = 'Debes aceptar el tratamiento de tus datos.';
    }

    if ($errors === []) {
        $success = true; // Aún no se guarda en ningún sitio
    }
}

renderHeader('Registro');
renderNavbar('Navbar');
?>

<style>
    .error-list {
        background: #fdecea;
        border: 1px solid #d93025;
        border-left: 6px solid #d93025;
        color: #8a1c14;
        padding: 12px 12px 12px 32px;
        margin-bottom: 20px;
    }
    .field-error { display: block; color: #d93025; font-size: 0.9em; margin-top: 4px; }
    .success { background: #e6f4ea; border: 1px solid #1e8e3e; color: #0d5c25; padding: 12px; }
    form p { margin: 12px 0; }
    label { display: inline-block; margin-right: 6px; }
</style>

<main>
    <?php if ($success): ?>
        <div class="success" role="status">
            <h1>¡Registro correcto!</h1>
            <p>Estos son los datos recibidos:</p>
        </div>
        <ul>
            <li>Nombre completo: <strong><?= e($name) ?></strong></li>
            <li>Usuario: <strong><?= e($username) ?></strong></li>
            <li>Email: <strong><?= e($email) ?></strong></li>
            <li>Edad: <strong><?= e($age) ?></strong></li>
            <li>Deporte principal: <strong><?= e($sports[$sport]['name']) ?></strong></li>
            <li>Nivel competitivo: <strong><?= e($levels[$level]) ?></strong></li>
            <li>Días de entrenamiento:
                <ul>
                    <?php foreach ($days as $code): ?>
                        <li><?= e(DAYS[$code]) ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    <?php else: ?>
        <h1>Date de alta</h1>

        <?php if ($errors !== []): ?>
            <ul class="error-list" role="alert">
                <?php foreach ($errors as $error): ?>
                    <li><?= e($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="<?= e($_SERVER['SCRIPT_NAME']) ?>" method="post" novalidate>
            <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">

            <p>
                <label for="name">Nombre completo:</label>
                <input type="text" id="name" name="name" value="<?= e($name) ?>"
                       minlength="<?= NAME_MIN ?>" maxlength="<?= NAME_MAX ?>" required>
                <?= fieldError($errors, 'name') ?>
            </p>

            <p>
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" value="<?= e($username) ?>"
                       minlength="<?= USERNAME_MIN ?>" maxlength="<?= USERNAME_MAX ?>"
                       pattern="[a-zA-Z0-9_]+" required>
                <?= fieldError($errors, 'username') ?>
            </p>

            <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= e($email) ?>" required>
                <?= fieldError($errors, 'email') ?>
            </p>

            <p>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password"
                       minlength="<?= PASSWORD_MIN ?>" required>
                <?= fieldError($errors, 'password') ?>
            </p>

            <p>
                <label for="password_repeat">Repetir contraseña:</label>
                <input type="password" id="password_repeat" name="password_repeat"
                       minlength="<?= PASSWORD_MIN ?>" required>
                <?= fieldError($errors, 'password_repeat') ?>
            </p>

            <p>
                <label for="age">Edad:</label>
                <input type="number" id="age" name="age" value="<?= e($age) ?>"
                       min="<?= AGE_MIN ?>" max="<?= AGE_MAX ?>" required>
                <?= fieldError($errors, 'age') ?>
            </p>

            <p>
                <label for="sport">Deporte principal:</label>
                <select id="sport" name="sport" required>
                    <option value="">Selecciona un deporte</option>
                    <?php foreach ($sports as $key => $s): ?>
                        <option value="<?= e((string) $key) ?>"
                            <?= $sport === (string) $key ? 'selected' : '' ?>>
                            <?= e($s['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= fieldError($errors, 'sport') ?>
            </p>

            <fieldset>
                <legend>Nivel competitivo</legend>
                <?php foreach ($levels as $key => $label): ?>
                    <p>
                        <input type="radio" name="level"
                               id="level_<?= e((string) $key) ?>" value="<?= e((string) $key) ?>"
                               <?= $level === (string) $key ? 'checked' : '' ?>>
                        <label for="level_<?= e((string) $key) ?>"><?= e($label) ?></label>
                    </p>
                <?php endforeach; ?>
                <?= fieldError($errors, 'level') ?>
            </fieldset>

            <fieldset>
                <legend>Días de entrenamiento</legend>
                <?php foreach ($days as $code => $label): ?>
                    <p>
                        <input type="checkbox" name="days[]"
                               id="days_<?= e((string) $code) ?>" value="<?= e((string) $code) ?>"
                               <?= in_array((string) $code, $days, true) ? 'checked' : '' ?>>
                        <label for="days_<?= e((string) $code) ?>"><?= e($label) ?></label>
                    </p>
                <?php endforeach; ?>
                <?= fieldError($errors, 'days') ?>
            </fieldset>

            <p>
                <input type="checkbox" name="privacy" id="privacy" value="1"
                       <?= $privacy ? 'checked' : '' ?>>
                <label for="privacy">Acepto el tratamiento de mis datos</label>
                <?= fieldError($errors, 'privacy') ?>
            </p>

            <button type="submit">Registrarse</button>
        </form>
    <?php endif; ?>
</main>

<?php renderFooter('Footer'); ?>