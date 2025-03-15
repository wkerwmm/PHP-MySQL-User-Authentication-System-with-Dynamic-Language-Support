<?php
require_once __DIR__ . '/../../system/config.php';
require_once __DIR__ . '/../../system/lang.php';
?>

<div class="uk-container uk-margin-top">
    <h2><?= isset($lang["register"]) ? $lang["register"] : 'Register'; ?></h2>
    <form id="registerForm">
        <input class="uk-input" type="text" id="username" placeholder="<?= isset($lang["username"]) ? $lang["username"] : 'Username'; ?>">
        <input class="uk-input" type="password" id="password" placeholder="<?= isset($lang["password"]) ? $lang["password"] : 'Password'; ?>">
        <button class="uk-button uk-button-primary" type="submit"><?= isset($lang["register"]) ? $lang["register"] : 'Register'; ?></button>
    </form>
</div>

<script>
    $("#registerForm").submit(function(e) {
        e.preventDefault();
        $.post("../app/controllers/AuthController.php?action=register",
            { username: $("#username").val(), password: $("#password").val() },
            function(response) {
                if (response.trim() === "success") {
                    window.location.href = "/login";
                } else {
                    alert(response);
                }
            });
    });
</script>
