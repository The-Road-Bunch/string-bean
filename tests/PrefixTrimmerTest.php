<?php
declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\PrefixTrimmer;

#[CoversClass(PrefixTrimmer::class)]
final class PrefixTrimmerTest extends TestCase
{
    public function testRemovePrefix(): void
    {
        $formatter = new PrefixTrimmer('Get');
        $subject = 'GetEndpoint';

        $result = $formatter->format($subject);
        $this->assertEquals('Endpoint', $result);
    }

    public function testRemovePrefixPrefixNotFound(): void
    {
        $formatter = new PrefixTrimmer('Get');
        $subject = 'Endpoint';

        $result = $formatter->format($subject);
        $this->assertEquals('Endpoint', $result);
    }

    public function testTrimPrefixTrimsWhiteSpaceBehindPrefix(): void
    {
        $formatter = new PrefixTrimmer('Some');
        $subject = 'Some Words';

        $result = $formatter->format($subject);
        $this->assertEquals('Words', $result);
    }
}
