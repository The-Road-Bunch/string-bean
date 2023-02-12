<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


class SuffixTrimmer extends AbstractFormatter
{
    public function __construct(
        private readonly string $suffix
    ) {}

    public function format(string $subject): string
    {
        if (str_ends_with($subject, $this->suffix)) {
            return rtrim(substr($subject, 0, strlen($subject) - strlen($this->suffix)));
        }
        return $subject;
    }
}
