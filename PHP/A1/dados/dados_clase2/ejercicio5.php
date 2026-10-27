<?php 
$caras = [
1 => [
        'nombre'  => 'Uno',
        'imagen'  => 'img/dado_1.svg',
        'mensaje' => 'Has sacado la puntuación mínima.'
    ],
2 => [
        'nombre'  => 'Dos',
        'imagen'  => 'img/dado_2.svg',
        'mensaje' => 'Sigue intentándolo.'
    ],
3 => [
        'nombre'  => 'Tres',
        'imagen'  => 'img/dado_3.svg',
        'mensaje' => 'Vas por buen camino.'
    ],
4 => [
        'nombre'  => 'Cuatro',
        'imagen'  => 'img/dado_4.svg',
        'mensaje' => '¡Buena tirada!'
    ],
5 => [
        'nombre'  => 'Cinco',
        'imagen'  => 'img/dado_5.svg',
        'mensaje' => 'Casi consigues el máximo.'
    ],
6 => [
        'nombre'  => 'Seis',
        'imagen'  => 'img/dado_6.svg',
        'mensaje' => '¡Excelente! Puntuación máxima.'
    ]
];
    $tirada = rand(1,6);

    echo "Sacaste el número: " . $tirada . "<br>";
    echo "Nombre: " . $caras[$tirada]['nombre'] . "<br>";
    echo "<img src='" . $caras[$tirada]['imagen'] . "' alt='Cara " . $tirada . "'> . <br>";
    echo "Mensaje: " . $caras[$tirada]['mensaje'] . "<br>";
?>

<table border="1" cellpadding="8" style="border-collapse: collapse; text-align: left;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>Número (Clave)</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Mensaje</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($caras as $numero => $datos): ?>
            <tr>
                <td><strong><?php echo $numero; ?></strong></td>
                <td><?php echo $datos['nombre']; ?></td>
                <td><code><?php echo $datos['imagen']; ?></code></td>
                <td><?php echo $datos['mensaje']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
