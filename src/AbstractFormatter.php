<?php
declare(strict_types=1);


namespace RoadBunch\StringBean;


abstract class AbstractFormatter implements FormatterInterface
{
    abstract public function format(string $string): string;

    public function formatList(string ...$string): array
    {
        return array_map(function($val) {
            return $this->format($val);
        }, $string);
    }
}
