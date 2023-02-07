<?php declare(strict_types=1);

namespace RoadBunch\StringBean;


readonly class UpperCaseWordsFormatter implements FormatterInterface
{
    public function format(string $string): string
    {
        return ucwords($string, implode('', [" ", "-", "_", "."]));
    }
}
