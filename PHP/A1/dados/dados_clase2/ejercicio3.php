<?php

$resultados = [];
$suma_total = 0;

$numero_dados = 2;

if (isset($_GET['numero_dados'])) {
    $numero_dados = (int) $_GET['numero_dados'];
}

if ($numero_dados < 1) {
    $numero_dados = 1;
}

if ($numero_dados > 20) {
    $numero_dados = 20;
}

for ($i = 0; $i < $numero_dados; $i++) {
    $numero_dado = rand(1, 6);
    $resultados[] = $numero_dado;
    $suma_total += $numero_dado;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Dado doble</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <?php require 'includes/navbar.php'; ?>

    <main class="contenedor">

        <h1>Ejercicio 3: Dado doble</h1>

        <p class="concepto">
            Concepto practicado: <strong>bucles</strong>
        </p>

        <!-- FORMULARIO -->
        <form method="GET">

            <label for="numero_dados">
                ¿Cuántos dados quieres tirar?
            </label>

            <input 
                type="number" 
                name="numero_dados" 
                id="numero_dados"
                min="1"
                max="20"
                value="<?php echo $numero_dados; ?>"
            >

            <button type="submit">
                Tirar dados
            </button>

        </form>

        <p>Resultados:</p>

        <div class="dados-multiples">

            <?php
            foreach ($resultados as $numero_dado) {
                $ruta_imagen = "img/dado_" . $numero_dado . ".svg";
            ?>

                <div class="dado-item">

                    <p>
                        Dado: <strong><?php echo $numero_dado; ?></strong>
                    </p>

                    <img 
                        src="<?php echo $ruta_imagen; ?>" 
                        alt="Dado mostrando el numero <?php echo $numero_dado; ?>" 
                        class="imagen-dado"
                    >

                </div>

            <?php
            }
            ?>

        </div>

        <p class="suma">
            Suma total: <strong><?php echo $suma_total; ?></strong>
        </p>

        <?php

        // Suma máxima y mínima dependiendo del número de dados
        $suma_maxima = $numero_dados * 6;
        $suma_minima = $numero_dados * 1;

        if ($suma_total == $suma_maxima) {

            echo '<div class="mensaje mensaje-maximo">
                    Has sacado la suma maxima posible.
                  </div>';

        } elseif ($suma_total == $suma_minima) {

            echo '<div class="mensaje mensaje-minimo">
                    Has sacado la suma minima posible.
                  </div>';
        }

        ?>

    </main>

</body>

</html>