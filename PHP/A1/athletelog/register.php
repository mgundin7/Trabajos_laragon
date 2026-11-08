<?php
    declare(strict_types = 1);

    require_once __DIR__ . '/includes/bootstrap.php';

    // Se inicia la sesion solo si no estaba iniciada ya, porque el token csrf se guarda en $_SESSION.
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    // Token CSRF: se crea una sola vez por sesion y se mete en un campo oculto del formulario.
    // Cuando se envia se comprueba que coincida, asi nos aseguramos de que el POST viene de
    // nuestro formulario y no de otra web.
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }

    // Variables que se usan en el formulario. Empiezan vacias para que la primera vez que
    // se entra a la pagina el formulario salga en blanco. $errores guarda todos los mensajes
    // de error y $exito pasa a true solo si todo esta bien.
    $nombre = '';
    $usuario = '';
    $email = '';
    $edad = '';
    $deporte = '';
    $nivel = '';
    $diasMarcados = [];
    $privacidad = false;
    $errores = [];
    $exito = false;

    // Todo el procesado solo se hace si se ha enviado el formulario (peticion POST). Si solo
    // se entra a la pagina (GET) se pinta el formulario vacio.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['csrf'] ?? '';
        if (!is_string($token) || !hash_equals($_SESSION['csrf'], $token)) {
            http_response_code(403);
            exit('Solicitud no valida.');
        }

        // Se recoge cada campo de $_POST. Con is_string se comprueba que lo recibido sea texto
        // y no un array manipulado, y con trim se quitan los espacios de los lados. A las
        // contraseñas no se les hace trim porque los espacios podrian formar parte de ellas.
        $nombreRaw = $_POST['nombre'] ?? '';
        $nombre = is_string($nombreRaw) ? trim($nombreRaw) : '';

        $usuarioRaw = $_POST['usuario'] ?? '';
        $usuario = is_string($usuarioRaw) ? trim($usuarioRaw) : '';

        $emailRaw = $_POST['email'] ?? '';
        $email = is_string($emailRaw) ? trim($emailRaw) : '';

        $passRaw = $_POST['password'] ?? '';
        $password = is_string($passRaw) ? $passRaw : '';

        $pass2Raw = $_POST['password2'] ?? '';
        $password2 = is_string($pass2Raw) ? $pass2Raw : '';

        $edadRaw = $_POST['edad'] ?? '';
        $edad = is_string($edadRaw) ? trim($edadRaw) : '';

        $deporteRaw = $_POST['deporte'] ?? '';
        $deporte = is_string($deporteRaw) ? $deporteRaw : '';

        $nivelRaw = $_POST['nivel'] ?? '';
        $nivel = is_string($nivelRaw) ? $nivelRaw : '';

        // De los dias marcados solo se dejan los que existen en el array $days, asi nadie
        // puede enviar dias inventados. array_values reordena los indices del resultado.
        $diasRaw = $_POST['dias'] ?? [];
        $diasMarcados = is_array($diasRaw)

        ? array_values(array_intersect(array_keys($days), array_filter($diasRaw, 'is_string')))
        : [];

        $privacidad = isset($_POST['privacidad']);

        // Validaciones. Cada fallo se añade al array $errores para poder mostrar todos los
        // errores a la vez en la lista de arriba.
        if ($nombre === '') {
            $errores[] = 'El nombre es obligatorio.';
        } elseif (mb_strlen($nombre) < NOMBRE_MIN || mb_strlen($nombre) > NOMBRE_MAX) {
            $errores[] = 'El nombre debe tener entre ' . NOMBRE_MIN . ' y ' . NOMBRE_MAX . ' caracteres.';
        }

        if ($usuario === '') {
            $errores[] = 'El usuario es obligatorio.';
        } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $usuario)) {
            $errores[] = 'El usuario solo puede contener letras, números y _.';
        } elseif (mb_strlen($usuario) < USUARIO_MIN || mb_strlen($usuario) > USUARIO_MAX) {
            $errores[] = 'El usuario debe tener entre ' . USUARIO_MIN . ' y ' . USUARIO_MAX . ' caracteres.';
        }

        if ($email === '') {
            $errores[] = 'El email es obligatorio.';
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errores[] = 'El email no tiene un formato válido.';
        }

        if ($password === '') {
            $errores[] = 'La contraseña es obligatoria.';
        } elseif (mb_strlen($password) < CONTRASENA_MIN) {
            $errores[] = 'La contraseña debe tener al menos ' . CONTRASENA_MIN . ' caracteres.';
        } elseif ($password !== $password2) {
            $errores[] = 'Las contraseñas no coinciden.';
        }

        // filter_var con FILTER_VALIDATE_INT comprueba que la edad sea un numero entero dentro
        // del rango permitido. Si no lo es devuelve false.
        $edadNumero = filter_var($edad, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => EDAD_MIN, 'max_range' => EDAD_MAX],
        ]);
        if ($edadNumero === false) {
            $errores[] = 'La edad debe ser un número entre ' . EDAD_MIN . ' y ' . EDAD_MAX . '.';
        }

        // El deporte y el nivel tienen que existir como clave en sus arrays, si no, alguien
        // podria haber cambiado el valor del select o del radio desde el navegador.
        if (!array_key_exists($deporte, $sports)) {
            $errores[] = 'Debes seleccionar un deporte válido.';
        }
        if (!array_key_exists($nivel, $levels)) {
            $errores[] = 'Debes seleccionar un nivel competitivo.';
        }

        if ($diasMarcados === []) {
            $errores[] = 'Debes marcar al menos un día de entrenamiento.';
        }

        if (!$privacidad) {
            $errores[] = 'Debes aceptar el tratamiento de tus datos.';
        }

        // Si no hay ningun error el registro es correcto. La contraseña nunca se guarda en
        // texto plano: password_hash crea un hash con sal que mas adelante se comprobara en el
        // login con password_verify. Por ahora no se guarda en ningun sitio.
        if ($errores === []) {
            $contrasenaHash = password_hash($password, PASSWORD_DEFAULT);
            $exito = true;
        }
    }

    // Se pintan la cabecera y el menu con las funciones de la carpeta includes.
    renderHeader('Registro');
    renderNavbar('Navbar');
