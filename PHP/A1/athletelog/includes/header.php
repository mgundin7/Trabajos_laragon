<?php 
declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

// Esta funcion pinta la parte de arriba de la pagina: el doctype, la etiqueta head con el
// charset, el viewport y el enlace al archivo de estilos, y abre el body. Asi no hay que
// repetir todo este HTML en cada pagina, solo se llama a renderHeader() al principio.
// El body se cierra en renderFooter().
function renderHeader(string $title): void
{
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title><?= e(pageTitle) ?></title>
</head>
<body>
<?php
}
?>
