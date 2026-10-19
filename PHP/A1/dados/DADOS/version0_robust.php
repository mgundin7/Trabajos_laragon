<?php 
    declare(strict_types = 1);

    session_start();
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Configuracion y helpers
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------

    const MODULOS = [
        'DWES' => 'Desarrollo web entorno servidor',
        'DWEC' => 'Desarrollo web entrono cliente',
    ];
    const NOMBRE_MAX = 60;

    function e(string|int|float|null $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Token CSRF (se genera una vez por sesión)
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------

    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Logica: procesar solo su la peticion es POST
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------

    $nombre = '';
    $modulos = [];
    $errores = [];
    $exito = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['csrf'] ?? '';
        if(!is_string($token) || hash_equals($_SESSION['csrf'], $token)) {
            http_response_code(403);
            exit('Solicitud no valida. ');
        }
        
        $nombreRaw = $_POST['nombre'] ?? '';
        $nombre = is_string($nombreRaw) ? trim($nombreRaw) : '';

        $modulosRaw = $_POST['modulos'] ?? [];
        $modulos = is_array($modulosRaw)

        ? array_values(array_intersect(array_keys(MODULOS), array_filter($modulosRaw, 'is_string')))
        : [];        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricula de modulos</title>
</head>
<body>
    <main>
        <?php if ($exito): ?>
            <h1>Datos recibidos</h1>
            <p>Alumno: <strong><?= e($nombre) ?></strong></p>
            <ul>
                <?php foreach ($modulos as $codigo): ?>
                    <li><?= e(MODULOS[$codigo]) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
        <?php endif; ?>
    </main>
</body>
</html>