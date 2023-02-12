<?php
declare(strict_types=1);


namespace RoadBunch\StringBean;


class CamelToSnakeCaseFormatter extends AbstractFormatter
{
    public function format(string $subject): string
    {
        return (new SplitCamelCaseFormatter('_'))->format($subject);
    }
}
