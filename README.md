# StringBean
Using a variety of provided formatters, you can format strings and arrays of strings quickly and easily.

[![Build Status](https://scrutinizer-ci.com/g/The-Road-Bunch/string-bean/badges/build.png?b=main)](https://scrutinizer-ci.com/g/The-Road-Bunch/string-bean/build-status/main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/The-Road-Bunch/string-bean/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/The-Road-Bunch/string-bean/?branch=main)
[![License: MIT](https://img.shields.io/badge/License-MIT-2222CC.svg)](https://opensource.org/licenses/MIT)


## Installation
`composer require theroadbunch/string-bean`

## Usage

### Formatters
Format a single string
```php
<?php

use \RoadBunch\StringBean\UpperCaseWordsFormatter;

$formatter = new UpperCaseWordsFormatter();

/* Format a string */
echo $formatter->format('these.are_some-words_to uppercase');

/* Format a list of strings */
print_r($formatter->formatList('this will be upper case', 'and.so.will.this'));
```
_output_:
```shell
These.Are_Some-Words_To Uppercase

Array 
(
    [0] => 'This Will Be Upper Case'
    [1] => 'And.So.Will.This'
)
```

#### Available Formatters
| Formatter                           | Ex: original               | Ex: formatted              |
|:------------------------------------|:---------------------------|:---------------------------|
| SplitCamelCaseWordsFormatter::class | splitCamelCase             | split Camel Case           |
| UpperCaseWordsFormatter::class      | upper case_words formatter | Upper Case_Words Formatter |

`SplitCamelCaseWordsFormatter` can split CamelCase strings with acronyms and abbreviations.

| Formatter                           | Ex: original      | Ex: formatted       |
|-------------------------------------|-------------------|---------------------|
| SplitCamelCaseWordsFormatter::class | ThisWILLWork      | This WILL Work      |
| SplitCamelCaseWordsFormatter::class | evenT.H.I.S.Works | even T.H.I.S. Works |


### Trimmers
```php
<?php

use RoadBunch\StringBean\PrefixTrimmer;

$formatter = new PrefixTrimmer('This');

/* Trim a word off the front of a string */
echo $formatter->format('This is a string of words');

/* Trimmers are case-sensitive */
echo $formatter->format('this is a string of words');
```
_output_:
```shell
is a string of words

this is a string of words
```

#### Available Trimmers
_Note: Trimmers implement the same interface as Formatters_: `FormatterInterface`  

| Trimmer       |  Trim Value | Ex: original  | Ex: formatted |
|:--------------|:------------|:--------------|:--------------|
| PrefixTrimmer | pref_       | pref_A String | A String      |
| SuffixTrimmer | ula1        | Formula1      | Form          |


### Use a combination of Formatters
```php
<?php

use RoadBunch\StringBean\CombinationFormatter;
use RoadBunch\StringBean\SplitCamelCaseFormatter;
use RoadBunch\StringBean\UpperCaseWordsFormatter;
use RoadBunch\StringBean\AbstractFormatter;

$formatter = new CombinationFormatter(
    new SplitCamelCaseFormatter(),
    new UpperCaseWordsFormatter(),
    // feel free to create a formatter on the fly
    new class extends AbstractFormatter {
        public function format(string $subject) : string{
            return "~={$subject}=~";
        }
    }
);
echo $formatter->format('aStringToFormat');

print_r($formatter->formatList('aStringToFormat', 'wild'));
```
_output_:
```shell
~=A String To Format=~

Array
(
    [0] => ~=A String To Format=~
    [1] => ~=Wild=~
)
```

### Create your own formatter

```php
<?php

use RoadBunch\StringBean\AbstractFormatter;

class L33tSpeakFormatter extends AbstractFormatter
{
    public function format(string $subject): string
    {
        return str_ireplace(['T', 'E', 'A'], ['7', '3', '4'], strtoupper($subject));
    }
};

$formatter = new L33tSpeakFormatter();
echo $formatter->format('leet speak');
```
_output_:
```shell
L337 SP34K
```
