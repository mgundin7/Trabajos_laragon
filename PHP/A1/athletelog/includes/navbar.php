<?php 
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';

// Esta funcion pinta el menu de navegacion. Recorre el array APP_MENU de la configuracion
// y crea un enlace por cada pagina. Con basename($_SERVER['PHP_SELF']) se saca el nombre
// del archivo actual y se compara con cada enlace usando esActiva(), de forma que la
// pagina en la que estamos sale marcada con la clase "activo".
function renderNavbar(string $navbar): void
{
$pagina_actual = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <span>Athlete Log</span>
    <ul>
        <?php foreach (APP_MENU as $archivo => $texto): ?>
            <li><a href="<?= e($archivo) ?>"<?php echo esActiva($archivo, $pagina_actual); ?>><?= e($texto) ?></a></li>
        <?php endforeach ?>
        </ul>
</nav>
<?php
}
?>