<?php
declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\AbstractFormatter;

#[CoversClass(AbstractFormatter::class)]
final class AbstractFormatterTest extends TestCase
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
