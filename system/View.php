<?php
class View
{
    public static function render(string $view, array $params = [], string $layout = 'layouts/main'): string
    {
        global $lang, $language;
        $viewFile = __DIR__ . '/../app/views/' . $view . '.php';
        if (!file_exists($viewFile)) {
            http_response_code(500);
            return 'View not found: ' . htmlspecialchars($view);
        }
        extract($params, EXTR_SKIP);
        ob_start();
        require $viewFile;
        $content = ob_get_clean();
        $layoutFile = __DIR__ . '/../app/views/' . $layout . '.php';
        if (!file_exists($layoutFile)) {
            return $content;
        }
        ob_start();
        require $layoutFile;
        return ob_get_clean();
    }
}

