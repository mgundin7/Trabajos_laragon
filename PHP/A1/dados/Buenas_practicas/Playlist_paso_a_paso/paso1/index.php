<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi playlist</title>
</head>

<body>
    <header>
        <nav><a href="index.php">Inicio</a> | <a href="sobre.php">Sobre mí</a></nav>
    </header>
    <main>
        <h1>Mi playlist</h1>
        <?php
        $songs = ['Chula', 'Celosa', '13/18'];
        foreach ($songs as $song) {
            echo "<p>$song</p>";
        }
        ?>
    </main>
    <footer>© 2026 Mi web</footer>
</body>

</html>