<?php
declare(strict_types=1);


namespace RoadBunch\StringBean;


class SnakeToCamelCaseFormatter extends AbstractFormatter
{
    public function format(string $subject): string
    {
        $regex = '/(?<=_)(?=[A-Za-z])/';
        $words = preg_split($regex, $subject, limit: -1, flags: PREG_SPLIT_NO_EMPTY);

        if (!empty($words)) {
            $suffixTrimmer = new SuffixTrimmer('_');
            $upperCaseFormatter = new UpperCaseWordsFormatter();
            $f = new CombinationFormatter($suffixTrimmer, $upperCaseFormatter);

            $firstWord = $words[0];
            unset($words[0]);

            $words = $f->formatList(...$words);
            $firstWord = $suffixTrimmer->format($firstWord);

            return str_replace('_', '', $firstWord . implode('', $words));
        };
        return $subject;
    }
}
