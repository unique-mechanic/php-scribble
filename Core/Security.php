<?php

namespace Core;

class Security
{
    /**
     * Escape HTML to prevent XSS
     */
    public static function escape($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Escape for HTML context (shorter alias)
     */
    public static function html($string)
    {
        return self::escape($string);
    }
}
