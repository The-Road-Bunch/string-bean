<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


interface FormatterInterface
{
    public function format(string $string): string;
    public function formatList(string ...$string): array;
}
