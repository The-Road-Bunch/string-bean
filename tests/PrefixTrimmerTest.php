<?php
declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\PrefixTrimmer;

#[CoversClass(PrefixTrimmer::class)]
class PrefixTrimmerTest extends TestCase
{
    public function testRemovePrefix(): void
    {
        $string = 'GetEndpoint';
        $trimmed = PrefixTrimmer::trim($string, 'Get');

        $this->assertEquals('Endpoint', $trimmed);
    }

    public function testRemovePrefixPrefixNotFound(): void
    {
        $string = 'Endpoint';
        $trimmed = PrefixTrimmer::trim($string, 'Get');

        $this->assertEquals('Endpoint', $trimmed);
    }

    public function testTrimPrefixTrimsWhiteSpaceBehindPrefix(): void
    {
        $string = 'Some Words';
        $trimmed = PrefixTrimmer::trim($string, 'Some');

        $this->assertEquals('Words', $trimmed);
    }

    public function testTrimPrefixUsingFormatMethod(): void
    {
        $string = 'GetEndpoint';

        $trimmed = (new PrefixTrimmer('Get'))->format($string);
        $this->assertEquals('Endpoint', $trimmed);
    }
}
