<?php declare(strict_types=1);

namespace RoadBunch\StringBean;


readonly class SplitCamelCaseFormatter implements FormatterInterface
{
    public function format(string $string): string
    {
        $regex = '/(?<=[a-z])(?=[A-Z])|(?<=[A-Z\.])(?=[A-Z][a-z])/x';
        $words = preg_split($regex, $string, limit: -1, flags: PREG_SPLIT_NO_EMPTY);

        if (!empty($words)) {
            return implode(' ', $words);
        };
        return $string;
    }
}
