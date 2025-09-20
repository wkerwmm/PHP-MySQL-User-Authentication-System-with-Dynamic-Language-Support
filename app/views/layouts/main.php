<?php
global $lang, $language;
?><!doctype html>
<html lang="<?= htmlspecialchars($language) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= isset($title) ? htmlspecialchars($title) : 'App' ?></title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.12/dist/css/uikit.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php require __DIR__ . '/../partials/navbar.php'; ?>
<main class="uk-container uk-margin-top">
<?= $content ?>
</main>
<?php require __DIR__ . '/../partials/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.17.12/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.17.12/dist/js/uikit-icons.min.js"></script>
</body>
</html>

