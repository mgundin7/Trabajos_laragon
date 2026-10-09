    <?php 
        $opcionesmenu=[
            'Inicio' => 'index.php',
            'Ejercicio1' => 'ejercicio1.php',
            'Ejercicio2' => 'ejercicio2.php',
            'Ejercicio3' => 'ejercicio3.php'
        ];
        $nombresmenu=[
            'index.php' => 'inicio',
            'ejercicio1.php' => 'Ejercicio 1 Dado simple',
            'ejercicio2.php' => 'Ejercicio 2 Dado con mensajes',
            'ejercicio3.php' => 'Ejercicio 3 Dado doble'
        ];
    ?>
    <nav class="navbar"
        <span class="navbar_titulo"> Practicas PHP · Dado Virtual </span>
        <ul class="navbar-menu">
            <li><a href="<?php echo $opcionesmenu['Inicio']; ?>"><?php echo $nombresmenu['index.php']; ?></a></li>
            <li><a href="<?php echo $opcionesmenu['Ejercicio1']; ?>"><?php echo $nombresmenu['ejercicio1.php']; ?></a></li>
            <li><a href="<?php echo $opcionesmenu['Ejercicio2']; ?>"><?php echo $nombresmenu['ejercicio2.php']; ?></a></li>
            <li><a href="<?php echo $opcionesmenu['Ejercicio3']; ?>"><?php echo $nombresmenu['ejercicio3.php']; ?></a></li>
        </ul>
    </nav>