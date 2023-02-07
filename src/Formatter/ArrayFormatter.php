<?php
declare(strict_types=1);

namespace Danmcadams\Stringy\Formatter;


class ArrayFormatter
{
    public static function format(array $words, FormatterInterface ...$formatter): array
    {
        foreach ($formatter as $service) {
            $words = array_map([$service, 'format'], $words);
        }
        return $words;
    }
}
