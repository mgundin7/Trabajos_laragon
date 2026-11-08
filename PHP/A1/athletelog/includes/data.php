<?php 
declare(strict_types=1);

// Array asociativo con los deportes. La clave es un identificador interno (por ejemplo
// 'running') y dentro de cada deporte se guarda su nombre, su categoria (individual o
// equipo) y la unidad en la que se mide el entrenamiento.
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

// Niveles competitivos. La clave es lo que se guarda y el valor es lo que se muestra.
$levels = [
    'beginner' => 'Iniciación',
    'regional' => 'Regional',
    'national' => 'Nacional'
];

// Usuarios de prueba para el login. Las contraseñas no estan en texto plano, se guardan
// con password_hash, y en el login se comprobaran con password_verify.
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

// Dias de la semana para el formulario de registro. La clave es el codigo que se envia
// por POST y el valor es el texto que ve el usuario.
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