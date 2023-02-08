<?php
declare(strict_types=1);

namespace RoadBunch\StringBean;


class CombinationFormatter extends AbstractFormatter
{
    private array $formatters;

    public function __construct(FormatterInterface ...$formatters)
    {
        if (empty($formatters)) {
            throw new \LogicException('You must provide formatters to instantiate this class');
        }
        $this->formatters = $formatters;
    }

    public function format(string $string): string
    {
        foreach ($this->formatters as $formatter) {
            $string = $formatter->format($string);
        }
        return $string;
    }
}
