<?php declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\UpperCaseWordsFormatter;

#[CoversClass(UpperCaseWordsFormatter::class)]
final class UpperCaseWordsFormatterTest extends TestCase
{
    #[DataProvider('wordsProvider')]
    public function testConvertsLowerCaseToUpperCase(string $testString, string $expected)
    {
        $formatter = new UpperCaseWordsFormatter();
        $this->assertEquals($expected, $formatter->format($testString));
    }

    public static function wordsProvider(): Generator
    {
        yield ['first name', 'First Name'];
        yield ['last_name', 'Last_Name'];
        yield ['email-address', 'Email-Address'];
        yield ['user.name', 'User.Name'];
        yield ['user.name', 'User.Name'];
    }
}
