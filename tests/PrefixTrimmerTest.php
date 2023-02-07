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
        $formatter = new PrefixTrimmer('Get');
        $string = 'GetEndpoint';

        $result = $formatter->format($string);
        $this->assertEquals('Endpoint', $result);
    }

    public function testRemovePrefixPrefixNotFound(): void
    {
        $formatter = new PrefixTrimmer('Get');
        $string = 'Endpoint';

        $result = $formatter->format($string);
        $this->assertEquals('Endpoint', $result);
    }

    public function testTrimPrefixTrimsWhiteSpaceBehindPrefix(): void
    {
        $formatter = new PrefixTrimmer('Some');
        $string = 'Some Words';

        $result = $formatter->format($string);
        $this->assertEquals('Words', $result);
    }
}
