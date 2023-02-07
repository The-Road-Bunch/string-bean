<?php declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\SplitCamelCaseFormatter;

#[CoversClass(SplitCamelCaseFormatter::class)]
final class SplitCamelCaseFormatterTest extends TestCase
{
    #[DataProvider('stringProvider')]
    public function testSplitCamelCase(string $original, string $expected): void
    {
        $formatter = new SplitCamelCaseFormatter();
        $this->assertEquals($expected, $formatter->format($original));
    }

    public static function stringProvider(): array
    {
        return [
            'no change' => ['stay_the_same', 'stay_the_same'],
            'camel case' => ['testStringOne', 'test String One'],
            'acronyms' => ['WorksWITHAcronyms', 'Works WITH Acronyms'],
            'abbreviations' => ['WorksW.I.T.H.Abbreviations', 'Works W.I.T.H. Abbreviations'],
        ];
    }

    public function testSplitMultipleStrings(): void
    {
        $formatter = new SplitCamelCaseFormatter();
        $strings = ['TestStringOne', 'TestStringTwo', 'TestStringThree'];

        $result = $formatter->formatList(...$strings);
        $this->assertEquals(['Test String One', 'Test String Two', 'Test String Three'], $result);
    }
}