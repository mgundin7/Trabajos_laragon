<?php 
    declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

// Esta funcion pinta el pie de la pagina con el año actual (sacado con date('Y')) y el
// nombre del autor, y cierra las etiquetas body y html que abrio renderHeader().
// Se llama siempre al final de cada pagina.
function renderFooter(string $Footer): void
{
?>
<footer>
<p><?= e(date('Y')); ?> - <?= e(APP_OWNER) ?></p>
</footer>
</body>
</html>
<?php
}
?>