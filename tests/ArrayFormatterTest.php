<?php
declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;


use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\ArrayFormatter;
use RoadBunch\StringBean\SplitCamelCaseFormatter;
use RoadBunch\StringBean\SuffixTrimmer;
use RoadBunch\StringBean\UpperCaseWordsFormatter;

#[CoversClass(ArrayFormatter::class)]
class ArrayFormatterTest extends TestCase
{
    public function testFormatArray(): void
    {
        $words = ['ANewStringOfWords', 'Some_moreWords'];
        $expected = ['A New String Of', 'Some_More'];

        $newWords = ArrayFormatter::format(
            $words,
            new UpperCaseWordsFormatter(),
            new SplitCamelCaseFormatter(),
            new SuffixTrimmer('Words'),
        );
        $this->assertEquals($expected, $newWords);
    }
}
