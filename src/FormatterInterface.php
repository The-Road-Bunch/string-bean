<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


interface FormatterInterface
{
    public function format(string $subject): string;
    public function formatList(string ...$subject): array;
}
