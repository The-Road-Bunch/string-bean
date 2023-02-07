<?php

namespace RoadBunch\StringBean\Tests;

use RoadBunch\StringBean\AbstractFormatter;
use PHPUnit\Framework\TestCase;

class AbstractFormatterTest extends TestCase
{
    public function testFormatList(): void
    {
        $formatter = new class extends AbstractFormatter
        {
            public function format(string $string): string
            {
                return strtolower($string);
            }
        };
        $results = $formatter->formatList('A STRING TO LOWER', 'And Another');
        $this->assertEquals(['a string to lower', 'and another'], $results);
    }
}
