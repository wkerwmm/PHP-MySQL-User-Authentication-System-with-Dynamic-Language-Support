<?php
require_once __DIR__ . '/../system/config.php';  // config.php dosyasını dahil et
require_once __DIR__ . '/../system/lang.php';    // lang.php dosyasını dahil et
?>

<div class="uk-container uk-margin-top">
    <!-- Dil anahtarının mevcut olup olmadığını kontrol et ve varsayılan değer kullan -->
    <h2><?= isset($lang["dashboard"]) ? $lang["dashboard"] : 'Dashboard'; ?></h2>

    <!-- Kullanıcı adını sessiyondan al -->
    <p>Hoş geldiniz, <?= isset($_SESSION['user']) ? $_SESSION['user'] : 'Misafir'; ?>.</p>

    <!-- Logout bağlantısı -->
    <a href="/logout" class="uk-button uk-button-danger"><?= isset($lang["logout"]) ? $lang["logout"] : 'Logout'; ?></a>
</div>
