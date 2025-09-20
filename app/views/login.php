<?php $csrf = Csrf::token(); ?>
<h2><?= isset($lang["login"]) ? $lang["login"] : 'Login'; ?></h2>
<form id="loginForm">
    <input class="uk-input uk-margin-small" type="text" id="username" placeholder="<?= isset($lang["username"]) ? $lang["username"] : 'Username'; ?>">
    <input class="uk-input uk-margin-small" type="password" id="password" placeholder="<?= isset($lang["password"]) ? $lang["password"] : 'Password'; ?>">
    <input type="hidden" id="csrf" value="<?= htmlspecialchars($csrf) ?>">
    <button class="uk-button uk-button-primary" type="submit"><?= isset($lang["login"]) ? $lang["login"] : 'Login'; ?></button>
    <div id="error" class="uk-margin-small uk-text-danger"></div>
 </form>
<script>
$("#loginForm").submit(function(e) {
  e.preventDefault();
  $.post("/auth/login",
    { username: $("#username").val(), password: $("#password").val(), csrf: $("#csrf").val() },
    function(response) {
      if (response.trim() === "success") {
        window.location.href = "/dashboard";
      } else {
        $("#error").text(response);
      }
    }
  );
});
</script>
