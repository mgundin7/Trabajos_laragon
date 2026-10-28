<?php 
declare(strict_types=1);

require_once __DIR__ . '/src/bootstrap.php';

$songs = require __DIR__.'/data/songs.php';

renderHeader('Inicio');
?>

<h1>Mi playlist</h1>

<?php 
    echo renderSongList($songs) 
?>

<?php
    renderFooter();
?>