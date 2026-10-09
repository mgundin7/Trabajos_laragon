<?php 

// Usa un bucle while y guarda cada resultado en el array $historial
$historial = [];
$cantidad_tiradas = rand(1, 20);

$i = 0;

while ($i <= $cantidad_tiradas) {
    $historial[$i] = rand(1, 6);
    $i++;
}


// Estadisticas
$suma = array_sum($historial);
$min = min($historial);
$max = max($historial);


// Array de frecuencias
// Posicion 0 = numero 1
// Posicion 1 = numero 2
// Posicion 2 = numero 3
// etc.
$frecuencias = [0, 0, 0, 0, 0, 0];

foreach ($historial as $tirada) {
    $frecuencias[$tirada - 1]++;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estilos.css">

    <title>Ejercicio 4</title>
</head>

<body>

    <?php require 'includes/navbar.php'; ?>

    <main class="contenedor">

        <h1>Historial de tiradas</h1>

        <table>

            <tr>
                <th>Tirada</th>
                <th>Valor</th>
            </tr>

            <?php 

            $contador = 1;

            foreach ($historial as $tirada) {

                echo "
                <tr>
                    <td>$contador</td>
                    <td>$tirada</td>
                </tr>";

                $contador++;
            }

            ?>

        </table>


        <h2>Estadisticas de tiradas</h2>

        <table>

            <tr>
                <th>SUMA</th>
                <th>MINIMO</th>
                <th>MAXIMO</th>
            </tr>

            <tr>
                <td><?php echo $suma ?></td>
                <td><?php echo $min ?></td>
                <td><?php echo $max ?></td>
            </tr>

        </table>


        <h2>Frecuencia de los dados</h2>

        <div class="grafico">

            <?php

            for ($i = 0; $i < 6; $i++) {

                $numero = $i + 1;
                $frecuencia = $frecuencias[$i];

                echo "
                <div class='barra-contenedor'>

                    <div class='barra' style='height: " . ($frecuencia * 30) . "px;'>
                        $frecuencia
                    </div>

                    <div class='numero-dado'>
                        $numero
                    </div>

                </div>
                ";
            }

            ?>

        </div>

    </main>

</body>

</html>