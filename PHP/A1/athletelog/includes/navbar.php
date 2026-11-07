<?php 
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';

function renderNavbar(string $navbar): void
{
$pagina_actual = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <span>Athlete Log</span>
    <ul>
        <?php foreach (APP_MENU as $archivo => $texto): ?>
            <li><a href="<?= $archivo ?>"<?php echo esActiva($archivo, $pagina_actual); ?>><?= $texto ?></a></li>
        <?php endforeach ?>
        </ul>
</nav>
<?php
}
?>