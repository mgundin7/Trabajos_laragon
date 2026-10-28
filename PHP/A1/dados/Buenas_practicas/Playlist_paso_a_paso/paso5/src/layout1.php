<?php

declare(strict_types=1);

//**Abre el documento: cabecera y menú, iguales para todas las paginas. */
function renderHeader(string $title): string
{
    $title = e($title);
    return <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{$title} | Mi playlist</title>
        <link rel="stylesheet" href="./assets/css/styles.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="sobre.php">Sobre mí</a></li>
                    <li><a href="contacto.php">Contacta</a></li>
                </ul>
            </nav>
        </header>
        <main>
    HTML;
}
//**Cierra el documento con el pie */
function renderFooter(): string
{
    $year = date('Y');

    return <<<HTML
    </main>
    <footer>
        <p>&copy; {$year} Mi Web</p>
    </footer>
</body>
</html>
HTML;
}
