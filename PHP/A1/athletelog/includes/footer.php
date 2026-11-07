<?php 
    declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

function renderFooter(string $Footer): void
{
?>
<footer>
<p><?= date('Y'); ?> - <?= APP_OWNER ?></p>
</footer>
</body>
</html>
<?php
}
?>