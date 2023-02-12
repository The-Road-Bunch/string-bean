<?php
declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\SuffixTrimmer;

#[CoversClass(SuffixTrimmer::class)]
final class SuffixTrimmerTest extends TestCase
{
    public function testTrimSuffix(): void
    {
        $subject = 'GetEndpoint';
        $formatter = new SuffixTrimmer('Endpoint');

        $result = $formatter->format($subject);
        $this->assertEquals('Get', $result);
    }

    public function testTrimSuffixSuffixNotFound(): void
    {
        $subject = 'Get';
        $formatter = new SuffixTrimmer('Endpoint');

        $result = $formatter->format($subject);
        $this->assertEquals('Get', $result);
    }

    public function testTrimSuffixTrimsWhiteSpaceInFrontOfSuffix(): void
    {
        $subject = 'Some Words';
        $formatter = new SuffixTrimmer('Words');

        $result = $formatter->format($subject);
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
