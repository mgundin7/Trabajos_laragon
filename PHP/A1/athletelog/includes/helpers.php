<?php 
    declare(strict_types=1);

    /** Escapa texto para imprimirlo seguro en HTML (evita XSS). */
    function e(string|int|float|null $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
    function esActiva($pagina, $actual) {
    return $pagina === $actual ? ' class="activo"' : '';
    }
    function getSportsByCategory(array $sports, string $category): array
    {
        $result = [];

        foreach ($sports as $sport) {
            if ($sport['category'] == $category) {
                $result[] = $sport;
            }
        }

        return $result;
    }
?>