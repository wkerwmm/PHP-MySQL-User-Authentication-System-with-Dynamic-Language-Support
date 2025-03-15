<?php

global $language;
require_once __DIR__ . '/config.php';

/**
 * Load language file based on selected language.
 */
$langFile = __DIR__ . "/../languages/{$language}.json";

/**
 * Fallback to English if the selected language file is missing.
 */
if (!file_exists($langFile)) {
    $langFile = __DIR__ . "/../languages/en.json";
}

/**
 * Load the language JSON file and decode it into an array.
 */
$lang = json_decode(file_get_contents($langFile), true);

/**
 * Ensure the language array is properly loaded.
 */
if (!is_array($lang)) {
    die("Error: Language file could not be loaded.");
}
?>
