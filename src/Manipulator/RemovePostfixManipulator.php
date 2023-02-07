<?php
declare(strict_types=1);

namespace Danmcadams\Stringy\Manipulator;


use Danmcadams\Stringy\Formatter\FormatterInterface;

class RemovePostfixManipulator implements TrimmerInterface, FormatterInterface
{
    private static string $needle;

    public static function trim(string $needle, string $haystack): string
    {
        return str_ends_with($haystack, $needle)
            ? substr($haystack, 0, strlen($haystack) - strlen($needle))
            : $haystack;
    }

    public static function create(string $needle): void
    {
        self::$needle = $needle;
    }
    
    public static function format(string $str): string
    {
        if (!isset(self::$needle)) {
            throw new \LogicException('must instantiate class using ::create');
        }
        return self::trim(self::$needle, $str);
    }
}
