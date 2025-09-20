<h2><?= isset($lang["dashboard"]) ? $lang["dashboard"] : 'Dashboard'; ?></h2>
<p>Hoş geldiniz, <?= isset($_SESSION['user']) ? $_SESSION['user'] : 'Misafir'; ?>.</p>
<a href="/logout" class="uk-button uk-button-danger"><?= isset($lang["logout"]) ? $lang["logout"] : 'Logout'; ?></a>
