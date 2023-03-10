<?php
declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\SplitCamelCaseFormatter;

#[CoversClass(SplitCamelCaseFormatter::class)]
final class SplitCamelCaseFormatterTest extends TestCase
{
    #[DataProvider('stringProvider')]
    public function testSplitCamelCase(string $subject, string $expected): void
    {
        $formatter = new SplitCamelCaseFormatter();
        $this->assertEquals($expected, $formatter->format($subject));
    }

    public static function stringProvider(): array
    {
        return [
            'empty string' => ['', ''],
            'no change' => ['stay_the_same', 'stay_the_same'],
            'simple camel case' => ['testStringOne', 'test String One'],
            'acronyms' => ['WorksWITHAcronyms', 'Works WITH Acronyms'],
            'abbreviations' => ['WorksW.I.T.H.Abbreviations', 'Works W.I.T.H. Abbreviations'],
            'with spaces' => ['This string hasSpaces', 'This string has Spaces'],
        ];
    }

    public function testSetDelimiter(): void
    {
        $formatter = new SplitCamelCaseFormatter('_');
        $this->assertEquals('a_String', $formatter->format('aString'));
    }

    public function testSplitMultipleStrings(): void
    {
        $formatter = new SplitCamelCaseFormatter();
        $subjects = ['TestStringOne', 'TestStringTwo', 'TestStringThree'];

        $result = $formatter->formatList(...$subjects);
        $this->assertEquals(['Test String One', 'Test String Two', 'Test String Three'], $result);
    }
}
