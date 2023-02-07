<?php
declare(strict_types=1);

namespace Danmcadams\Stringy\Tests\Formatter;


use Danmcadams\Stringy\Formatter\ArrayFormatter;
use Danmcadams\Stringy\Formatter\SplitCamelCaseFormatter;
use Danmcadams\Stringy\Formatter\UpperCaseWordsFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ArrayFormatter::class)]
class ArrayFormatterTest extends TestCase
{
    public function testFormatArray(): void
    {
        $words = ['ANewStringOfWords', 'Some_moreWords'];
        $expected = ['A New String Of Words', 'Some_More Words'];

        $newWords = ArrayFormatter::format(
            $words,
            new UpperCaseWordsFormatter(),
            new SplitCamelCaseFormatter(),
        );
        $this->assertEquals($expected, $newWords);
    }
}
