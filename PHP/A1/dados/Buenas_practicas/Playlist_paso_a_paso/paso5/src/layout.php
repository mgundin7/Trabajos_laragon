<?php 

declare(strict_types=1);

//**Abre el documento: cabecera y menú, iguales para todas las paginas. */
function renderHeader(string $title): void
{
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e(APP_NAME) ?></title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
            <?php foreach (APP_MENU as $file => $label): ?>
                <li><a href="<?= e($file) ?>"><?= e($label) ?></a></li>
            <?php endforeach; ?>
            </ul>
        </nav>
    </header>
    <main>
<?php
}
//**Cierra el documento con el pie */
function renderFooter(): void
{
    ?>
    </main>
    <footer>© 2026 Mi web - Autor: <?= e(APP_OWNER) ?></footer>
</body>
</html>
<?php
}
?>