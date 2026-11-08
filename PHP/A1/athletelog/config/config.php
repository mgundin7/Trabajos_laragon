<?php 
    declare(strict_types=1);

    // Datos generales de la aplicacion. pageTitle es el titulo que sale en la pestaña del
    // navegador y APP_OWNER el nombre del autor, que se muestra en el footer.
    const pageTitle = "Athelte Log";
    const APP_OWNER = "Marcos Gundin Navarro";

    // Menu de navegacion. La clave es el archivo al que lleva el enlace y el valor es el
    // texto que se ve. La navbar recorre este array con un foreach para crear los enlaces,
    // asi si quiero añadir una pagina solo tengo que añadirla aqui.
    const APP_MENU = [
        'index.php' => 'Inicio',
        'register.php' => 'Registro',
        'login.php' => 'Login',
        'training.php' => 'Nuevo entrenamiento',
        'history.php' => 'Historial',
        'preferences.php' => 'Preferencias',
    ];
    
    // Limites que se usan en las validaciones del registro y tambien en los atributos
    // maxlength, min y max del formulario, de esta forma estan definidos en un solo sitio.
    const NOMBRE_MIN = 3;
    const NOMBRE_MAX = 50;
    const USUARIO_MIN = 4;
    const USUARIO_MAX = 15;
    const CONTRASENA_MIN = 8;
    const EDAD_MIN = 16;
    const EDAD_MAX = 60;
?>