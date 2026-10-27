
<?php
$marcador = ['Ana' => 0, 'Luis' => 0, 'Marta' => 0];

$historial = [
    'Ana' => [],
    'Luis' => [],
    'Marta' => []
];

for ($i = 0; $i < 5; $i++) {
    foreach ($marcador as $jugador => $puntuacion) {
        $tirada = rand(1, 6);
        $marcador[$jugador] += $tirada;
        $historial[$jugador][] = $tirada;
    }
}

arsort($marcador);

$ganador = array_key_first($marcador);
$puntuaciones = array_values($marcador);
$medallas = ['1º', '2º', '3º'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Marcador de jugadores</title>
</head>
<body>

    <h1>Historial de tiradas</h1>

    <?php foreach ($historial as $jugador => $tiradas) { ?>
        <p>
            <?php echo $jugador; ?>:
            <?php echo implode(", ", $tiradas); ?>
        </p>
    <?php } ?>

    <h2>Marcador final</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>Posición</th>
            <th>Jugador</th>
            <th>Puntuación</th>
        </tr>

        <?php
        $posicion = 0;
        foreach ($marcador as $jugador => $puntuacion) {
        ?>
            <tr>
                <td><?php echo $medallas[$posicion]; ?></td>
                <td><?php echo $jugador; ?></td>
                <td><?php echo $puntuacion; ?></td>
            </tr>
        <?php
            $posicion++;
        }
        ?>
    </table>

    <h2>Resultado</h2>

    <?php if ($puntuaciones[0] == $puntuaciones[1]) { ?>
        <p>Hay un empate entre los jugadores con mayor puntuación.</p>
    <?php } else { ?>
        <p>
            El ganador es <?php echo $ganador; ?>
            con <?php echo $puntuaciones[0]; ?> puntos.
        </p>
    <?php } ?>

</body>
</html>
