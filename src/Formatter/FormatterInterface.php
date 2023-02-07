<?php

namespace Danmcadams\Stringy\Formatter;


interface FormatterInterface
{
    public static function format(string $str): string;
}
