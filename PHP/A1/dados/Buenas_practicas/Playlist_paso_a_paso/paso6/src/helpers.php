<?php 
    declare(strict_types=1);

    /** Escapa texto para imprimirlo seguro en HTML (evita XSS). */
    function e(string|int|float $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
?>