<?php
declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\SnakeToCamelCaseFormatter;

#[CoversClass(SnakeToCamelCaseFormatter::class)]
class SnakeToCamelCaseFormatterTest extends TestCase
{
    #[DataProvider('stringProvider')]
    public function testConvertSnakeToCamelCase(string $subject, string $expected): void
    {
        $formatter = new SnakeToCamelCaseFormatter();
        $formatted = $formatter->format($subject);

        $this->assertEquals($expected, $formatted);
    }

    public static function stringProvider(): array
    {
        return [
            'empty string' => ['', ''],
            'one word' => ['word', 'word'],
            'one word trailing underscore' => ['word_', 'word'],
            'with trailing underscore' => ['trailing_underscore_', 'trailingUnderscore'],
            'no change' => ['alreadyCamelCase', 'alreadyCamelCase'],
            'first word capitalized' => ['First_Word_Capital', 'FirstWordCapital'],
            'snake to camelCase' => ['convert_this_string', 'convertThisString'],
            'extra _ in snake case' => ['this__should_work_too', 'thisShouldWorkToo'],
            'with acronym' => ['convert_THIS_string', 'convertTHISString'],
        ];
    }

    public function testFormatList(): void
    {
        $formatter = new SnakeToCamelCaseFormatter();
        $subjects = ['First_Word_Capital','convert_this_string', 'convert_THIS_string'];

        $result = $formatter->formatList(...$subjects);
        $this->assertEquals(['FirstWordCapital', 'convertThisString', 'convertTHISString'], $result);
    }
}
