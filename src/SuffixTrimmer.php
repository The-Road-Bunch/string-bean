<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


readonly class SuffixTrimmer implements TrimmerInterface, FormatterInterface
{
    public function __construct(
        private string $needle
    ) {}

    public function format(string $string): string
    {
        return self::trim($string, $this->needle);
    }

    public static function trim(string $haystack, string $needle): string
    {
        if (str_ends_with($haystack, $needle)) {
            return rtrim(substr($haystack, 0, strlen($haystack) - strlen($needle)));
        }
        return $haystack;
    }
}
