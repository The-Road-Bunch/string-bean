<?php
declare(strict_types=1);

namespace Danmcadams\Stringy\Manipulator;


class RemovePrefixManipulator
{
    public static function removePrefix(string $needle, string $haystack): string
    {
        if (str_starts_with($haystack, $needle)) {
            return substr($haystack, strlen($needle));
        }
        return $haystack;
    }
}
