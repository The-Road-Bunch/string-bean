<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


class SuffixTrimmer extends AbstractFormatter
{
    public function __construct(
        private readonly string $suffix
    ) {}

    public function format(string $string): string
    {
        if (str_ends_with($string, $this->suffix)) {
            return rtrim(substr($string, 0, strlen($string) - strlen($this->suffix)));
        }
        return $string;
    }
}
