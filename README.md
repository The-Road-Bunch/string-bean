# StringBean

Using a variety of provided formatters, you can format strings and arrays of strings quickly and easily.

### Available Formatters

| Formatter                           | Ex: original               | Ex: formatted              |
|:------------------------------------|:---------------------------|:---------------------------|
| SplitCamelCaseWordsFormatter::class | splitCamelCase             | split Camel Case           |
| UpperCaseFormatter::class           | upper case formatter       | UPPER CASE FORMATTER       |
| UpperCaseWordsFormatter::class      | upper case_words formatter | Upper Case_Words Formatter |

_Note:_ `SplitCamelCaseWordsFormatter` can split camel case strings with acronyms and abbreviations

| Formatter                           | Ex: original      | Ex: formatted       |
|-------------------------------------|-------------------|---------------------|
| SplitCamelCaseWordsFormatter::class | ThisWILLWork      | This WILL Work      |
| SplitCamelCaseWordsFormatter::class | evenT.H.I.S.Works | even T.H.I.S. Works |

### Formatter Usage

```php
<?php

use \RoadBunch\StringBean\UpperCaseWordsFormatter;

$string = 'these.are_some-words_to uppercase';
$formatter = new UpperCaseWordsFormatter();
echo $formatter->format($string);

// output
These.Are_Some-Words_To Uppercase
```

### Trimmer Usage

```php
<?php

use RoadBunch\StringBean\PrefixTrimmer;

$string = 'This is a string of words';
$formatter = new PrefixTrimmer('This');
echo $formatter->format($string);

// output
is a string of words

use RoadBunch\StringBean\PrefixTrimmer;

$string = 'This is a string of words';
echo PrefixTrimmer::trim('This', $string);

// output
is a string of words
```

### Format/Trim an array of strings

```php
<?php

use RoadBunch\StringBean\ArrayFormatter;
use RoadBunch\StringBean\UpperCaseWordsFormatter;
use RoadBunch\StringBean\SplitCamelCaseFormatter;
use RoadBunch\StringBean\PrefixTrimmer;
use RoadBunch\StringBean\SuffixTrimmer;

$arr = ['This_is_a_string', 'ThisIsAnotherString', 'This Is Another One'];

$formatted = ArrayFormatter::format(
    $arr,
    new UpperCaseWordsFormatter(),
    new SplitCamelCaseFormatter(),
    new PrefixTrimmer('This'),
    new SuffixTrimmer('One'),
);

print_r($formatted);

// output
Array
(
    [0] => _Is_A_String
    [1] => Is Another String
    [2] => Is Another
)
```

### Create your own formatter

**implement** `RoadBunch\StringBean\FormatterInterface`

```php
<?php

// obviously simple example
class LowerCaseFormatter implements \RoadBunch\StringBean\FormatterInterface
{
    public function format(array $string): array
    {
        return strtolower($string)
    }
};
```
