<?php
// Detectamos en qué página estamos para resaltarla en el menú
$pagina_actual = basename($_SERVER['PHP_SELF']);

// Array asociativo: archivo => texto del enlace
$paginas = [
    'index.php'      => '🏠 Inicio',
    'ejercicio1.php' => '1️⃣ Dado simple',
    'ejercicio2.php' => '2️⃣ Dado con mensajes',
    'ejercicio3.php' => '3️⃣ Dado doble',
    'ejercicio4_nuevo.php' => '4️⃣ Historial',
    'ejercicio5.php' => '5',
    'ejercicio6.php' => '6',
    'ejercicio7.php' => '7',
    'ejercicio8.php' => '8',
    'ejercicio9.php' => '9',
];

function esActiva($pagina, $actual) {
    return $pagina === $actual ? ' class="activo"' : '';
}
?>
<nav class="navbar">
    <span class="navbar-titulo">🎲 Prácticas PHP</span>
    <ul class="navbar-menu">
        <?php foreach ($paginas as $archivo => $texto): ?>
            <li><a href="<?php echo $archivo; ?>"<?php echo esActiva($archivo, $pagina_actual); ?>><?php echo $texto; ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>
