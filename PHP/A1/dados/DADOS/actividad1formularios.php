<?php
$formularioEnviado = isset($_POST['calcular']);
if ($formularioEnviado) {
    $precioTotal = 0;
    $numeroemails = 0;
    if (is_numeric($_POST['numeroemails'])) {
        $numeroemails = $_POST['numeroemails'];
        $seguro = $_POST['seguro'] ?? 0;
    } else {
        echo "Valor no numerico";
    }
    if ($numeroemails > 0 && $numeroemails <= 2000) {
        $precioTotal = 0;

    } elseif ($numeroemails >= 2001 && $numeroemails <= 10000) {
        $precioTotal = $numeroemails * 0.7;

    } elseif ($numeroemails >= 10001) {
        $precioTotal = $numeroemails * 0.2;
    }

    if ($seguro == 1) {
        $precioTotal = $precioTotal + (0.1 * $numeroemails);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
    <style>
        body {
            font-size: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Actividad 1 - Sistema de calculo de precio del servicio newsletter</h1>

    <table>
        <tr>
            <th>De</th>
            <th>A</th>
            <th>Precio</th>
        </tr>
        <tr>
            <td>0</td>
            <td>2000</td>
            <td>0€</td>
        </tr>
        <tr>
            <td>2001</td>
            <td>10000</td>
            <td>0.7€ unidad</td>
        </tr>
        <tr>
            <td>10001</td>
            <td>infinito</td>
            <td>0.2€ unidad</td>
        </tr>

    </table>
    <br>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="numeroemails">Numero de emails que enviaras:</label>
        <input type="number" name="numeroemails" min="1" max="1000000"><br>
        <input type="checkbox" name="seguro" value="1">
        <label for="seguro">Quiero el seguro por 0.1€</label><br>
        <input type="submit" name="calcular" value="calcular">
    </form>
    <?php if ($formularioEnviado): ?>
    <h3>Total de precio: <?= $precioTotal?></h3>
    <?php endif ?>
</body>

</html>