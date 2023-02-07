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
        $trimmed = SuffixTrimmer::trim($string, 'Endpoint');

        $this->assertEquals('Get', $trimmed);
    }

    public function testTrimSuffixSuffixNotFound(): void
    {
        $string = 'Get';
        $trimmed = SuffixTrimmer::trim($string, 'Endpoint');

        $this->assertEquals('Get', $trimmed);
    }

    public function testTrimSuffixTrimsWhiteSpaceInFrontOfSuffix(): void
    {
        $string = 'Some Words';
        $trimmed = SuffixTrimmer::trim($string, 'Words');

        $this->assertEquals('Some', $trimmed);
    }

    public function testTrimSuffixUsingFormatMethod(): void
    {
        $string = 'GetEndpoint';

        $trimmed = (new SuffixTrimmer('Endpoint'))->format($string);
        $this->assertEquals('Get', $trimmed);
    }
}
