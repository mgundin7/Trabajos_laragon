<?php 
declare(strict_types=1);

$sports = [
    'running' => [
        'name' => 'Running',
        'category' => 'individual',
        'unit' => 'km'
    ],

    'swimming' => [
        'name' => 'Natación',
        'category' => 'individual',
        'unit' => 'metros'
    ],

    'cycling' => [
        'name' => 'Ciclismo',
        'category' => 'individual',
        'unit' => 'km'
    ],

    'football' => [
        'name' => 'Fútbol',
        'category' => 'equipo',
        'unit' => 'minutos'
    ],

    'basketball' => [
        'name' => 'Baloncesto',
        'category' => 'equipo',
        'unit' => 'minutos'
    ],

    'karate' => [
        'name' => 'Karate',
        'category' => 'individual',
        'unit' => 'kg'
    ]
];

$levels = [
    'beginner' => 'Iniciación',
    'regional' => 'Regional',
    'national' => 'Nacional'
];

$users = [
    '@MarcosGundin' => [
        'name' => 'Marcos',
        'password_hash' => password_hash('123456789', PASSWORD_DEFAULT),
        'sport' => 'karate'
    ],

    '@DanielFiguereo' => [
        'name' => 'Daniel',
        'password_hash' => password_hash('987654321', PASSWORD_DEFAULT),
        'sport' => 'football'
    ],

    '@AlexVazquez' => [
        'name' => 'Alex',
        'password_hash' => password_hash('567891234', PASSWORD_DEFAULT),
        'sport' => 'swimming'
    ],
];
$days = [
    'lunes' => 'Lunes',
    'martes' => 'Martes',
    'miercoles' => 'Miércoles',
    'jueves' => 'Jueves',
    'viernes' => 'Viernes',
    'sabado' => 'Sábado',
    'domingo' => 'Domingo'
];
?>