<?php declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\SplitCamelCaseFormatter;

#[CoversClass(SplitCamelCaseFormatter::class)]
final class SplitCamelCaseWordsFormatterTest extends TestCase
{
    #[DataProvider('wordsProvider')]
    public function testSplitCamelCase(string $testString, string $expected)
    {
        $formatter = new SplitCamelCaseFormatter();
        $this->assertEquals($expected, $formatter->format($testString));
    }

    public static function wordsProvider(): Generator
    {
        yield ['', ''];
        yield ['stay_the_same', 'stay_the_same'];
        yield ['TestStringOne', 'Test String One'];
        yield ['RCController', 'RC Controller'];
        yield ['WorksWITHAcronyms', 'Works WITH Acronyms'];
        yield ['WorksW.I.T.H.Abbreviations', 'Works W.I.T.H. Abbreviations'];
    }
}
