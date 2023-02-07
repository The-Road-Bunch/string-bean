<?php
declare(strict_types=1);

namespace Danmcadams\Stringy\Tests\Manipulator;

use Danmcadams\Stringy\Manipulator\RemovePrefixManipulator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RemovePrefixManipulator::class)]
class RemovePrefixManipulatorTest extends TestCase
{
    public function testRemovePrefix(): void
    {
        $string = 'GetEndpoint';
        $manipulated = RemovePrefixManipulator::removePrefix('Get', $string);

        $this->assertEquals('Endpoint', $manipulated);
    }

    public function testRemovePrefixPrefixNotFound(): void
    {
        $string = 'Endpoint';
        $manipulated = RemovePrefixManipulator::removePrefix('Get', $string);

        $this->assertEquals('Endpoint', $manipulated);
    }
}
