<?php

$zara = [
    123 => [
      'nombre' => 'Camisa a cuadros',
      'precio' => 29.95,
      'sexo' => 'Hombre'
    ],
    234 => [
      'nombre' => 'Falda manga',
      'precio' => 19.95,
      'sexo' => 'Mujer'
    ],
    345 => [
      'nombre' => 'Bolso minúsculo',
      'precio' => 50,
      'sexo' => 'Mujer'
    ]
];

echo "<pre>";
echo $zara[345]['precio'] . '€ <br>';
echo count($zara) . '<br>';
print_r($zara);
echo "</pre>";


$frase = 'En un lugar de la mancha';
$arrayDeFrase = preg_split('/[\s,]+/', $frase);
echo $arrayDeFrase[2];
// "lugar"
var_dump($arrayDeFrase);
echo "<br>";


$palabra = 'abcdef';
$palabra[2] = 'z';
echo $palabra . "<br>";
echo "<br>";


$planetas = ['Marte', 'Tierra', 'Venus'];
$masPlanetas = ['Mercurio', 'Saturno'];
$planeta = 'Jupiter';

$nuevosPlanetas = [...$planetas, $planeta, ...$masPlanetas];

//Vemos el resultado
echo "Número total de planetas: " . count($nuevosPlanetas);
echo "<h4>Funcion var_dump con pre</h4>";
echo "<pre>";
var_dump($nuevosPlanetas);
echo "</pre>";

unset($nuevosPlanetas[1]);
echo "Número total de planetas: " . count($nuevosPlanetas);
echo "<h4>Funcion var_dump con pre</h4>";
echo "<pre>";
var_dump($nuevosPlanetas);
echo "</pre>";

$planetas = ['Marte', 'Tierra', 'Venus'];
$masPlanetas = ['Mercurio', 'Saturno'];


$nuevosPlanetas = array_merge($planetas, $masPlanetas);

echo "<h4>Funcion var_dump con pre</h4>";
echo "<pre>";
var_dump($nuevosPlanetas);
echo "</pre>";

$meses = [];
$semana = [
'Lunes',
'Martes',
'Miercoles',
'Jueves',
'Viernes',
'Sabado',
'Domingo'];

print_r($semana);

echo "<h4>var_dump($semana) con pre</h4>";
echo "<pre>";
var_dump($semana);
echo "</pre>";

echo "$semana[0] <br> ";
echo "$semana[3] <br> ";
echo "$semana[6] <br> ";

?>