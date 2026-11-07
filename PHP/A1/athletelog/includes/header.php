<?php 
declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

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
