<?php 
    declare(strict_types=1);

    /** Escapa texto para imprimirlo seguro en HTML (evita XSS). */
    function e(string|int|float|null $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
    // Sirve para saber si un enlace del menu es el de la pagina actual. Compara el archivo del
    // enlace con el archivo en el que estamos y, si coinciden, devuelve el atributo
    // class="activo" para que el CSS lo pinte distinto. Si no coinciden devuelve un texto vacio.
    function esActiva($pagina, $actual) {
    return $pagina === $actual ? ' class="activo"' : '';
    }
    // Recibe el array de deportes y una categoria y devuelve un array nuevo solo con los
    // deportes de esa categoria. Recorre todos con un foreach y va guardando en $result los
    // que coinciden. Se usa en el index para separar individuales y de equipo.
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
    // Devuelve un span con el mensaje de error de un campo concreto, ya escapado con e().
    // Si ese campo no tiene error en el array $errors devuelve un texto vacio, asi se puede
    // llamar siempre debajo de cada input sin comprobar nada antes.
    function fieldError(array $errors, string $field): string
{
    return isset($errors[$field])
        ? '<span class="field-error" role="alert">' . e($errors[$field]) . '</span>'
        : '';
}
?>