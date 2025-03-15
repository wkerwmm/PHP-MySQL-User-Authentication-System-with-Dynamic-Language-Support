<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li><a href="/"><?= isset($lang["home"]) ? $lang["home"] : 'Home'; ?></a></li>

            <?php if (isset($_SESSION['user'])): ?>
                <li><a href="/dashboard"><?= isset($lang["dashboard"]) ? $lang["dashboard"] : 'Dashboard'; ?></a></li>
                <li><a href="/support"><?= isset($lang["support"]) ? $lang["support"] : 'Support'; ?></a></li>
                <li><a href="/logout"><?= isset($lang["logout"]) ? $lang["logout"] : 'Logout'; ?></a></li>
            <?php else: ?>
                <li><a href="/login"><?= isset($lang["login"]) ? $lang["login"] : 'Login'; ?></a></li>
                <li><a href="/register"><?= isset($lang["register"]) ? $lang["register"] : 'Register'; ?></a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
