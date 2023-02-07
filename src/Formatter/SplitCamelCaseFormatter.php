<?php declare(strict_types=1);

namespace Danmcadams\Stringy\Formatter;


class SplitCamelCaseFormatter implements FormatterInterface
{
    public static function format(string $str): string
    {
        $regex = '/(?<=[a-z])(?=[A-Z])|(?<=[A-Z\.])(?=[A-Z][a-z])/x';
        $words = preg_split($regex, $str, $limit = -1, PREG_SPLIT_NO_EMPTY);

        if (!empty($words)) {
            return implode(' ', $words);
        };
        return $str;
    }
}
