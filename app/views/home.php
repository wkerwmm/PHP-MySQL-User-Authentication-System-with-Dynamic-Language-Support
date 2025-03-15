<?php
require_once __DIR__ . '/../../system/config.php';
require_once __DIR__ . '/../../system/lang.php';

include __DIR__ . '/../../public/navbar.php';
include __DIR__ . '/../../public/footer.php';
?>

<div class="uk-container uk-margin-top">
    <h1><?= isset($lang["welcome"]) ? $lang["welcome"] : 'Welcome'; ?></h1>
    <p>Welcome to our site.</p>
</div>
