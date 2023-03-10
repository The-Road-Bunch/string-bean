<?php
declare(strict_types=1);

namespace RoadBunch\StringBean\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RoadBunch\StringBean\UpperCaseWordsFormatter;

#[CoversClass(UpperCaseWordsFormatter::class)]
final class UpperCaseWordsFormatterTest extends TestCase
{
    #[DataProvider('stringProvider')]
    public function testConvertsLowerCaseToUpperCase(string $subject, string $expected): void
    {
        $formatter = new UpperCaseWordsFormatter();
        $this->assertEquals($expected, $formatter->format($subject));
    }

    public static function stringProvider(): array
    {
        return [
            'empty string' => ['', ''],
            'single word' => ['word', 'Word'],
            'dot' => ['user.name', 'User.Name'],
            'space' => ['first name', 'First Name'],
            'hyphen' => ['email-address', 'Email-Address'],
            'underscore' => ['last_name', 'Last_Name'],
        ];
    }

    public function testFormatList(): void
    {
        $formatter = new UpperCaseWordsFormatter();
        $subjects = ['first name', 'last_name', 'email-address', 'user.name'];

        $result = $formatter->formatList(...$subjects);
        $this->assertEquals(['First Name', 'Last_Name', 'Email-Address', 'User.Name'], $result);
    }

    public function testSetDelimiter(): void
    {
        $formatter = new UpperCaseWordsFormatter('~=~');
        $this->assertEquals('New~=~Delimiter', $formatter->format('new~=~delimiter'));
    }

    public function testSetMultipleDelimiters(): void
    {
        $formatter = new UpperCaseWordsFormatter(['.', '!']);
        $result = $formatter->format('a.new!sentence');

        $this->assertEquals('A.New!Sentence', $result);
    }
}