?>

<main>
    <?php if ($exito): ?>
        <div class="exito">
            <h1>¡Registro correcto!</h1>
            <p>Estos son los datos recibidos:</p>
        </div>
        <ul>
            <li>Nombre completo: <strong><?= e($nombre) ?></strong></li>
            <li>Usuario: <strong><?= e($usuario) ?></strong></li>
            <li>Email: <strong><?= e($email) ?></strong></li>
            <li>Edad: <strong><?= e($edad) ?></strong></li>
            <li>Deporte principal: <strong><?= e($sports[$deporte]['name']) ?></strong></li>
            <li>Nivel competitivo: <strong><?= e($levels[$nivel]) ?></strong></li>
            <li>Días de entrenamiento:
                <ul>
                    <?php foreach ($diasMarcados as $codigo): ?>
                        <li><?= e($days[$codigo]) ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    <?php else: ?>
        <h1>Alta de deportista</h1>

        <?php if ($errores !== []): ?>
            <ul class="errores">
                <?php foreach ($errores as $error): ?>
                    <li><?= e($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="<?= e($_SERVER['SCRIPT_NAME']) ?>" method="post" novalidate>
            <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">

            <p>
                <label for="nombre">Nombre completo: </label>
                <input type="text" name="nombre" id="nombre"
                        value="<?= e($nombre) ?>"
                        maxlength="<?= NOMBRE_MAX ?>" required>
            </p>

            <p>
                <label for="usuario">Usuario: </label>
                <input type="text" name="usuario" id="usuario"
                        value="<?= e($usuario) ?>"
                        maxlength="<?= USUARIO_MAX ?>" required>
            </p>

            <p>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email"
                        value="<?= e($email) ?>" required>
            </p>

            <p>
                <label for="password">Contraseña: </label>
                <input type="password" name="password" id="password" required>
            </p>

            <p>
                <label for="password2">Repetir contraseña: </label>
                <input type="password" name="password2" id="password2" required>
            </p>

            <p>
                <label for="edad">Edad: </label>
                <input type="number" name="edad" id="edad"
                        value="<?= e($edad) ?>"
                        min="<?= EDAD_MIN ?>" max="<?= EDAD_MAX ?>" required>
            </p>

            <p>
                <label for="deporte">Deporte principal: </label>
                <select name="deporte" id="deporte" required>
                    <option value="">Selecciona un deporte</option>
                    <?php foreach ($sports as $clave => $datos): ?>
                        <option value="<?= e($clave) ?>" <?= $deporte === $clave ? 'selected' : '' ?>>
                            <?= e($datos['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>

            <fieldset>
                <legend>Nivel competitivo</legend>
                <?php foreach ($levels as $clave => $etiqueta): ?>
                    <p>
                        <input type="radio" name="nivel"
                            id="nivel_<?= e($clave) ?>" value="<?= e($clave) ?>"
                            <?= $nivel === $clave ? 'checked' : '' ?>>
                        <label for="nivel_<?= e($clave) ?>"><?= e($etiqueta) ?></label>
                    </p>
                <?php endforeach; ?>
            </fieldset>

            <fieldset>
                <legend>Días de entrenamiento</legend>
                <?php foreach ($days as $codigo => $etiqueta): ?>
                    <p>
                        <input type="checkbox" name="dias[]"
                            id="dias_<?= e($codigo) ?>" value="<?= e($codigo) ?>"
                            <?= in_array($codigo, $diasMarcados, true) ? 'checked' : '' ?>>
                        <label for="dias_<?= e($codigo) ?>"><?= e($etiqueta) ?></label>
                    </p>
                <?php endforeach; ?>
            </fieldset>

            <p>
                <input type="checkbox" name="privacidad" id="privacidad" value="1"
                    <?= $privacidad ? 'checked' : '' ?>>
                <label for="privacidad">Acepto el tratamiento de mis datos</label>
            </p>

            <button type="submit">Registrarse</button>
        </form>
    <?php endif; ?>
</main>

<?php renderFooter('Footer'); ?>