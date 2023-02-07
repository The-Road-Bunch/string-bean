<?php declare(strict_types=1);

namespace Danmcadams\Stringy\Formatter;


class UpperCaseWordsFormatter implements FormatterInterface
{
    public static function format(string $str): string
    {
        return ucwords($str, implode('', [" ", "-", "_", "."]));
    }
}
