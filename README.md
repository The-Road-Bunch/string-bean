# StringBean
Using a variety of provided formatters, you can format strings and arrays of strings quickly and easily.

[![Build Status](https://scrutinizer-ci.com/g/The-Road-Bunch/string-bean/badges/build.png?b=main)](https://scrutinizer-ci.com/g/The-Road-Bunch/string-bean/build-status/main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/The-Road-Bunch/string-bean/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/The-Road-Bunch/string-bean/?branch=main)
[![License: MIT](https://img.shields.io/badge/License-MIT-2222CC.svg)](https://opensource.org/licenses/MIT)


## Installation
`composer require theroadbunch/string-bean`

## Formatters

### Usage
```php
<?php

use \RoadBunch\StringBean\UpperCaseWordsFormatter;

$string = 'these.are_some-words_to uppercase';
$formatter = new UpperCaseWordsFormatter();
echo $formatter->format($string);

// output
These.Are_Some-Words_To Uppercase
```

### Available Formatters
| Formatter                           | Ex: original               | Ex: formatted              |
|:------------------------------------|:---------------------------|:---------------------------|
| SplitCamelCaseWordsFormatter::class | splitCamelCase             | split Camel Case           |
| UpperCaseWordsFormatter::class      | upper case_words formatter | Upper Case_Words Formatter |

`SplitCamelCaseWordsFormatter` can split CamelCase strings with acronyms and abbreviations.

| Formatter                           | Ex: original      | Ex: formatted       |
|-------------------------------------|-------------------|---------------------|
| SplitCamelCaseWordsFormatter::class | ThisWILLWork      | This WILL Work      |
| SplitCamelCaseWordsFormatter::class | evenT.H.I.S.Works | even T.H.I.S. Works |


## Trimmers

### Usage
```php
<?php

use RoadBunch\StringBean\PrefixTrimmer;

$string = 'This is a string of words';
$formatter = new PrefixTrimmer('This');
echo $formatter->format($string);

// output
is a string of words

// Note: Trimmers are case-sensitive

use RoadBunch\StringBean\PrefixTrimmer;

$string = 'Another set of words';
$formatter = new PrefixTrimmer('another');
echo $formatter->format($string);

// output
Another set of words
```

### Available Trimmers
_Note: Trimmers implement the same interface as Formatters_: `FormatterInterface`  

| Trimmer       |  Trim Value | Ex: original  | Ex: formatted |
|:--------------|:------------|:--------------|:--------------|
| PrefixTrimmer | pref_       | pref_A String | A String      |
| SuffixTrimmer | ula1        | Formula1      | Form          |



### Format/Trim an array of strings

```php
<?php

use RoadBunch\StringBean\BulkFormatter;
use RoadBunch\StringBean\SplitCamelCaseFormatter;
use RoadBunch\StringBean\UpperCaseWordsFormatter;
use RoadBunch\StringBean\AbstractFormatter;

$formatter = new BulkFormatter(
    new SplitCamelCaseFormatter(),
    new UpperCaseWordsFormatter(),
    new class extends AbstractFormatter {
        public function format(string $string) : string{
            return "~={$string}=~";
        }
    }
);
$result = $formatter->format('aStringToFormat');

echo $result;

// output
~=A String To Format=~
```

### Create your own formatter

```php
<?php

use RoadBunch\StringBean\AbstractFormatter;

// obviously simple example
class LowerCaseFormatter extends AbstractFormatter
{
    public function format(string $string): string
    {
        return strtolower($val);
    }
};
```
