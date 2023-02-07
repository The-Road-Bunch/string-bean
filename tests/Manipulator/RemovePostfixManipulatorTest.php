<?php
declare(strict_types=1);

namespace Danmcadams\Stringy\Tests\Manipulator;

use Danmcadams\Stringy\Manipulator\RemovePostfixManipulator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RemovePostfixManipulator::class)]
class RemovePostfixManipulatorTest extends TestCase
{
    public function testRemovePostfix(): void
    {
        $string = 'GetEndpoint';
        $manipulated = RemovePostfixManipulator::removePostFix('Endpoint', $string);

        $this->assertEquals('Get', $manipulated);
    }

    public function testRemovePrefixPostfixNotFound(): void
    {
        $string = 'Get';
        $manipulated = RemovePostfixManipulator::removePostFix('Endpoint', $string);

        $this->assertEquals('Get', $manipulated);
    }
}
