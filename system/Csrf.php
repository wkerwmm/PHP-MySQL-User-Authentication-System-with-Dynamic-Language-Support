<?php
class Csrf
{
    private const SESSION_KEY = '_csrf';

    public static function token(): string
    {
        if (empty($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = bin2hex(random_bytes(32));
        }
        return $_SESSION[self::SESSION_KEY];
    }

    public static function validate(?string $token): bool
    {
        $known = $_SESSION[self::SESSION_KEY] ?? '';
        return is_string($token) && $known !== '' && hash_equals($known, $token);
    }
}

