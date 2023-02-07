<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


class UpperCaseWordsFormatter extends AbstractFormatter
{
    public function __construct(
        private string|array $delimiter = [" ", "-", "_", "."],
    ) {}

    public function format(string $string): string
    {
        $delimiter = is_string($this->delimiter) ? [$this->delimiter] : $this->delimiter;
        return ucwords($string, implode('', $delimiter));
    }
}
