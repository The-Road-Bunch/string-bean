<?php
declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\CamelToSnakeCaseFormatter;

#[CoversClass(CamelToSnakeCaseFormatter::class)]
class CamelToSnakeCaseFormatterTest extends TestCase
{
    #[DataProvider('stringProvider')]
    public function testCamelToSnakeCase(string $original, string $expected): void
    {
        $formatter = new CamelToSnakeCaseFormatter();
        $this->assertEquals($expected, $formatter->format($original));
    }

    public static function stringProvider(): array
    {
        return [
            'no change' => ['already_snake', 'already_snake'],
            'camel case to snake' => ['convertThisString', 'convert_This_String'],
            'with acronym' => ['ConvertTHISString', 'Convert_THIS_String'],
            'with a space already' => ['has someSpaces inBetween words', 'has some_Spaces in_Between words'],
        ];
    }

    public function testSplitMultipleStrings(): void
    {
        $formatter = new CamelToSnakeCaseFormatter();
        $subjects = ['TestStringOne', 'TestStringTwo', 'TestStringThree'];

        $result = $formatter->formatList(...$subjects);
        $this->assertEquals(['Test_String_One', 'Test_String_Two', 'Test_String_Three'], $result);
    }
}