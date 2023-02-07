<?php

namespace RoadBunch\StringBean;


interface FormatterInterface
{
    public function format(string $string): string;
}
