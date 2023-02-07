<?php
declare(strict_types=1);

namespace Danmcadams\Stringy\Manipulator;


class RemovePostfixManipulator
{
    public static function removePostfix(string $needle, string $haystack): string
    {
        if (str_ends_with($haystack, $needle)) {
            return substr($haystack, 0, strlen($haystack) - strlen($needle));
        }
        return $haystack;
    }
}
