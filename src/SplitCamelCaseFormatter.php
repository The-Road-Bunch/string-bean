<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


class SplitCamelCaseFormatter extends AbstractFormatter
{
    public function __construct(
        private readonly string $delimiter = ' ',
    ) {}

    public function format(string $subject): string
    {
        $regex = '/(?<=[a-z])(?=[A-Z])|(?<=[A-Z\.])(?=[A-Z][a-z])/x';
        $words = preg_split($regex, $subject, limit: -1, flags: PREG_SPLIT_NO_EMPTY);

        if (!empty($words)) {
            return implode($this->delimiter, $words);
        };
        return $subject;
    }
}
