<?php
declare(strict_types=1);

namespace Danmcadams\Stringy\Manipulator;


class RemovePrefixManipulator implements ManipulatorInterface
{
    public static function removePrefix(string $needle, string $haystack): string
    {
        return str_starts_with($haystack, $needle)
            ? substr($haystack, strlen($needle))
            : $haystack;
    }
}
