<?php
    declare(strict_types=1);

    // Este archivo junta todos los demas. Cada pagina solo tiene que hacer require_once de
    // bootstrap.php y ya puede usar las constantes, los arrays y las funciones de abajo.
    include 'config/config.php';
    include 'includes/header.php';
    include 'includes/helpers.php';
    include 'includes/components.php';
    include 'includes/navbar.php';
    include 'includes/footer.php';
    include 'includes/data.php';
?>