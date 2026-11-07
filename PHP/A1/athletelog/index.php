<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

renderHeader('Inicio');

renderNavbar('Navbar');

$individuales = getSportsByCategory($sports, 'individual');
$equipos = getSportsByCategory($sports, 'equipo');
?>

<main>
    <h1>Bienvenido a <?= pageTitle ?></h1>

    <p>Esta pagina esta destinada a incrementar tu rendimiento deportivo mediante un seguimiento de entrenamientos.</p>

    <h2>Deportes individuales</h2>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Unidad</th>
        </tr>

        <?php foreach ($individuales as $sport): ?>
            <tr>
                <td><?= e($sport['name']) ?></td>
                <td><?= e($sport['category']) ?></td>
                <td><?= e($sport['unit']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Deportes de equipo</h2>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Unidad</th>
        </tr>

        <?php foreach ($equipos as $sport): ?>
            <tr>
                <td><?= e($sport['name']) ?></td>
                <td><?= e($sport['category']) ?></td>
                <td><?= e($sport['unit']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php
renderFooter('Footer');
?>
