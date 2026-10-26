<?php
    declare(strict_types=1);

    //** RECIBE las canciones y DEVUELVE el HTML (no hace echo). */
    function renderSonglist(array $songs): string
    {
        $html = '<ul>';
        foreach ($songs as $song) {
            $html .='<li>' . e($song['title']). ' - ' .e($song['artist']) . ' (' . e($song['minutes']) . ' min)</li>';
        }
        return $html . '</ul>';
    }
?>