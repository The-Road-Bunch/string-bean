<?php
declare(strict_types=1);

namespace Danmcadams\Stringy\Manipulator;


interface TrimmerInterface
{
    public static function trim(string $needle, string $haystack): string;
}
