<?php
declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\SuffixTrimmer;

#[CoversClass(SuffixTrimmer::class)]
class SuffixTrimmerTest extends TestCase
{
    public function testTrimSuffix(): void
    {
        $string = 'GetEndpoint';
        $formatter = new SuffixTrimmer('Endpoint');

        $result = $formatter->format($string);
        $this->assertEquals('Get', $result);
    }

    public function testTrimSuffixSuffixNotFound(): void
    {
        $string = 'Get';
        $formatter = new SuffixTrimmer('Endpoint');

        $result = $formatter->format($string);
        $this->assertEquals('Get', $result);
    }

    public function testTrimSuffixTrimsWhiteSpaceInFrontOfSuffix(): void
    {
        $string = 'Some Words';
        $formatter = new SuffixTrimmer('Words');

        $result = $formatter->format($string);
        $this->assertEquals('Some', $result);
    }

    public function testTrimList(): void
    {
        $list = ['HedgeTrimmer', 'StringTrimmer', 'BeardTrimmer'];
        $formatter = new SuffixTrimmer('Trimmer');

        $result = $formatter->formatList(...$list);
        $this->assertEquals(['Hedge', 'String', 'Beard'], $result);
    }
}
