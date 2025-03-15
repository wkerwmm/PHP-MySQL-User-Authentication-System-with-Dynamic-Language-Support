<?php
require_once __DIR__ . '/../../system/config.php'; // config.php dosyasını dahil et
require_once __DIR__ . '/../../system/lang.php';   // lang.php dosyasını dahil et
?>

<div class="uk-container uk-margin-top">
    <!-- Dil anahtarının mevcut olup olmadığını kontrol et ve varsayılan değer kullan -->
    <h2><?= isset($lang["login"]) ? $lang["login"] : 'Login'; ?></h2>

    <form id="loginForm">
        <!-- Dil anahtarını kontrol et, eğer eksikse varsayılan metni kullan -->
        <input class="uk-input" type="text" id="username" placeholder="<?= isset($lang["username"]) ? $lang["username"] : 'Username'; ?>">
        <input class="uk-input" type="password" id="password" placeholder="<?= isset($lang["password"]) ? $lang["password"] : 'Password'; ?>">
        <button class="uk-button uk-button-primary" type="submit"><?= isset($lang["login"]) ? $lang["login"] : 'Login'; ?></button>
    </form>
</div>

<script>
    // Login formunun submit olayını yakalayalım
    $("#loginForm").submit(function(e) {
        e.preventDefault();  // Sayfanın yenilenmesini engelle
        $.post("../app/controllers/AuthController.php?action=login",
            { username: $("#username").val(), password: $("#password").val() },
            function(response) {
                if (response.trim() === "success") {
                    window.location.href = "/dashboard";  // Giriş başarılı ise dashboard'a yönlendir
                } else {
                    alert(response);  // Hata mesajını göster
                }
            });
    });
</script>
