<?php
require_once __DIR__ . '/../../system/config.php';
require_once __DIR__ . '/../../system/lang.php';
?>

<div class="uk-container uk-margin-top">
    <h2><?= isset($lang["login"]) ? $lang["login"] : 'Login'; ?></h2>

    <form id="loginForm">
        <input class="uk-input" type="text" id="username" placeholder="<?= isset($lang["username"]) ? $lang["username"] : 'Username'; ?>">
        <input class="uk-input" type="password" id="password" placeholder="<?= isset($lang["password"]) ? $lang["password"] : 'Password'; ?>">
        <button class="uk-button uk-button-primary" type="submit"><?= isset($lang["login"]) ? $lang["login"] : 'Login'; ?></button>
    </form>
</div>

<script>
    $("#loginForm").submit(function(e) {
        e.preventDefault();
        $.post("../app/controllers/AuthController.php?action=login",
            { username: $("#username").val(), password: $("#password").val() },
            function(response) {
                if (response.trim() === "success") {
                    window.location.href = "/dashboard";
                } else {
                    alert(response);
                }
            });
    });
</script>
