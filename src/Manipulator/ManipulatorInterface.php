<?php
declare(strict_types=1);

namespace Danmcadams\Stringy\Manipulator;


interface ManipulatorInterface
{
    public static function removePostfix(string $needle, string $haystack): string;
}
