<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


class PrefixTrimmer extends AbstractFormatter
{
    public function __construct(
        private readonly string $prefix
    ) {}

    public function format(string $string): string
    {
        if (str_starts_with($string, $this->prefix)) {
            return ltrim(substr($string, strlen($this->prefix)));
        }
        return $string;
    }
}
