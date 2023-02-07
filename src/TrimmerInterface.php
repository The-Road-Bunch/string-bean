<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


interface TrimmerInterface
{
    public static function trim(string $haystack, string $needle): string;
}
