<?php

namespace RoadBunch\StringBean\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use RoadBunch\StringBean\AbstractFormatter;
use RoadBunch\StringBean\BulkFormatter;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\SplitCamelCaseFormatter;
use RoadBunch\StringBean\SuffixTrimmer;
use RoadBunch\StringBean\UpperCaseWordsFormatter;

#[CoversClass(BulkFormatter::class)]
class BulkFormatterTest extends TestCase
{
    public function testNoFormattersProvidedThrowsException(): void
    {
        $this->expectException(\LogicException::class);
        new BulkFormatter();
    }

    public function testFormatWithMultipleFormatters(): void
    {
        $formatter = new BulkFormatter(
            new SplitCamelCaseFormatter(),
            new UpperCaseWordsFormatter(),
        );
        $result = $formatter->format('aStringToFormat');
        $this->assertEquals('A String To Format', $result);
    }

    public function testFormatList(): void
    {
        $formatter = new BulkFormatter(
            new SplitCamelCaseFormatter(),
            new UpperCaseWordsFormatter(),
        );
        $results = $formatter->formatList('AListOfStrings', 'Is allISee');
        $this->assertEquals(['A List Of Strings', 'Is All I See'], $results);
    }
}
