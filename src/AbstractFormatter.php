<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


abstract class AbstractFormatter implements FormatterInterface
{
    abstract public function format(string $subject): string;

    public function formatList(string ...$subject): array
    {
        return array_map(function($val) {
            return $this->format($val);
        }, $subject);
    }
}
