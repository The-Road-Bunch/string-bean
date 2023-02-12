<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


class PrefixTrimmer extends AbstractFormatter
{
    public function __construct(
        private readonly string $prefix
    ) {}

    public function format(string $subject): string
    {
        if (str_starts_with($subject, $this->prefix)) {
            return ltrim(substr($subject, strlen($this->prefix)));
        }
        return $subject;
    }
}
